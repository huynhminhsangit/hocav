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
          <table class="table table-striped table-bordered table-hover table-dark text-center" datatable="ng" dt-column-defs="dtColumnDefs" dt-options="dtOptions" ng-init="loadData()">
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
              <tr ng-repeat = "user in user">
                <td class="align-middle ng-cloak"><% user.id %> </td>
                <td class="align-middle ng-cloak"><% user.name %></td> 
                <td class="align-middle ng-cloak"><% user.email %></td>                                  
                <td class="align-middle ng-cloak">                   
                  <a href="<%'img_avatar/' + user.avatar%>"><img ng-src="<%'img_avatar/' + user.avatar %>" class="rounded ng-cloak" height="100px" width="100px" ng-if="user.avatar"/></a>
                  <img ng-src="<%'mis/blank.png'%>" class="rounded ng-cloak" height="100px" width="100px" ng-if="!user.avatar"/>                     
                </td>                  
                <td class="align-middle ng-cloak"><% user.updated_at| amDateFormat:'dddd, Do MMMM  YYYY h:mm:ss'%> </td>
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="showupdate(user.id)">Sửa</button></td>
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="delete(user.id)">Xóa</button></td> 
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>    
  </div>
  @endsection
