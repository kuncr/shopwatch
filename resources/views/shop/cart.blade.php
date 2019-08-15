@extends('layouts.master_guest')
@section('content')
	<h3 style="color: red;font-weight: bold;">Giỏ hàng của bạn</h3>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Hình ảnh</th>
				<th>Xóa/Cập nhật</th>
				<th>Tổng</th>
			</tr>
		</thead>
		<tbody>
			@php
				$total=0;
			@endphp
			@foreach($param['content'] as $item)
				<tr>
					<form action="{{route('update-cart')}}" method="POST">
					<td><a href="">{{$item->name}}</a></td>
					<td>{{$item->price}}</td>
					<td><input type="text" size="1" value="{{$item->qty}}" name="quantity"></td>
					<td><img src="/image_product/{{$item->options->image}}" width="100px"  alt=""></td>
					<td><a href="{{route('delete-cart',$item->rowId)}}"><img src="https://img.icons8.com/wired/64/000000/delete-sign.png" width="30px"></a>
							@csrf
							<button type="submit"><img src="https://img.icons8.com/dotty/80/000000/update-left-rotation.png" width="24px"></button>
					</td>
					<td>Tổng: {{$item->price*$item->qty}}</td>
					<input type="hidden" value="{{$item->rowId}}" name="rowId">
					</form>
					@php
						$total+=$item->price*$item->qty;
					@endphp 
				</tr>
			@endforeach
			<tr>
				<td colspan="5"></td>
				<td style="color: red;font-weight: bold;font-size: 150%;">Tổng: {{$total}}</td>
			</tr>
			<tr>
				<td colspan="5"></td>
				<td><a href="{{route('get-order')}}"><button style="width: 70%;font-weight: bold;" type="button" class="btn btn-danger">ĐẶT HÀNG</button></a></td>
			</tr>
		</tbody>
	</table>
@endsection