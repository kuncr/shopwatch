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
					@isset($param['productDetail']->material)
					<td>{{$param['productDetail']->material}}</td>
					@endisset
				</tr>
				<tr>
					<td class="title-td">Vỏ: </td>
					@isset($param['productDetail']->case)
					<td>{{$param['productDetail']->case}}</td>
					@endisset
				</tr>
				<tr>
					<td class="title-td">Dây: </td>
					@isset($param['productDetail']->strap)
					<td>{{$param['productDetail']->strap}}</td>
					@endisset
				</tr>
				<tr>
					<td class="title-td">Độ chống nước: </td>
					@isset($param['productDetail']->water_resistance)
					<td>{{$param['productDetail']->water_resistance}}</td>
					@endisset
				</tr>
				<tr>
					<td class="title-td">Trạng thái: </td>
					@isset($param['productDetail']->amount)
					@if(($param['productDetail']->amount)>0)
					<td>Còn hàng</td>
					@endisset
					
					@endif
					@isset($param['productDetail']->amount)
					@if(($param['productDetail']->amount)<=0)
					<td>Hết hàng</td>
					@endisset
					
					@endif
				</tr>
                <tr>
                    <td class="title-td">Giá: </td>
                    <td><span>{{number_format($param['product']->price)}} VND</span>
                    </td>
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
			@isset($param['productDetail']->description)
			<p>{{$param['productDetail']->description}}</p>
			@endisset
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
			<div class="col-md-2 productcart">
				<a href="{{route('get-product-detail',$product->id)}}"><img class="product-img" src="/image_product/{{$product->image}}" width="110%" alt="{{$product->image}}"height="250px"></a>
				<a href="{{route('get-product-detail',$product->id)}}">{{$product->name}}</a>
				<p style="color: red;font-weight: bold;">{{$product->price}} VND</p>
			</div>
		@endforeach
	</div>
	
		
	
@endsection