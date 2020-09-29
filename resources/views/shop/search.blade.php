@extends('layouts.master_guest')
@section('content')
	<h2 style="color: black;">Kết quả tìm kiếm cho: {{$query}}</h2><br><br>
	<div class="row">
    	 @foreach($data as $product)
				<div class="col-md-2">
					<a href="{{route('get-product-detail',$product->id)}}"><img src="/image_product/{{$product->image}}" width="110%" alt="{{$product->image}}" height="250px"></a>
					<a href="{{route('get-product-detail',$product->id)}}">{{$product->name}}</a>
					<p style="color: red;font-weight: bold;">{{number_format($product->price)}} VND</p>
					<a href="{{route('add-cart',$product->id)}}"><button class="btn-danger">Thêm vào giỏ</button></a>
				</div>
    @endforeach
    </div>
@endsection