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
      <i class="fa fa-address-book"></i>   </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-dark text-center" datatable="ng" dt-options="dtOptions" ng-init="loadData()">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Hình Ảnh</th>
                <th>Thời Gian Cập Nhật</th>
                <th>Sửa</th>
                <th>Xóa</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat = "user in users">
                <td class="align-middle ng-cloak"><% user.id %> </td>
                <td class="align-middle ng-cloak"><% user.name %></td> 
                <td class="align-middle ng-cloak"><% user.email %></td>                  
                <td>                   
                  <img ng-src="<%'upload/avatars/' + user.avatar %>" class="rounded ng-cloak" height="100px" width="100px" ng-if="user.avatar"/>
                  <img ng-src="<%'upload/blank.png'%>" class="rounded ng-cloak" height="100px" width="100px" ng-if="!user.avatar"/>                     
                </td>                  
                <td class="align-middle ng-cloak"><% user.updated_at%> </td>
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="showupdate(user.id)">Sửa</button></td>
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="delete(user.id)">Xóa</button></td> 
              </tr>
            </tbody>
          </table>
        </div>
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
            <form name="frmadd" novalidate>
              <div class="form-group">
                <label class="control-label col-sm-3">Tên:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="user_name_add" ng-model="user_add.user_name_add" ng-required="true" autocomplete="off">
                  <div ng-show="frmadd.user_name_add.$dirty && frmadd.user_name_add.$invalid"> 
                    <span class="help-block text-danger" ng-show="frmadd.user_name_add.$error.required">Không Được Trống</span>
                  </div> 
                </div>             
              </div>  
              <div class="form-group">
                <label class="control-label col-sm-3">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="user_email_add" ng-model="user_add.user_email_add" ng-required="true" autocomplete="off">  
                  <div ng-show="frmadd.user_email_add.$dirty && frmadd.user_email_add.$invalid"> 
                    <span class="help-block text-danger" ng-show="frmadd.user_email_add.$error.required">Không Được Trống</span>
                    <span class="help-block text-danger" ng-show="frmadd.user_email_add.$error.email">Phải là chuẩn email</span>
                  </div>             
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-default" ng-disabled="frmadd.$invalid" ng-click="store()">Đồng ý</button>
                  <button type="reset" class="btn btn-default">Xóa</button>
                </div>        
              </div>
            </form>
          </div>
          <div class="modal-footer col-sm-10">
            <div class="alert alert-success alert-dismissible fade show" role="alert" ng-if="massage.success">
              <% massage.success %>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" ng-if="massage.error">
              <% massage.error %>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>              
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
            <form name="frmedit" novalidate>
              <div class="form-group">
                <label class="control-label col-sm-3">Tên:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  name="name" ng-value="user_edit.name" ng-model="user_edit.name" ng-required="true" autocomplete="off">
                  <div ng-show="frmedit.name.$dirty && frmedit.name.$invalid"> 
                    <span class="help-block text-danger" ng-show="frmedit.name.$error.required">Không Được Trống</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" ng-value="user_edit.email" ng-model="user_edit.email" ng-required="true" autocomplete="off">
                  <div ng-show="frmedit.email.$dirty && frmedit.email.$invalid"> 
                    <span class="help-block text-danger" ng-show="frmedit.email.$error.required">Không Được Trống</span>
                    <span class="help-block text-danger" ng-show="frmedit.email.$error.email">Phải là chuẩn email</span>
                  </div>
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-default" ng-disabled="frmedit.$invalid" ng-click="update(user_edit.id)">Đồng ý</button>
                  <button type="button" class="btn btn-default">Xóa</button>
                </div>        
              </div>
            </form>
          </div>
          <div class="modal-footer col-sm-10">
            <div class="alert alert-success alert-dismissible fade show" role="alert" ng-if="massage.success">
              <% massage.success %>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" ng-if="massage.error">
              <% massage.error %>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>              
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
