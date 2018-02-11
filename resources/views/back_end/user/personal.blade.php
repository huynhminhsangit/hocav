@extends('Back_end.Layouts.master')
@section('title','Trang Chủ')

@section('content')
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-address-book"></i> TRANG CÁ NHÂN</div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-7">
          <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-group">
              <label class="control-label col-sm-2">Tên:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$users->name}}" name="user_name" id="descrip" readonly="readonly">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Email:</label>
              <div class="col-sm-10">
                <input type="Email" class="form-control" value="{{$users->email}}" name="user_email" id="descrip1" readonly="readonly">
              </div>
            </div>
            <div class="form-group"  id="imag" style="display: none;">
              <label class="control-label col-sm-2">Hình Ảnh:</label> 
              <div class="col-sm-6">   
                <input type="file" class="form-control-file" name="image">          
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" id="addButton" style="display: none;">Đồng ý</button>
                <button type="reset" class="btn btn-default" id="addButton1" style="display: none;">Nhập lại</button>
                <button type="button" class="btn btn-default" id="act">Sửa</button>
                <a class="pl-5" href="{{ url('pe/pass') }}">Đổi mật khẩu</a>
              </div>        
            </div>
          </form>
        </div>
        <div class="col-sm-2 text-center">
          <div class="card">
            <h5 class="card-header">Hình Ảnh</h5>
            @if(!$users->image)                  
            <img src="{{ url('upload/blank.png') }}" class="card-img" height="150px" width="250px"/>
            @else
            <img src="{{ url('upload/'.$users->image) }}" class="card-img" height="150px" width="250px"/>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
