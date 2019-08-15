@extends('layouts.master_admin')
@section('content')
	 
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Quản lý loại hàng</h3>
              </div>
             
              </div>
              
              <!-- Latest Users -->
              <div class="panel panel-default">
                
                
                <div class="panel-body">
                    <form action="{{route('update-category',$category->id)}}" method="POST" role="form">
                      @csrf
                      @method('PUT')
                      <legend>Chỉnh sửa loại hàng</legend>
                      
                      <div class="form-group">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <br>
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" id="" value="{{$category->name}}">
                      </div>
                    
                      
                    
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
              </div>
              
          
@endsection

