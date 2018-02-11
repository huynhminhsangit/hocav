@extends('Back_end.Layouts.master')
@section('title','Trang Chủ')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Trang Chủ</a>
  </li>
  <li class="breadcrumb-item active">Quản Lý Phân Quyền</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
  <div class="card-header">
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-dark" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>ID User</th>
            <th>Quyền</th>
            <th>Thời Gian Cập Nhật</th>
            <th>
                  <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chức Năng</button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="role_admin/{{$users->id}}">Thêm Quyền Admin</a>
                    <a class="dropdown-item" href="role_support/{{$users->id}}">Thêm Quyền Support</a>
                    <a class="dropdown-item" href="role_user/{{$users->id}}">Thêm Quyền User</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="role_de_admin/{{$users->id}}">Xóa Quyền Admin</a>
                    <a class="dropdown-item" href="role_de_support/{{$users->id}}">Xóa Quyền Support</a>
                    <a class="dropdown-item" href="role_de_user/{{$users->id}}">Xóa Quyền User</a>
                    <a class="dropdown-item" href="role_de_all/{{$users->id}}">Xóa Tất Cả Quyền</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="list">Trở Về Quản Lý User</a>
                  </div>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($users->roles as $users)
          <tr>
            <td>{{$users->id}}</td>
            <td>{{$users->pivot->user_id}}</td>
            <td>{{$users->name}}</td>
            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $users->pivot->updated_at)->diffForHumans() }}</td>
            <td></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>            
@endsection
