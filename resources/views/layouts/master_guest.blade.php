<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đồng hồ lesonwatch</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('bootstrap-3.1.1-dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/webmain.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-4" id="menu_header">
                        @guest
                           <ul>
                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                        <li><a href="\login">Đăng nhập</a></li>
                        
                        </ul>
                        @else
                            <ul>
                                <li><form id="frm-logout" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button>Đăng xuất</button>
                                </form></li>
                                <li>Xin chào: {{ Auth::user()->name }}</li>

                            </ul>
                        @endguest
                        
                    
                    </div>
                </div>
        </div>
        <div class="container">
            <div class="col-md-3">
                <h1>LESON</h1>
            </div>
            <div class="col-md-6">
                <div class="row" id="form_search">
                    <form action="{{route('search-product')}}" method="POST" role="form">
                   
                    <div class="form-group">
                        
                        <input type="text" name="search_value" class="form-control" id="product_name" placeholder="Nhập tên sản phẩm cần tìm" autocomplete="off">
                        <button type="submit" class="btn btn-primary">Tìm</button>
                    </div>
                    @csrf
                </form>
                
                </div>
                <div id="productList" style="position: absolute;"></div>
            </div>
            <div class="col-md-1">
                
            </div>
            <div class="col-md-2">
                
                <div class="row" id="cart">
                    <a href="{{route('show-cart')}}"><img src="https://img.icons8.com/ios/64/000000/shopping-cart.png" width="50px" alt=""></a>
                <ul>
                    <li class="dropdown" id="list_cart">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><sup style="color: blue;font-size: 100%;"> {{$param['count']}} Sản phẩm</sup>
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach($param['content'] as $item)
                  <li style="color: blue;margin-bottom: 20px;">
                   <img src="/image_product/{{$item->options->image}}" alt="" width="50px">
                        {{$item->name}}&nbsp; &nbsp; &nbsp; &nbsp; {{number_format($item->price)}} &nbsp; &nbsp;VND 
                  
  
                    
                  </li>
                  @endforeach
                  <li>
                      <a href="{{route('show-cart')}}"><button type="button" class="btn btn-large btn-block btn-primary, cart_button">XEM TẤT CẢ</button></a>
                  </li>

                  <li><a href="{{route('get-order')}}"><button type="button" class="btn btn-large btn-block btn-primary, cart_button">ĐẶT HÀNG</button></a></li>
                </ul>

              </li>
                </ul>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-inverse" id="nav">
          <div class="container-fluid, nav_header">
            <div class="navbar-header">
             
            </div>
            <div class="container">
                <ul class="nav navbar-nav">
              <li class="active, nav_header"><a href="{{route('shop')}}">TRANG CHỦ</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">LOẠI ĐỒNG HỒ
                <span class="caret"></span></a>
                <ul class="dropdown-menu" >
                    @foreach($param['listCategory'] as $category)
                  <li><a href="{{route('search-product-by-category',$category->id)}}">{{$category->name}}</a></li>
                    @endforeach()
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">THƯƠNG HIỆU
                <span class="caret"></span></a>
                <ul class="dropdown-menu" >
                    @foreach($param['listBrand'] as $brand)
                  <li><a href="{{route('search-product-by-brand',$brand->id)}}">{{$brand->name}}</a></li>
                    @endforeach()
                </ul>
              </li>
              <li class="active, nav_header"><a href="{{route('contact')}}">LIÊN HỆ</a></li>
            
            </ul>
            </div>
          </div>
        </nav>

        <div class="row">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <footer style="background-color: #656B70;margin-top: 50px;">
            <div class="container">
                <div style="margin-top: 70px;color: black;font-size: 120%;">
                    <div class="col-md-3" style="text-align: center;">
                        <img src="/image_web/hd1.png" alt="">
                        <p><b>Giao hàng nhanh chóng</b></p>
                        <p>Miễn phí trả hàng</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="/image_web/ht2.png" alt="">
                        <p><b>Thanh toán tiện lợi</b></p>
                        <p>Thanh toán với độ tin cậy và an toàn cao</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="/image_web/hd3.png" alt="">
                        <p><b>Mua sắm với sự hài lòng</b></p>
                        <p>Mua sắm tiện lợi và hài lòng về dịch vụ giao hàng</p>
                    </div>
                    <div class="col-md-3" style="text-align: center;">
                        <img src="/image_web/hd4.png" alt="">
                        <p><b>Hỗ trợ 24/7</b></p>
                        <p>Vui lòng liện hệ với chúng tôi nếu có bất cứ vấn đề gì</p>
                    </div>
                </div>
            </div>
        </footer>
        <script language="javascript" type="text/javascript">
        $(document).ready(function(){
            $('#product_name').keyup(function(){
                var query = $(this).val();
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{route('autocomplete')}}",
                        method: "POST",
                        data:{query:query, _token:_token},
                        success:function(data)
                        {
                            $('#productList').fadeIn();
                            $('#productList').html(data);
                        }
                    })
                }
            });
        });
    </script>
        <!-- jQuery -->
        <script src="{{asset('bootstrap-3.1.1-dist/js/jquery.min.js')}}"></script>
        <!-- Bootstrap JavaScript -->
        <script src="{{asset('bootstrap-3.1.1-dist/js/bootstrap.min.js')}}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
         
    </body>
</html>