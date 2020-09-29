@extends('layouts.master_login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!---<div class="card-header">{{ __('Please,Verify Your Email Address') }}</div>-->
                <br><br><br>  
                <div class="card-body">
                <form method="POST" action="" class="form_login" >    
                <h2 class="text-center">Xác nhận địa chỉ Email</h2>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                            <!--<p>{{ __('This is a custom text') }}</p>-->
                        </div>
                    @endif

                    <h4 class="chido">{{ __('Trước khi tiếp tục, vui lòng kiểm tra email của bạn để biết liên kết xác minh..') }}
                    {{ __('Nếu bạn không nhận được email,') }} <a  class="link" href="{{ route('verification.resend') }}">{{ __('hãy nhấp vào đây.') }}</a></h4>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
