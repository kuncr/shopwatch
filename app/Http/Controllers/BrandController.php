<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\EditBrandRequest;
use App\Product;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBrand = Brand::orderBy('id','DESC')->get();
        return view('brand.index',compact('listBrand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $data = $request->except('_token');
        $file_name = $request->file('image')->getClientOriginalName();
        $file_name = rand(1,10000).$file_name;
        $data['image'] = $file_name;
        $uploadPath = 'image_brand/';
        $request->file('image')->move($uploadPath,$file_name);
        $brand = Brand::create($data);
        return redirect()->route('list-brand')->with(['flash_level'=>'success','flash_message'=>'Thêm thương hiệu thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(EditBrandRequest $request, $id)
    {
        $brand = Brand::find($id);
        $data = $request->except('_token','_method');
        if($request->hasFile('image'))
        {
            $file_name=$request->file('image')->getClientOriginalName();
            $file_name = rand(1,10000).$file_name;
            $data['image'] = $file_name;
            $uploadPath = 'image_brand/';
            $request->file('image')->move($uploadPath,$file_name);
        }
        $brand->update($data);
        return redirect()->route('list-brand')->with(['flash_level'=>'success','flash_message'=>'Cập nhật thương hiệu thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        $listProducts = Product::where('brand_id',$id)->get();
        foreach ($listProducts as $product) {
            $product_id = $product->id;
            Product::destroy($product_id);
        }
        
        return redirect()->route('list-brand')->with(['flash_level'=>'success','flash_message'=>'Xóa thương hiệu thành công']);
    }
    public function listProductByBrand($id)
    {
        $listProducts = Product::with('category','brand')->where('brand_id',$id)->get();
        return view('product.index',compact('listProducts'))->with(['flash_level'=>'success','flash_message'=>'Xóa sản phẩm thành công']);
    }
}
