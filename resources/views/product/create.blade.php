@extends('layouts.master_admin')
@section('content')
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Quản lý sản phẩm</h3>
              </div>
             		<div>
             			<form action="{{route('store-product')}}" method="POST" enctype="multipart/form-data">
             			<legend>Thêm sản phẩm mới</legend>
             			<div class="col-md-6">
             				@csrf
             				<br>
             				<label for="">Tên sản phẩm *</label>
                                    
             				<input type="text" name="name" class="form-control" id="" placeholder="Nhập tên sản phẩm" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span><br>
                                    @endif
             				<label for="">Loại sản phẩm</label>
             				<select name="category_id" class="form-control" id="">
             					@foreach($listCategory as $category)
             					<option value="{{$category->id}}">{{$category->name}}</option>
             					@endforeach
             				</select>
             				<label for="">Thương hiệu</label>
             				<select name="brand_id" class="form-control" id="">
             					@foreach($listBrand as $brand)
             					<option value="{{$brand->id}}">{{$brand->name}}</option>
             					@endforeach
             				</select>
             				<label for="">Giá *</label>
                                   
             				<input type="text" name="price" class="form-control" id="" placeholder="Nhập tên sản phẩm" value="{{old('price')}}">
                                     @if ($errors->has('price'))
                                    <span class="text-danger">{{ $errors->first('price') }}</span> <br>
                                    @endif
             				
             				<label for="">Hình ảnh *</label>
             				<input type="file" name="fimage" class="form-control"}}" 
             				 >
             				@if ($errors->has('fimage'))
                                    <span class="text-danger">{{ $errors->first('fimage') }}</span>
                                    <br>
                                    @endif
             				 <label for="">Mô tả *</label> 
                                    
             				<textarea name="description" id="input" class="form-control" rows="3" >{{old('description')}}</textarea>
                                     @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span><br>
                                    @endif
             			</div>
             			<div class="col-md-6">
             				<label for="">Chi tiết sản phẩm</label><br>
             				
             				<label for="">Chất liệu *</label>
                                   
             				<input type="text" name="material" class="form-control" id="" placeholder="Input field" value="{{old('material')}}">
             				 @if ($errors->has('material'))
                                    <span class="text-danger">{{ $errors->first('material') }}</span><br>
                                    @endif
             				<label for="">Vỏ *</label>
                                    
             				<input type="text" name="case" name="material" class="form-control" id="" placeholder="Input field" value="{{old('case')}}">
             				@if ($errors->has('case'))
                                    <span class="text-danger">{{ $errors->first('case') }}</span><br>
                                    @endif
							<label for="">Dây *</label>
                                         
             				<input type="text" name="strap" name="material" value="{{old('strap')}}" class="form-control" id="" placeholder="Input field">
             				 @if ($errors->has('strap'))
                                    <span class="text-danger">{{ $errors->first('strap') }}</span><br>
                                    @endif
             				<label for="">Chống nước *</label>
                                    
             				<input type="text" name="water_resistance" class="form-control" id="" placeholder="Input field" value="{{old('water_resistance')}}">
             				@if ($errors->has('water_resistance'))
                                    <span class="text-danger">{{ $errors->first('water_resistance') }}</span>
                                    <br>
                                    @endif
             				<label for="">Số lượng *</label>
                                    
             				<input type="text" name="amount" value="{{old('amount')}}" class="form-control" id="" placeholder="Input field">
                                    @if ($errors->has('amount'))
                                    <span class="text-danger">{{ $errors->first('amount') }}</span><br>
                                    @endif
             				<label for="">Ảnh chi tiết *</label>
             				<br>
							
             				<input type="file" name="fimage_details[]" multiple>

                                          @if ($errors->has('fimage_details'))
                                    <span class="text-danger">{{ $errors->first('fimage_details') }}</span><br>
                                    @endif
             				
             				<br>
             			</div>
             			
             			<button type="submit" class="btn btn-primary">Thêm</button>
             		</form>
             		</div>
              </div>
              
            
          
@endsection
