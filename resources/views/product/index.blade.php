@extends('layouts.master_admin')
@section('content')
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Quản lý sản phẩm</h3>
              </div>
             
              </div>
              
              <!-- Latest Users -->
              <div class="col-md-5">
                 
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <a href="{{route('create-product')}}"><button type="button" class="btn btn-danger" id="btn_addnew">Thêm mới</button></a>
                  <br>
                
                </div>
                <form class="navbar-form pull-right" action="{{route('admin-product-search')}}" method="POST">
                  @csrf
                  <input type="text" name="search" style="width: 300px;height: 30px;text-indent: 10px;" placeholder="Nhập tên hoặc id cần tìm">
                  <button type="submit" class="btn btn-danger">Tìm kiếm</button>
                </form>
                
                <div class="col-lg-12">
                  @if(Session::has('flash_message'))
                    <div class="alert alert-{{Session::get('flash_level')}}">
                      {{{Session::get('flash_message')}}}
                    </div>
                  @endif
                  </div>
                <div class="panel-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Loại hàng</th>
                        <th>Thương hiệu</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th colspan="2"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($listProducts as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td><a href="{{route('product-show-detail',$product->id)}}">{{$product->name}}</a></td>
                      <td>{{$product->category->name}}</td>
                      <td>{{$product->brand->name}}</td>
                      <td>{{$product->price}}</td>
                      <td><img src="/image_product/{{$product->image}}" alt="{{$product->image}}" width="50px"></td>
                      <td><a href="{{route('edit-product',$product->id)}}"><img src="https://img.icons8.com/wired/64/000000/edit.png" width="30px"></a>
                        <br>
                     
                          <form action="{{route('delete-product',$product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger"><img src="https://img.icons8.com/ios-glyphs/16/000000/delete-sign.png"></button>
                          </form>
                        </td>
                    </tr>   
                    @endforeach  
                    </tbody>
                  </table>
                  <div class="row"> {{$listProducts->links()}}</div>
              </div>
              
          
@endsection
