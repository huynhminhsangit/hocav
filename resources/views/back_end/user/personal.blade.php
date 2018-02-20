@extends('back_end.layout.master')
@section('title','Trang Chủ')

@section('content')
<div class="card mb-3" ng-controller="PersonalController">
  <div class="card-header">
    <i class="fa fa-address-book"></i> TRANG CÁ NHÂN</div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-7">
          <form name="frmpersonal" novalidate ng-init="loadData()">
            <div class="form-group">
              <label class="control-label col-sm-2">Tên:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" ng-model="personal.name" name="user_name_personal" id="descrip" readonly ng-required="true" autocomplete="off">
                <div ng-show="frmpersonal.user_name_personal.$dirty && frmpersonal.user_name_personal.$invalid" class=" ng-cloak">
                  <span class="help-block text-danger" ng-value="frmpersonal.user_name_personal.$error.required" ng-show="frmpersonal.user_name_personal.$error.required">Không Được Trống</span> </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                  <input type="Email" class="form-control" ng-model="personal.email" name="user_email_personal" id="descrip1" readonly ng-required="true" autocomplete="off">
                  <div ng-show="frmpersonal.user_email_personal.$dirty && frmpersonal.user_email_personal.$invalid" class=" ng-cloak">
                    <span class="help-block text-danger ng-cloak" ng-show="frmpersonal.user_email_personal.$error.required">Không Được Trống</span>
                    <span class="help-block text-danger ng-cloak" ng-show="frmpersonal.user_email_personal.$error.email">Phải là chuẩn email</span>
                  </div>
                </div>
              </div> 
              <div class="form-group" id="imag" style="display: none;">
                <label class="control-label col-sm-2">Hình Ảnh:</label>
                <div class="col-sm-10">
                  <input type="file" ngf-select ng-model="picFile" name="file" >
                  <img ng-show="frmpersonal.file.$valid" ngf-thumbnail="picFile" class="img-thumbnail" height="100px" width="100px"> <button ng-click="picFile = null" ng-show="picFile">Xóa</button>
                </div>
              </div>         
              <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" class="btn btn-default" id="addButton" style="display: none;" ng-click="uploadPic(picFile)">Đồng ý</button>
                  <button type="button" class="btn btn-default" id="act">Sửa</button>
                  <a class="pl-5" href="{{ url('personal/pass') }}">Đổi mật khẩu</a>
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
            </form>
          </div>
          <div class="col-sm-2 text-center">
            <div class="card">
              <h5 class="card-header">Hình Ảnh</h5>    
              <img ng-src="<%'mis/blank.png'%>" class="card-img ng-cloak" height="150px" width="250px" ng-if="!personal.avatar"/>        
              <img ng-src="<%'img_avatar/'+ personal.avatar%>" class="card-img ng-cloak" height="150px" width="250px" ng-if="personal.avatar"/>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
