@extends('layouts.master_guest')
@section('content')
	<div class="title">
			<div class="col-md-12">
				<h4 class="text-center">{{$param['brand']->name}}</h4>
			<h4 class="text-center">
				<img src="/image_brand/{{$param['brand']->image}}" alt="{{$param['brand']->image}}"/>
			</h4>
			<h5 class="text-center"><i>{{$param['brand']->description}}</i></h5>
			</div>
    </div>
    <div class="row">
    	 @foreach($param['listProduct'] as $product)
				<div class="col-md-3 productcart" style="margin-bottom: 20px;">
					<a href="{{route('get-product-detail',$product->id)}}"><img class="product-img" src="/image_product/{{$product->image}}" width="100%" alt="{{$product->image}}"height="300px"></a>
					<a href="{{route('get-product-detail',$product->id)}}">{{$product->name}}</a>
					<p style="color: red;font-weight: bold;">{{number_format($product->price)}} VND</p>
					<a href="{{route('add-cart',$product->id)}}"><button class="btn-danger">Thêm vào giỏ</button></a>
				</div>
    @endforeach
    </div>
    <div class="col-md-6"> {{$param['listProduct']->links()}}</div>
@endsection