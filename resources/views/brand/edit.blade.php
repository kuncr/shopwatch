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
                                 <form action="{{route('update-brand',$brand->id)}}" method="POST" enctype="multipart/form-data">
                              <legend>Cập nhật thương hiệu</legend>
                              
                                    @csrf
                                    @method('PUT')
                                    <br>
                                    <label for="">Tên thương hiệu</label>
                                    <input type="text" name="name" class="form-control" value="{{$brand->name}}">
                                     @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span><br>
                                    @endif
                                    <label for="">Mô tả</label>
                                    
                                    <textarea name="description" id="inputDescription" class="form-control" rows="3" >{{$brand->description}}</textarea>
                                     @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span><br>
                                    @endif
                                    <br>
                                    <img src="/image_brand/{{$brand->image}}" alt="{{$brand->image}}"><br>
                                    <label for="">Hình ảnh</label>

                                    <input type="file" name="image" class="form-control"}}" 
                                     >
                                    <br>
                                    
                              
                              
                              <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                           </div>
                           <div class="col-md-3"></div>
             		</div>
              </div>
              
            
          
@endsection
