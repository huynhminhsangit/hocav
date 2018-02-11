@extends('Back_end.Layouts.master')
@section('title','Trang Chủ')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Trang Chủ</a>
  </li>
  <li class="breadcrumb-item active">Quản Lý Người Dùng</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-address-book"></i> SỬA NGƯỜI DÙNG</div>
    <div class="card-body">
      <div class="col-lg-7">
        <form action="{{$users->id}}" method="POST">
          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <div class="form-group">
            <label class="control-label col-sm-2">Tên:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{$users->name}}" name="user_name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Email:</label>
            <div class="col-sm-10">
              <input type="Email" class="form-control" value="{{$users->email}}" name="user_email">
            </div>
          </div>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Đồng ý</button>
              <button type="reset" class="btn btn-default">Nhập lại</button>
            </div>        
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection