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
                    <form action="{{route('store-category')}}" method="POST" role="form">
                      @csrf
                      <legend>Thêm mới loại hàng</legend>
                      
                      <div class="form-group">
                       
                       
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" id="" placeholder="Input field">
                         @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    
                      
                    
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
              </div>
              
          
@endsection

