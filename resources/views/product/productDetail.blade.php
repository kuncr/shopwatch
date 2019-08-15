@extends('layouts.master_admin')
@section('content')
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Quản lý sản phẩm</h3>
              </div>
                  <div class="col-md-6">
                        <h2 >Chi tiết sản phẩm</h2>
                        
                        <h3>Mã sản phẩm:{{$product->id}} </h3><br>
                        <h3>Tên sản phẩm:{{$product->name}}</h3> <br>
                        <h3>Loại sản phẩm:{{$product->category->name}}</h3> <br>
                        <h3>Thương hiệu:{{$product->brand->name}}</h3> <br>
                        <h3>Giá:{{$product->price}} </h3><br>
                        <img src="/image_product/{{$product->image}}" alt="$product->image" width="120px">
                  </div>
                  <div class="col-md-6">
                        <br>
                        <div class="col-md-10"></div>
                        <div class="col-md-2"><a href="{{route('list-product')}}"><button class="btn-default">Đóng</button></a></div>
                        <br>
                        <h3>Chất liệu:{{$productDetail->material}}</h3>; <br>
                        <h3>Vỏ:{{$productDetail->case}}</h3> <br>
                        <h3>Dây:{{$productDetail->strap}}</h3> <br>
                        <h3>Chống nước:{{$productDetail->water_resistance}}</h3> <br>
                        <h3>Số lượng còn lại:{{$productDetail->amount}}</h3> <br>
                        <h3>Mô tả:</h3><br>
                        <h3>{{$productDetail->description}}</h3>
                        
                        <br>
                        @foreach($listImage as $image)
                        <div class="col-md-4"><img src="/image_product_detail/{{$image['name']}}" alt="" width="70px"></div>
                        @endforeach

                  </div>
                  
              </div>
              
            
          
@endsection
