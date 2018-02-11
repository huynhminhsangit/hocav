@extends('Back_end.Layouts.master')
@section('title','Trang Chủ')

@section('content')
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-address-book"></i> SỬA NGƯỜI DÙNG</div>
    <div class="card-body">
      <div class="col-lg-7">
        <form method="POST">
          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <div class="form-group">
            <label for="password" class="col-md-4 control-label">Mật khẩu cũ</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-4 control-label">Mật khẩu mới</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password_new" required>
            </div>
          </div>

          <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Xác nhận</label>
            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
          </div>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Đồng ý</button>
            </div>        
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection
