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
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-address-book"></i> DANH SÁCH NGƯỜI DÙNG</div>
    <div class="card-body">
      <form method="POST" action="deluser" id="del">
        {{ csrf_field() }}
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-dark text-center" id="dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Sửa</th>
                <th><input type="checkbox" id="checkall"></th>
              </tr>
            </thead>
            <tbody ng-repeat="listuser in listuser">
              <tr>
                <td class="align-middle"><% listuser.id %></td>
                <td class="align-middle"><% listuser.name %></td>
                <td class="align-middle"><% listuser.email %></td>
                <td class="align-middle"><button type="button" class="btn btn-default" ng-click="showupdate(listuser.id)">Sửa</button></td>
                <td class="align-middle"><input type="checkbox" name="checked[]" ng-value="listuser.id"></td> 
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
        <div class="modal-body">
          <form name="frmadd">
            <div class="form-group">
              <label class="control-label col-sm-3">Tên:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ old('user_name_add') }}" name="user_name_add" ng-model="user_add.user_name_add" ng-required="true" ng-maxlength="12" ng-minlength="6">                
              </div>             
              <div class="alert alert-success m-1" ng-show="frmadd.user_name_add.$error.required">Cần nhập</div>
                <div class="alert alert-success m-1" ng-show="frmadd.user_name_add.$error.minlength">Ít nhất 3 ký tự</div>
                <div class="alert alert-success m-1" ng-show="frmadd.user_name_add.$error.maxlength">Nhiều nhất 30 ký tự</div> 
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" value="{{ old('user_mail_add') }}" name="user_mail_add" ng-model="user_add.user_mail_add" ng-required="true" ng-maxlength="12" ng-minlength="6">                
              </div>
              <div class="alert alert-success m-1" ng-show="frmadd.user_mail_add.$error.required">Cần nhập</div>
                <div class="alert alert-success m-1" ng-show="frmadd.user_mail_add.$error.minlength">Ít nhất 3 ký tự</div>
                <div class="alert alert-success m-1" ng-show="frmadd.user_mail_add.$error.maxlength">Nhiều nhất 30 ký tự</div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-primary" ng-click="store()" ng-disable="frmadd.$invalid">Đồng ý</button>
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
          <form name="frmedit">
            <div class="form-group">
              <label class="control-label col-sm-3">Tên:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ old('user_name_edit') }}" name="name" ng-model="user_edit.name" ng-required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" value="{{ old('user_email_edit') }}" name="email" ng-model="user_edit.email" ng-required="true">
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-default" ng-click="update(user_edit.id)">Đồng ý</button>
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
  @endsection
