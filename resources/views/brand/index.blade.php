@extends('layouts.master_admin')
@section('content')
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Quản lý thương hiệu</h3>
              </div>
             
              </div>
              
              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <a href="{{route('create-brand')}}"><button type="button" class="btn btn-danger" id="btn_addnew">Thêm mới</button></a>
                  <br>
                  
                </div>
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
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>
                        <th colspan="2"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($listBrand as $brand)
                    <tr>
                      <td>{{$brand->id}}</td>
                      <td><a href="{{route('list-product-by-brand',$brand->id)}}">{{$brand->name}}</a></td>
                      <td>{{$brand->description}}</td>
                      <td><img src="/image_brand/{{$brand->image}}" alt="{{$brand->image}}" width="70px"></td>
                      <td><a href="{{route('edit-brand',$brand->id)}}"><img src="https://img.icons8.com/wired/64/000000/edit.png" width="30px"></a>
                      
                          <form action="{{route('delete-brand',$brand->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger"><img src="https://img.icons8.com/ios-glyphs/16/000000/delete-sign.png"></button>
                          </form>
                        </td>
                    </tr>   
                    @endforeach  
                    </tbody>
                  </table>
                </div>
              </div>
              
          
@endsection
