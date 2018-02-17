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
<div ng-controller="BannerController">
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-address-book"></i> DANH SÁCH NGƯỜI DÙNG</div>
      <div class="card-body">
        <form method="POST" action="delbanner" id="del">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-dark text-center" id="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Tên file</th>
                  <th>Hình Ảnh</th>
                  <th>Thời Gian Cập Nhật</th>
                  <th>Sửa</th>
                  <th><input type="checkbox" id="checkall"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($banner as $banner)
                <tr>
                  <td class="align-middle">{{$banner->id}} </td>
                  <td class="align-middle">{{$banner->name}}</td>
                  <td class="align-middle">{{$banner->thumb}}</td>
                  
                  <td>   
                    @if(!$banner->image)                 
                    <img src="{{url('upload/avatars/blank.png')}}" class="rounded" height="100px" width="100px"/>
                    @else        
                    <img src="{{url('upload/avatars/'. $banner->image)}}" class="rounded" height="100px" width="100px"/>  
                    @endif                  
                  </td>
                  
                  <td class="align-middle">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $banner->updated_at)->diffForHumans() }} </td>
                  <td class="align-middle"><button type="button" class="btn btn-default" ng-click="showupdate({{$banner->id}})">Sửa</button></td>
                  <td class="align-middle"><input type="checkbox" name="checked[]" value="{{$banner->id}}"></td> 
                </tr>
                @endforeach
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
            <form action="{{ url('banner') }}" method="POST" enctype="multipart/form-data" name="frmadd" novalidate>
              {{ csrf_field() }}
              <div class="form-group">
                <label class="control-label col-sm-3">Tên:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ old('banner_name_add') }}" name="banner_name_add" ng-model="banner_add.banner_name_add" ng-required="true" autocomplete="off">
                  <div ng-show="frmadd.banner_name_add.$dirty && frmadd.banner_name_add.$invalid">
                    <span class="help-block text-danger" ng-show="frmadd.banner_name_add.$error.required">Không Được Trống</span>
                  </div>
                </div>             
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Chiều Cao:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ old('banner_height_add') }}" name="banner_height_add" ng-model="banner_add.banner_height_add" ng-required="true" autocomplete="off">
                  <div ng-show="frmadd.banner_height_add.$dirty && frmadd.banner_height_add.$invalid">
                    <span class="help-block text-danger" ng-show="frmadd.banner_height_add.$error.required">Không Được Trống</span>
                  </div>
                </div>             
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Chiều Rộng:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ old('banner_width_add') }}" name="banner_width_add" ng-model="banner_add.banner_width_add" ng-required="true" autocomplete="off">
                  <div ng-show="frmadd.banner_width_add.$dirty && frmadd.banner_width_add.$invalid">
                    <span class="help-block text-danger" ng-show="frmadd.banner_width_add.$error.required">Không Được Trống</span>
                  </div>
                </div>             
              </div>
              <div class="form-group">
              <label class="control-label col-sm-3">Hình Ảnh:</label> 
              <div class="col-sm-6">   
                <input type="file" class="form-control-file" name="banner">          
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
  </div>
  @endsection
