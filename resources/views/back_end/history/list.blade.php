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
<div ng-controller="HistoryController">
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-address-book"></i> LỊCH SỬ</div>
      <div class="card-body">
        <form method="POST" action="delhistory" id="del">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-dark text-center" id="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>ID Người Thực Hiện</th>
                  <th>Hành Động</th>
                  <th>Bảng Thực Hiện</th>
                  <th>ID Hành Động</th>
                  <th>Thời Gian Cập Nhật</th>
                  <th><input type="checkbox" id="checkall"></th>
                </tr>
              </thead>
              <tbody ng-repeat="history in history">
                <tr>
                  <td class="align-middle"><% history.id %></td>
                  <td class="align-middle"><% history.user_id %></td>
                  <td class="align-middle"><% history.action %></td>
                  <td class="align-middle"><% history.action_model %></td>
                  <td class="align-middle"><% history.action_id %></td>
                  <td class="align-middle"><% history.created_at | amUtc | amDateFormat:' HH:mm:ss || DD.MM.YYYY' %></time> </td>
                  <td class="align-middle"><input type="checkbox" name="checked[]" ng-value="history.id"></td> 
                </tr>
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>    
    @endsection
