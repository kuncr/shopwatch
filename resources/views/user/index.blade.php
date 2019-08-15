@extends('layouts.master_admin')
@section('content')
	 
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Quản lý người dùng</h3>
              </div>
             
              </div>
              
              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading">
                
                  <br>
                  
                </div>
                <div class="col-lg-12">
                  @if(Session::has('flash_message'))
                    <div class="alert alert-{{Session::get('flash_level')}}">
                      {{{Session::get('flash_message')}}}
                    </div>
                  @endif
                  </div>
                <div class="panel-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th colspan="2"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->role->name}}</td>
                          <td><a href="{{route('edit-user',$user->id)}}"><img src="https://img.icons8.com/wired/64/000000/edit.png" width="30px"></a></td>
                          <td><form action="{{route('delete-user',$user->id)}}" method="POST" role="form">
                            @csrf
                            @method('DELETE')
                               <button type="submit" class="btn btn-danger"><img src="https://img.icons8.com/ios-glyphs/16/000000/delete-sign.png"></button>
                          </form></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              
          
@endsection

