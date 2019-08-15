@extends('layouts.master_guest')
@section('content')
		<br><br><br>
		<div>
			<div class="col-md-5">
			<img src="/image_product/{{$param['product']->image}}" width="100%" alt="{{$param['product']->image}}">
		</div>
		<div class="col-md-1">
			
		</div>
		<div class="col-md-6">
			<table>
				<tr>
					<td class="title-td">Tên sản phẩm:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>{{$param['product']->name}}</td>
				</tr>
				<tr>
					<td class="title-td">Thương hiệu:</td>
					<td>{{$param['product']->brand->name}}</td>
				</tr>
				<tr>
					<td class="title-td">Loại hàng:</td>
					<td>{{$param['product']->category->name}}</td>
				</tr>
				<tr>
					<td class="title-td">Chất liệu: </td>
					<td>{{$param['productDetail']->material}}</td>
				</tr>
				<tr>
					<td class="title-td">Vỏ: </td>
					<td>{{$param['productDetail']->case}}</td>
				</tr>
				<tr>
					<td class="title-td">Dây: </td>
					<td>{{$param['productDetail']->strap}}</td>
				</tr>
				<tr>
					<td class="title-td">Độ chống nước: </td>
					<td>{{$param['productDetail']->water_resistance}}</td>
				</tr>
				<tr>
					<td class="title-td">Trạng thái: </td>
					@if(($param['productDetail']->amount)>0)
					<td>Còn hàng</td>
					@endif
					@if(($param['productDetail']->amount)<=0)
					<td>Hết hàng</td>
					@endif
				</tr>
				
			</table>
			<br><br>
			<div class="col-md-4">
				<a href="{{route('add-cart',$param['product']->id)}}" style="font-weight: bold;"><button type="button" class="btn btn-danger">Thêm vào giỏ hàng</button></a>
			</div>
		</div>
		
			
		
		</div>
		<br><br>
	<div>
		<div class="col-md-12">
			<h3>Mô tả:</h3>
			<p>{{$param['productDetail']->description}}</p>
		</div>
	</div>
	<div>
		<div class="col-md-12">
			<h3>Hình ảnh chi tiết:</h3>
		</div>
		@foreach($param['productImages'] as $image)
			<div class="col-md-4">
				<img src="/image_product_detail/{{$image['name']}}" alt="{{$image['name']}}" width="100%">
			</div>
		@endforeach
	</div>
	<div>
		<div class="col-md-12">
			<h3>Sản phẩm cùng loại</h3>
		</div>
		@foreach($param['productSameCategory'] as $product)
			<div class="col-md-2">
				<a href="{{route('get-product-detail',$product->id)}}"><img src="/image_product/{{$product->image}}" width="110%" alt="{{$product->image}}"></a>
				<a href="{{route('get-product-detail',$product->id)}}">{{$product->name}}</a>
				<p style="color: red;font-weight: bold;">{{$product->price}} VND</p>
			</div>
		@endforeach
	</div>
	
		
	
@endsection