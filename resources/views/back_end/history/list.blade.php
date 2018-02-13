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
              <tbody>
                @foreach($history as $history)
                <tr>
                  <td class="align-middle">{{$history->id}}</td>
                  <td class="align-middle">{{$history->user_id}}</td>
                  <td class="align-middle">{{$history->action}}</td>
                  <td class="align-middle">{{$history->action_model}}</td>
                  <td class="align-middle">{{$history->action_id}}</td>
                  <td class="align-middle">{{$history->created_at}}</td>
                  <td class="align-middle"><input type="checkbox" name="checked[]" value="{{$history->id}}"></td> 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </form>
      </div>   
    @endsection
