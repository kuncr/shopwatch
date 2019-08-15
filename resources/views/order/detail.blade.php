@extends('layouts.master_admin')
@section('content')
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Quản lý order</h3>
              </div>
             
              </div>
              
              <!-- Latest Users -->
              <div class="panel panel-default">
                
                <div class="panel-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Hình ảnh</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($listOrder as $order)
                    <tr>
                      <td>{{$order->product->id}}</td>
                      <td>{{$order->product->name}}</td>
                      <td>{{$order->quantity}}</td>
                      <td><img src="/image_product/{{$order->product->image}}" alt="{{$order->product->image}}" width="70px"></td>
                  
                    </tr>   
                    @endforeach  
                    </tbody>
                  </table>
                </div>
              </div>
              
          
@endsection
