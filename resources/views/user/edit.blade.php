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
                
                
                <div class="panel-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <form action="{{route('update-user',$user->id)}}" method="POST" role="form">
                      @csrf
                      @method('PUT')
                      <legend>Chỉnh sửa người dùng</legend>
                      
                      <div class="form-group">
                       
                        <br>
                        <label for="">Tên</label>
                        @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <input type="text" name="name" class="form-control" id="" value="{{$user->name}}">
                        <label for="">Email</label>
                        @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}
                                    </span>
                        @endif
                        <input type="text" name="email" class="form-control" id="" value="{{$user->email}}">
                        <label for="">Quyền</label>
                        <select name="role_id" id="" class="form-control">
                          @foreach($listRole as $role)
                          <option class="form-control" value="{{$role->id}}" {{$user->role_id==$role->id?"selected":""}}>{{$role->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    
                      
                    
                      <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
              </div>
              
          
@endsection

