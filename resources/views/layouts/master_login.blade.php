<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('bootstrap-3.1.1-dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/weblogin.css')}}">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
			<div class="header">
            <div class="container" id="menu_header">
                <div class="col-md-6">
                    Telephone: 0943434334
                </div>
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-3" id="menu_header">
                       
                           <ul>
                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                        <li><a href="\login">Đăng nhập</a></li>
                        
                        </ul>
                        
                        
                    
                    </div>
                </div>
        </div>
	
		<div class="row,content">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				@yield('content')
			</div>
			<div class="col-md-3"></div>
		</div>
		@yield('script')
		<!-- jQuery -->
		<script src="{{asset('bootstrap-3.1.1-dist/js/jquery.min.js')}}"></script>
        <!-- Bootstrap JavaScript -->
        <script src="{{asset('bootstrap-3.1.1-dist/js/bootstrap.min.js')}}"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>