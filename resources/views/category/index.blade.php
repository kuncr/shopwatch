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
                <div class="panel-heading">
                 <a href="{{route('create-category')}}"> <button type="button" class="btn btn-danger" id="btn_addnew">Thêm mới</button></a>
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
                        <th colspan="2"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($categories as $category)
                        <tr>
                          <td>{{$category->id}}</td>
                          <td><a href="{{route('list-product-by-category',$category->id)}}">{{$category->name}}</a></td>
                          <td><a href="{{route('edit-category',$category->id)}}"><img src="https://img.icons8.com/wired/64/000000/edit.png" width="30px"></a>
                          
                            
                            <form action="{{route('delete-category',$category->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn-danger"><img src="https://img.icons8.com/ios-glyphs/16/000000/delete-sign.png"></button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              
          
@endsection

