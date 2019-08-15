<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $request->except('_token');
        Category::create($category);
        return redirect()->route('list-category')->with(['flash_level'=>'success','flash_message'=>'Thêm loại hàng thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,$id)
    {
        $category = Category::find($id);
        $data = $request->except('_token','_method');
        $category->update($data);
        return redirect()->route('list-category')->with(['flash_level'=>'success','flash_message'=>'Cập nhật loại hàng thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        $listProducts = Product::where('category_id',$id)->get();
        foreach ($listProducts as $product) {
            $product_id = $product->id;
            Product::destroy($product_id);
        }
        return redirect()->route('list-category')->with(['flash_level'=>'success','flash_message'=>'Xóa loại hàng thành công']);
    }
    public function listProductByCategory($id)
    {
        $listProducts = Product::with('category','brand')->where('category_id',$id)->get();
        return view('product.index',compact('listProducts'));
    }
}
