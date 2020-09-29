@extends('layouts.master_guest')
@section('content')
    <div class="container">
        <div class="row">
        	 <div class="title">
         	<h4 class="text-center">ĐỒNG HỒ NAM</h4>
         </div>
         <div class="row">
         	@foreach($param['listMenProduct'] as $product)
				<div class="col-md-2 productcart " style="margin-bottom: 10px;">
					<a href="{{route('get-product-detail',$product->id)}}"><img class="product-img"  src="/image_product/{{$product->image}}" width="110%" alt="{{$product->image}}" height="250px"></a>
					<a href="{{route('get-product-detail',$product->id)}}">{{$product->name}}</a>
					<p style="color: red;font-weight: bold;">{{number_format($product->price)}} VND</p>
					<a href="{{route('add-cart',$product->id)}}"><button class="btn-danger">Thêm vào giỏ</button></a>
				</div>
         	@endforeach
         </div>
        </div>
		<div class="row">
			<div class="title">
         	<h4 class="text-center">ĐỒNG HỒ NỮ</h4>
        	</div>
			<div class="row">
         	@foreach($param['listWomenProduct'] as $product)
				<div class="col-md-2 productcart"  style="margin-bottom: 10px;">
					<a href="{{route('get-product-detail',$product->id)}}"><img class="product-img" src="/image_product/{{$product->image}}" width="110%" alt="{{$product->image}}" height="250px"></a>
					<a href="{{route('get-product-detail',$product->id)}}">{{$product->name}}</a>
					<p style="color: red;font-weight: bold;">{{number_format($product->price)}} VND</p>
					<a href="{{route('add-cart',$product->id)}}"><button class="btn-danger">Thêm vào giỏ</button></a>
				</div>
         	@endforeach
         </div>
		</div>
		<div class="row">
			<div class="title">
         	<h4 class="text-center">ĐỒNG HỒ ĐÔI</h4>
        	</div>
			<div class="row">
         	@foreach($param['listCoupleProduct'] as $product)
				<div class="col-md-2 productcart" style="margin-bottom: 10px;">
					<a href="{{route('get-product-detail',$product->id)}}"><img class="product-img" src="/image_product/{{$product->image}}" width="110%" alt="{{$product->image}}" height="250px"></a>
					<a href="{{route('get-product-detail',$product->id)}}">{{$product->name}}</a>
					<p style="color: red;font-weight: bold;">{{number_format($product->price)}} VND</p>
					<a href="{{route('add-cart',$product->id)}}"><button class="btn-danger">Thêm vào giỏ</button></a>
				</div>
         	@endforeach
         </div>
		</div>

    </div>
@endsection