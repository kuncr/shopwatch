<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Brand;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
use App\ProductDetail;
use App\ProductImage;
use Input;
use App\Order;
use App\OrderDetail;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listProducts = Product::with('category','brand')->orderBy('id','DESC')->paginate(10);
        return view('product.index',compact('listProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategory = Category::all();
        $listBrand = Brand::all();
        return view('product.create',compact('listCategory','listBrand'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $Request)
    {
       $file_name=$Request->file('fimage')->getClientOriginalName();
       $file_name = rand(1,10000).$file_name;
       $product = new Product();
       $product->name=$Request->name;
       $product->price=$Request->price;
       $product->image = $file_name;
       $uploadPath = 'image_product/';
       $Request->file('fimage')->move($uploadPath,$file_name);
       $product->brand_id = $Request->brand_id;
       $product->category_id = $Request->category_id;
       $product->save();
       $productDetail = new ProductDetail();
       $productDetail->product_id = $product->id;
       $productDetail->material = $Request->material;
       $productDetail->case     = $Request->case;
       $productDetail->strap    = $Request->strap;
       $productDetail->amount   = $Request->amount;
       $productDetail->water_resistance = $Request->water_resistance;
       $productDetail->description = $Request->description;
       $productDetail->save();
       if($Request->hasFile('fimage_details')){
            foreach ($Request->file('fimage_details') as $file) {
                $productImage = new ProductImage();
                if(isset($file))
                {
                    $productImage_name = rand(1,10000).$file->getClientOriginalName();
                    $productImage->name = $productImage_name;
                    $productImage->product_id = $product->id;
                    $uploadPath2 = 'image_product_detail/';
                    $file->move($uploadPath2,$productImage_name); 
                    $productImage->save();
                }
            }
       }
       return redirect()->route('list-product')->with(['flash_level'=>'success','flash_message'=>'Thêm sản phẩm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category','brand')->where('id',$id)->first();
        $productDetail = ProductDetail::where('product_id',$id)->first();
        $listImage = ProductImage::all()->where('product_id',$id)->toArray();
        return view('product.productDetail',compact('product','productDetail','listImage'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('category','brand','productdetails')->where('id',$id)->first();
        $listCategory = Category::all();
        $listBrand = Brand::all();
        $productDetail = DB::table('product_details')->where('product_id',$id)->first();
        // dd($productDetail);
        return View('product.edit',compact('product','listCategory','listBrand','productDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $Request, $id)
    {
      $product = Product::find($id);
      $product->name = $Request->name;
      $product->category_id = $Request->category_id;
      $product->brand_id = $Request->brand_id;
      $product->price = $Request->price;
      if($Request->hasFile('fimage'))
      {
        $file_name=$Request->file('fimage')->getClientOriginalName();
         $file_name = rand(1,10000).$file_name;
         $product->image = $file_name;
         $uploadPath = 'image_product/';
         $Request->file('fimage')->move($uploadPath,$file_name);
      }
      $product->save();
      $productDetail = ProductDetail::where('product_id',$id)->first();
      $productDetail->material = $Request->material;
      $productDetail->case = $Request->case;
      $productDetail->strap = $Request->strap;
      $productDetail->water_resistance = $Request->water_resistance;
      $productDetail->amount = $Request->amount;
      $productDetail->description = $Request->description;
      $productDetail->save();
      if($Request->hasFile('fimage_details')){
            foreach ($Request->file('fimage_details') as $file) {
                $productImage = new ProductImage();
                if(isset($file))
                {
                    $productImage_name = rand(1,10000).$file->getClientOriginalName();
                    $productImage->name = $productImage_name;
                    $productImage->product_id = $product->id;
                    $uploadPath2 = 'image_product_detail/';
                    $file->move($uploadPath2,$productImage_name); 
                    $productImage->save();
                }
            }
       }

      return redirect()->route('list-product')->with(['flash_level'=>'success','flash_message'=>'Sửa sản phẩm thành công']);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $orderDetails = DB::table('order_details')->where('product_id',$id)->get();
         foreach($orderDetails as $order)
         {
          $orderID = $order->id;
            OrderDetail::destroy($orderID);
         }
        Product::destroy($id);
        $productDetail = ProductDetail::where('product_id',$id)->get();
        foreach ($productDetail as $product) {
            $product_id = $product->id;
            ProductDetail::destroy($product_id);
        }
        $productImage = ProductImage::where('product_id',$id)->get();
        foreach ($productImage as $product) {
            $product_id = $product->id;
            ProductImage::destroy($product_id);
        } 
        return redirect()->route('list-product')->with(['flash_level'=>'success','flash_message'=>'Xóa sản phẩm thành công']);
    }
    public function search(Request $request)
    {

      $listProducts = Product::with('category','brand')->orderBy('id','DESC')->where('name','LIKE','%'.$request->search.'%')->orWhere('id',$request->search)->paginate(10);
      
        return view('product.index',compact('listProducts'));
    }
}
