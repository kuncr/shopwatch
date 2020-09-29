@extends('layouts.master_guest')
@section('content')
	
	<div class="row" id="contact">
		<br><br><br>
		<div class="col-md-6" >
			<div id="form_contact">
				<h2 style="color: #e74c3c;font-weight: bold;">Vui lòng nhập thông tin của bạn</h2>	
			<form action="{{route('save-order')}}" method="POST" role="form">
				@csrf
				<div class="form-group">
					<label for="">Số điện thoại *</label>
					<input type="text" name="tel" class="form-control" id="" placeholder="Vui lòng nhập số điện thoại">
					@if ($errors->has('tel'))
                    <span class="text-danger">{{ $errors->first('tel') }}</span> <br>
                    @endif
					<label for="">Địa chỉ *</label>
					<input type="text" name="address" class="form-control" id="" placeholder="Vui lòng nhập địa chỉ">
					@if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
				</div>
				<button type="submit" style="background-color: #e74c3c;" class="btn btn-primary">Đặt hàng</button>
			</form>
			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-5">
			<div class="row">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8243083730035!2d108.21633391437575!3d16.07460434356469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218374466a2b3%3A0xcef5e92c5a7a3917!2zOTIgUXVhbmcgVHJ1bmcsIFRo4bqhY2ggVGhhbmcsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1564065587234!5m2!1svi!2s" width="450" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="row">
				<h2 style="color: #e74c3c;font-weight: bold;">Thông tin</h2><br>
				<p>Địa chỉ:Lệ xuyên, Quảng trị, Việt Nam</p><br>
				<p>Cửa hàng đồng hồ NHATQUAN</p><br>
				<p>Phone: 0983127775</p><br>
			</div>
		</div>
	</div>
@endsection