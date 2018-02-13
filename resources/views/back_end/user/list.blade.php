@extends('back_end.layout.master')
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
<div ng-controller="UserController">
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-address-book"></i> DANH SÁCH NGƯỜI DÙNG</div>
      <div class="card-body">
        <form method="POST" action="deluser" id="del">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-dark text-center" id="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Thời Gian Cập Nhật</th>
                  <th>Sửa</th>
                  <th><input type="checkbox" id="checkall"></th>
                </tr>
              </thead>
              <tbody ng-repeat="user in users">
                <tr>
                  <td class="align-middle"><% user.id %></td>
                  <td class="align-middle"><% user.name %></td>
                  <td class="align-middle"><% user.email %></td>
                  <td>
                    <img src="<%'upload/blank.png'%>" class="card-img" height="150px" width="250px" ng-if="!user.image"/>        
                    <img src="<%'upload/'+ user.image%>" class="card-img" height="150px" width="250px" ng-if="user.image"/>
                  </td>
                  <td class="align-middle"><time am-time-ago="user.updated_at"></time> </td>
                  <td class="align-middle"><button type="button" class="btn btn-default" ng-click="showupdate(user.id)">Sửa</button></td>
                  <td class="align-middle"><input type="checkbox" name="checked[]" ng-value="user.id"></td> 
                </tr>
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm mới</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div>
            <form action="{{ url('user') }}" method="POST" name="frmadd" novalidate>
              {{ csrf_field() }}
              <div class="form-group">
                <label class="control-label col-sm-3">Tên:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ old('user_name_add') }}" name="user_name_add" ng-model="user_add.user_name_add" ng-required="true" autocomplete="off" ng-pattern="/^[A-Z][a-z]/">
                  <div ng-show="frmadd.user_name_add.$dirty && frmadd.user_name_add.$invalid">
                    <span class="help-block text-danger" ng-show="frmadd.user_name_add.$error.required">Không Được Trống</span>
                    <span class="help-block text-danger" ng-show="frmadd.user_name_add.$error.pattern">Chữ Đầu Phải Ghi Hoa</span>  
                  </div>
                </div>             
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" value="{{ old('user_email_add') }}" name="user_email_add" ng-model="user_add.user_email_add" ng-required="true" autocomplete="off">  
                  <div ng-show="frmadd.user_email_add.$dirty && frmadd.user_email_add.$invalid"> 
                    <span class="help-block text-danger" ng-show="frmadd.user_email_add.$error.required">Không Được Trống</span>
                    <span class="help-block text-danger" ng-show="frmadd.user_email_add.$error.email">Phải là chuẩn email</span>
                  </div>             
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary" ng-disabled="frmadd.$invalid">Đồng ý</button>
                  <button type="reset" class="btn btn-primary">Nhập lại</button>
                </div>        
              </div>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sửa</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">          
            <form action="<% 'user/' + user_edit.id %>" method="POST" name="frmedit" novalidate>
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label class="control-label col-sm-3">Tên:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ old('user_name_edit') }}" name="user_name_edit" ng-model="user_edit.name" ng-required="true" autocomplete="off" ng-pattern="/^[A-Z][a-z]/">
                  <span class="help-block text-danger" ng-show="frmedit.user_name_edit.$error.required">Không Được Trống</span>
                  <span class="help-block text-danger" ng-show="frmedit.user_name_edit.$error.pattern">Chữ Đầu Phải Ghi Hoa</span> 
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" value="{{ old('user_email_edit') }}" name="user_email_edit" ng-model="user_edit.email" ng-required="true" autocomplete="off">
                  <span class="help-block text-danger" ng-show="frmedit.user_email_edit.$error.required">Không Được Trống</span>
                  <span class="help-block text-danger" ng-show="frmedit.user_email_edit.$error.email">Phải là chuẩn email</span>
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-default" ng-disabled="frmedit.$invalid">Đồng ý</button>
                  <button type="reset" class="btn btn-default">Nhập lại</button>
                </div>        
              </div>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
