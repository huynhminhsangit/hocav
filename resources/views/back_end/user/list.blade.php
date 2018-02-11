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
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-dark text-center" id="dataTable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên</th>
            </tr>
          </thead>
          <tbody ng-repeat="user in user">
            <tr>
              <td class="align-middle"><% user.id %></td>
              <td class="align-middle"><% user.name %></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm mới</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form name="frmuser">
            <div class="form-group">
              <label class="control-label col-sm-3">Tên:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ old('name') }}" name="user_name" ng-model="users.user_name" ng-required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" value="{{ old('email') }}" name="user_mail" ng-model="users.user_mail" ng-required="true">
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-default" ng-click="save()">Đồng ý</button>
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
