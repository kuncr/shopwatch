<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đồng hồ lesonwatch</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap-3.1.1-dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/webadmin.css')}}">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Quản lý</h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Xin chào: {{ Auth::user()->name }}
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage"><form id="frm-logout" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button>Đăng xuất</button>
                                </form></a></li>
                
              <li></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="{{route('list-product')}}" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Quản lý
              </a>
              <a href="{{route('list-product')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Quản lý sản phẩm <span class="badge"></span></a>
              <a href="{{route('list-category')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Quản lý loại hàng <span class="badge"></span></a>
              <a href="{{route('list-brand')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Quản lý thương hiệu <span class="badge"></span></a>
              
              <a href="{{route('list-order')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Quản lý order  <span class="badge"></span></a>
              <a href="{{route('list-user')}}" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Quản lý user  <span class="badge"></span></a>
            </div>
         
            
          </div>
           <div class="col-md-9">
            @yield('content')
          </div>
         
        </div>
      </div>
    </section>

  <div class="row">
    @yield('script')
  </div>
  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('bootstrap-3.1.1-dist/js/jquery.min.js')}}"></script>
        <!-- Bootstrap JavaScript -->
    <script src="{{asset('bootstrap-3.1.1-dist/js/bootstrap.min.js')}}"></script>
  </body>
</html>
