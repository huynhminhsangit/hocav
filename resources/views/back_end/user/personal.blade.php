@extends('back_end.layout.master')
@section('title','Trang Chủ')

@section('content')
<div class="card mb-3" ng-controller="PersonalController">
  <div class="card-header">
    <i class="fa fa-address-book"></i> TRANG CÁ NHÂN</div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-7">
          <form method="POST" action="" enctype="multipart/form-data" name="frmpersonal" novalidate>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-group">
              <label class="control-label col-sm-2">Tên:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" ng-model="personal.name" name="user_name_personal" id="descrip" readonly ng-required="true" autocomplete="off">
                <span class="help-block text-danger" ng-value="frmpersonal.user_name_personal.$error.required" ng-show="frmpersonal.user_name_personal.$error.required">Không Được Trống</span> 
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Email:</label>
              <div class="col-sm-10">
                <input type="Email" class="form-control" ng-model="personal.email" name="user_email_personal" id="descrip1" readonly ng-required="true" autocomplete="off">
                <span class="help-block text-danger" ng-show="frmpersonal.user_email_personal.$error.required">Không Được Trống</span>
                  <span class="help-block text-danger" ng-show="frmpersonal.user_email_personal.$error.email">Phải là chuẩn email</span>
              </div>
            </div>
            <div class="form-group"  id="imag" style="display: none;">
              <label class="control-label col-sm-2">Hình Ảnh:</label> 
              <div class="col-sm-6">   
                <input type="file" class="form-control-file" name="avatar">          
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" id="addButton" style="display: none;">Đồng ý</button>
                <button type="button" class="btn btn-default" id="act">Sửa</button>
                <a class="pl-5" href="{{ url('personal/pass') }}">Đổi mật khẩu</a>
              </div>        
            </div>
          </form>
        </div>
        <div class="col-sm-2 text-center">
          <div class="card">
            <h5 class="card-header">Hình Ảnh</h5>    
              <img src="<%'upload/avatars/blank.png'%>" class="card-img" height="150px" width="250px" ng-if="!personal.avatar"/>        
            <img src="<%'upload/avatars/'+ personal.avatar%>" class="card-img" height="150px" width="250px" ng-if="personal.avatar"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
