@extends('back_end.layout.master')
@section('title','Trang Chủ')

@section('content')
<div class="card mb-3" ng-controller="PersonalController">
  <div class="card-header">
    <i class="fa fa-address-book"></i> SỬA NGƯỜI DÙNG</div>
    <div class="card-body">
      <div class="col-lg-7">
        <form name="frmchangepass" novalidate>
          <div class="form-group">
            <label for="password" class="col-md-4 control-label">Mật khẩu cũ</label>

            <div class="col-md-6">
              <input type="password" class="form-control" name="password_old" ng-model="password_old" ng-required=true>
              <div ng-show="frmchangepass.password_old.$dirty && frmchangepass.password_old.$invalid" class="ng-cloak">
                <span class="text-danger" ng-show="frmchangepass.password_old.$error.required">  Không Được Trống  </span> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-4 control-label">Mật khẩu mới</label>

            <div class="col-md-6">
              <input type="password" class="form-control" name="password_new" ng-model="password_new" ng-required=true >
              <div ng-show="frmchangepass.password_new.$dirty && frmchangepass.password_new.$invalid" class="ng-cloak">
                <span class="text-danger" ng-show="frmchangepass.password_new.$error.required">  Không Được Trống  </span> 
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Xác nhận</label>
            <div class="col-md-6">
              <input type="password" class="form-control" name="password_confirmation" ng-model="password_confirmation" compare-to="password_new" ng-required=true>
              <div ng-show="frmchangepass.password_confirmation.$dirty && frmchangepass.password_confirmation.$invalid" class="ng-cloak">
                <span class="text-danger" ng-show="frmchangepass.password_confirmation.$error.compareTo">  Xác Nhận không Chính Xác  </span>  
              </div>
            </div>
          </div>
            <div class="alert alert-success alert-dismissible fade show ng-cloak" role="alert" ng-if="massage.success">
              <% massage.success %>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="alert alert-danger alert-dismissible fade show ng-cloak" role="alert" ng-if="massage.error">
              <% massage.error %>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>              
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" ng-click="update_pass()">Đồng ý</button>
            </div>        
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection
