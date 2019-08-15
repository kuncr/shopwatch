@extends('layouts.master_admin')
@section('content')
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Quản lý thương hiệu</h3>
              </div>
             		<div>
             		   <div class="col-md-3">
                                 
                           </div>
                           <div class="col-md-6">
                                 <form action="{{route('store-brand')}}" method="POST" enctype="multipart/form-data">
                              <legend>Thêm thương hiệu</legend>
                              
                                    @csrf
                                    <br>
                                    <label for="">Tên thương hiệu</label>
                                   
                                    <input type="text" name="name" class="form-control" id="" placeholder="Nhập tên sản phẩm" value="{{old('name')}}">
                                     @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span><br>
                                    @endif
                                    <label for="">Mô tả</label>
                                   
                                    <textarea name="description" id="inputDescription" class="form-control" rows="3"></textarea>
                                     @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span><br>
                                    @endif
                                    
                                    <label for="">Hình ảnh</label>
                                    <input type="file" name="image" class="form-control"}}" 
                                     >
                                     @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                    <br>
                                    
                              
                              
                              <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                           </div>
                           <div class="col-md-3"></div>
             		</div>
              </div>
              
            
          
@endsection
