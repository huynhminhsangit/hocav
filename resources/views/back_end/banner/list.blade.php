@extends('back_end.layout.master')
@section('title','Trang Chủ')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Trang Chủ</a>
  </li>
  <li class="breadcrumb-item active">Quản Lý Banner</li>
</ol>
@endsection
@section('content')
<div ng-controller="BannerController">
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-address-book"></i> DANH SÁCH BANNER</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-dark text-center" datatable="ng" dt-column-defs="dtColumnDefs" dt-options="dtOptions" ng-init="loadData()">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hình Ảnh</th>
                <th>Thời Gian Cập Nhật</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="banner in banner">
                <td class="align-middle ng-cloak"><% banner.id %> </td>
                <td class="align-middle ng-cloak"><% banner.name %></td>
                
                <td class="align-middle ng-cloak">                  
                  <img ng-src="<%'mis/blank.png'%>" class="rounded" height="100px" width="100px" ng-if="!banner.image"/>   
                  <a href="<%'img_banner/' + banner.image%>"> <img ng-src="<%'img_banner/' + banner.image%>" class="rounded" height="100px" width="100px" ng-if="banner.image"/></a>                 
                </td>
                
                <td class="align-middle ng-cloak"> <% banner.updated_at | amDateFormat:'dddd, Do MMMM  YYYY h:mm:ss'%></td>
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="showupdate(banner.id)">Sửa</button></td>
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="delete(banner.id)">Xóa</button></td> 
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="setbanner(banner.id)" ng-hide="namebanner.id == banner.id">Sử Dụng</button><div class="text-danger ng-cloak" ng-show="namebanner.id == banner.id" > Đang Sử Dụng</div></td>
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
                  <input type="text" class="form-control" name="banner_name_add" ng-model="banner_add.banner_name_add" ng-required="true" autocomplete="off">
                  <div ng-show="frmadd.banner_name_add.$dirty && frmadd.banner_name_add.$invalid">
                    <span class="help-block text-danger" ng-show="frmadd.banner_name_add.$error.required">Không Được Trống</span>
                  </div>
                </div>             
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Hình Ảnh:</label> 
                <div class="col-sm-6">   
                  <input type="file" ngf-select ng-model="picFile" name="file" ng-required="true">
                  <span class="help-block text-danger" ng-show="frmadd.file.$error.required">Không Được Trống</span> 
                  <img ng-show="frmadd.file.$valid" ngf-thumbnail="picFile" class="img-thumbnail" height="100px" width="100px"> <button ng-click="picFile = null" ng-show="picFile" >Xóa</button>      
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary" ng-disabled="frmadd.$invalid" ng-click="uploadPic(picFile)">Đồng ý</button>
                  <button type="reset" class="btn btn-primary">Nhập lại</button>
                </div>        
              </div>
            </form>
          </div>
          <div class="modal-footer">
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
                  <input type="text" class="form-control" name="banner_name_edit" ng-model="banner_edit.name" ng-required="true" autocomplete="off">
                  <div ng-show="frmedit.banner_name_edit.$dirty && frmedit.banner_name_edit.$invalid">
                    <span class="help-block text-danger" ng-show="frmedit.banner_name_edit.$error.required">Không Được Trống</span>
                  </div>
                </div>             
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Hình Ảnh:</label> 
                <div class="col-sm-6">   
                  <input type="file" ngf-select ng-model="edit_picFile" name="edit_file">
                  <img ng-show="frmedit.edit_file.$valid" ngf-thumbnail="edit_picFile" class="img-thumbnail" height="100px" width="100px"> <button ng-click="edit_picFile = null" ng-show="edit_picFile" >Xóa</button>      
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary" ng-disabled="frmedit.$invalid" ng-click="editPic(edit_picFile,banner_edit.id)">Đồng ý</button>
                  <button type="reset" class="btn btn-primary">Nhập lại</button>
                </div>        
              </div>
            </form>
          </div>
          <div class="modal-footer col-sm-10">
            <div class="alert alert-success alert-dismissible fade show" role="alert" ng-if="massage_edit.success">
              <% massage_edit.success %>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" ng-if="massage_edit.error">
              <% massage_edit.error %>
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
