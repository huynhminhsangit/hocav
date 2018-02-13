@extends('back_end.layout.master')
@section('title','Trang Chủ')

@section('content')
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-address-book"></i> SỬA NGƯỜI DÙNG</div>
    <div class="card-body">
      <div class="col-lg-7">
        <form method="POST" action="" name="frmchangepass" novalidate>
          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <div class="form-group">
            <label for="password" class="col-md-4 control-label">Mật khẩu cũ</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password_old" ng-model="password_old" ng-required=true>
              <div ng-show="frmchangepass.password_old.$dirty && frmchangepass.password_old.$invalid">
                <span class="text-danger" ng-show="frmchangepass.password_old.$error.required">  Chưa nhập  </span> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-4 control-label">Mật khẩu mới</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password_new" ng-model="password_new" ng-required=true>
              <div ng-show="frmchangepass.password_new.$dirty && frmchangepass.password_new.$invalid">
                <span class="text-danger" ng-show="frmchangepass.password_new.$error.required">  Chưa nhập  </span> 
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Xác nhận</label>
            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" ng-model="password_confirmation" compare-to="password_new" ng-required=true>
              <div ng-show="frmchangepass.password_confirmation.$dirty && frmchangepass.password_confirmation.$invalid">
                <span class="text-danger" ng-show="frmchangepass.password_confirmation.$error.compareTo">  Xác Nhận không Chính Xác  </span>  
              </div>
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
