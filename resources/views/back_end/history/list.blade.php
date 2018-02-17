@extends('back_end.layout.master')
@section('title','Trang Chủ')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Trang Chủ</a>
  </li>
  <li class="breadcrumb-item active">Lịch Sử</li>
</ol>
@endsection
@section('content')
<div class="card mb-3" ng-controller="HistoryController">
  <div class="card-header">
    <i class="fa fa-address-book"></i> LỊCH SỬ</div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-dark text-center" datatable="ng" dt-options="dtOptions" ng-init="loadData()">
            <thead>
              <tr>
                <th>ID</th>
                <th>ID Người Thực Hiện</th>
                <th>Hành Động</th>
                <th>Bảng Thực Hiện</th>
                <th>ID Hành Động</th>
                <th>Thời Gian</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="history in historys">
                <td class="align-middle ng-cloak"><% history.id %></td>
                <td class="align-middle ng-cloak"><% history.user_id %></td>
                <td class="align-middle ng-cloak"><% history.action %></td>
                <td class="align-middle ng-cloak"><% history.action_model %></td>
                <td class="align-middle ng-cloak"><% history.action_id %></td>
                <td class="align-middle ng-cloak"><% history.created_at | amDateFormat:'dddd, Do MMMM  YYYY h:mm:ss'%></td>
                <td class="align-middle ng-cloak"><input type="checkbox" ng-model="selected" ng-checked="exist(history)" ng-click="selectedid(history.id)"></td> 
              </tr>
            </tbody>
          </table>  
        </div>
    </div>

  </div>  
  @endsection
