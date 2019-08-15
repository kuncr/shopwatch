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
                        <th>Mã</th>
                        <th>SDT</th>
                        <th>Địa chỉ</th>
                        <th>Ngày đặt hàng</th>
                        <th>Khách hàng</th>
                        <th>Tình trạng</th>
                        <th>Chi tiết</th>
                        <th>Xóa</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                        <tr>
                          <td>{{$order->id}}</td>  
                          <td>{{$order->tel}}</td>
                          <td>{{$order->address}}</td>
                          <td>{{$order->created_at}}</td>
                          <td>{{$order->user->name}}</td>
                          @if($order->confirm==0)
                          <td>
                            <a href="{{route('confirm-order',$order->id)}}"><button type="button" class="btn btn-primary">Xác nhận</button></a>
                          </td>
                          @endif
                          @if($order->confirm!=0)
                          <td style="color: red;">Đã xác nhận</td>
                          @endif
                          <td><a href="{{route('get-detail',$order->id)}}">Chi tiết</a></td>
                          <td><form action="{{route('delete-order',$order->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn-danger"><img src="https://img.icons8.com/ios-glyphs/16/000000/delete-sign.png"></button>
                            </form></td>
                        
                        </tr>
                        
                          
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              
          
@endsection

