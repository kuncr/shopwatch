<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Product;
use App\Category;
use App\Brand;
use Mail;
use App\ProductDetail;
use App\ProductImage;
use DB;
use App\Order;
use App\OrderDetail;
use App\Http\Requests\OrderRequest;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $listCategory = Category::all();
        $listBrand = Brand::all();
        // //Get ID of men category
        $menCategoryID = DB::table('categories')->where('name','Đồng hồ nam')->value('id');
        $listMenProduct = Product::where('category_id',$menCategoryID)->paginate(6);
        //Get ID of women product
        $womenCategoryID = DB::table('categories')->where('name','Đồng hồ nữ')->value('id');
        $listWomenProduct = Product::where('category_id',$womenCategoryID)->paginate(6);
        //Get ID of couple product
        $coupleCategoryID = DB::table('categories')->where('name','Đồng hồ cặp')->value('id');
        $listCoupleProduct = Product::where('category_id',$coupleCategoryID)->paginate(6);
        $content = Cart::content();
        $count = Cart::count();
        $param = array('content'=>$content,'count'=>$count,'listCategory'=>$listCategory,'listBrand'=>$listBrand,'listMenProduct'=>$listMenProduct,'listWomenProduct'=>$listWomenProduct,'listCoupleProduct'=>$listCoupleProduct);

        if(\Auth::check())
        {
            $user = Auth::user();
            return view('shop.index',compact('param','user'));
        }
        return view('shop.index',compact('param'));
    }
    public function contact()
    {
        $listCategory = Category::all();
        $listBrand = Brand::all();
        $content = Cart::content();
        $count = Cart::count();
        $total = Cart::total();
        $param = array('content'=>$content,'count'=>$count,'total'=>$total,'listCategory'=>$listCategory,'listBrand'=>$listBrand);
        if(\Auth::check())
        {
            $user = Auth::user();
            return view('shop.contact',compact('param','user'));
        }
        return view('shop.contact',compact('param'));
    }
    public function postContact(Request $Request)
    {
        $data = ['name'=>$Request->name,'email'=>$Request->email,'content'=>$Request->content];
        Mail::send('shop.email',$data,function($msg){
            $msg->from('kull18tuoi@gmail.com','SHOPWATCH');
            $msg->to('kull18tuoi@gmail.com','le son')->subject('SHOPWATCH-CONTACT');
        });
        echo "<script>
            alert('Cám ơn bạn đã góp ý. Chúng tôi sẽ liên lạc trong thời gian sớm nhất');
            window.location = '";
            echo route('shop');
            echo "'
             </script>";
       
    }
    public function addCart($id)
    {
        $product = DB::table('products')->where('id',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>1,'price'=>$product->price,'weight'=>0,'options'=>array('image'=>$product->image)));
        
        $content = Cart::content();
        return redirect()->route('shop');
    }
    public function showCart()
    {
        $listCategory = Category::all();
        $listBrand = Brand::all();
        $content = Cart::content();
        $count = Cart::count();
        $total = Cart::total();
        // dd($content);
        $param = array('content'=>$content,'count'=>$count,'total'=>$total,'listCategory'=>$listCategory,'listBrand'=>$listBrand);
        if(\Auth::check())
        {
            $user = Auth::user();
            return view('shop.cart',compact('param','user'));
        }
        return view('shop.cart',compact('param'));

    }
    public function deleteCart($id)
    {
        Cart::remove($id);
        return redirect()->route('show-cart');
    }
    public function updateCart(Request $Request)
    {
        Cart::update($Request->rowId,$Request->quantity);
        return redirect()->route('show-cart');
    }
    public function getProductDetail($id)
    {
        $product = Product::with('category','brand')->where('id',$id)->first();
        $productDetail = ProductDetail::where('product_id',$id)->first();
        $productImages = ProductImage::all()->where('product_id',$id)->toArray();
        $content = Cart::content();
        $count = Cart::count();
        $total = Cart::total();
        $listCategory = Category::all();
        $listBrand = Brand::all();
        $productSameCategory = Product::where('category_id',$product->category_id)->paginate(6);
        $param = array('content'=>$content,'count'=>$count,'total'=>$total,'listCategory'=>$listCategory,'listBrand'=>$listBrand,'product'=>$product,'productDetail'=>$productDetail,'productImages'=>$productImages,'productSameCategory'=>$productSameCategory);

        return view('shop.product_detail',compact('param'));
    }
    public function getOrder()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        $content = Cart::content();
        $count = Cart::count();
        $total = Cart::total();
        $listCategory = Category::all();
        $listBrand = Brand::all();
        $param = array('content'=>$content,'count'=>$count,'total'=>$total,'listCategory'=>$listCategory,'listBrand'=>$listBrand);
        return view('shop.order',compact('param'));
    }
    public function storeOrder(OrderRequest $Request)
    {
        $content = Cart::content();
        $order =  new Order();
        $order->tel = $Request->tel;
        $order->address = $Request->address;
        $order->user_id = Auth::user()->id;
        $order->confirm = 0;
        $order->save();
        foreach($content as $item)
        {
            $order_detail = new OrderDetail();
            $order_detail->quantity = $item->qty;
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $item->id;
            $order_detail->save();
            $productDetail = ProductDetail::where('product_id',$item->id)->first();
            $productDetail->amount = $productDetail->amount-$item->qty;
            $productDetail->save();
        }
        Cart::destroy();
        echo "<script>
            alert('Cám ơn bạn đã mua hàng. Chúng tôi sẽ giao hàng trong thời gian sớm nhất');
            window.location = '";
            echo route('shop');
            echo "'
             </script>";

    }
    public function listProductByCategory($id)
    {
        $content = Cart::content();
        $count = Cart::count();
        $total = Cart::total();
        $listProduct = Product::where('category_id',$id)->paginate(12);
        // dd($listProduct);
        $listCategory = Category::all();
        $listBrand = Brand::all();
        $name = DB::table('categories')->where('id',$id)->value('name');
        $param = array('content'=>$content,'count'=>$count,'total'=>$total,'listCategory'=>$listCategory,'listBrand'=>$listBrand,'name'=>$name,'listProduct'=>$listProduct);
        return view('shop.listProductByCategory',compact('param'));
    }
    public function listProductByBrand($id)
    {
        $content = Cart::content();
        $count = Cart::count();
        $total = Cart::total();
        $listProduct = Product::where('brand_id',$id)->paginate(12);
        // dd($listProduct);
        $listCategory = Category::all();
        $listBrand = Brand::all();
        $brand = DB::table('brands')->where('id',$id)->first();
   
        $param = array('content'=>$content,'count'=>$count,'total'=>$total,'listCategory'=>$listCategory,'listBrand'=>$listBrand,'brand'=>$brand,'listProduct'=>$listProduct);
        return view('shop.listProductByBrand',compact('param'));
    }
     public function fetch(Request $request)
    {
        if($request->get('query')) 
        {
            $query = $request->get('query');
            $data = DB::table('products')->where('name','LIKE','%'.$query.'%')->paginate(5);
            $output = '<ul class="dropdown-menu" style="display:block;position:relative;">';
            foreach ($data as $product) {
                $output .= '<li><a href="/products/details/'.$product->id.'" style="float: left;width="400px;">'.$product->name.'<img src="/image_product/'.$product->image.'" width="60px" style="float: right;" alt=""></a></li>';

            }
            $output.='</ul>';
            echo $output;
        }
    }
    public function search(Request $request)
    {
        $listCategory = Category::all();
        $listBrand = Brand::all();
        $content = Cart::content();
        $count = Cart::count();
        $param = array('content'=>$content,'count'=>$count,'listCategory'=>$listCategory,'listBrand'=>$listBrand);
        $search_value = '%'.$request->search_value.'%';
        $data = DB::table('products')->where('name','LIKE',$search_value)->get();
        $query = $request->search_value;
        return view('shop.search',compact('query','data','param'));
    }
}
