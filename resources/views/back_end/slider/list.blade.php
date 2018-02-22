@extends('back_end.layout.master')
@section('title','Trang Chủ')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Trang Chủ</a>
  </li>
  <li class="breadcrumb-item active">Quản Lý Slider</li>
</ol>
@endsection
@section('content')
<div ng-controller="SliderController">
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-address-book"></i> DANH SÁCH SLIDER</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-dark text-center" datatable="ng" dt-options="dtOptions" ng-init="loadData()">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hình Ảnh</th>
                <th>Thời Gian Cập Nhật</th>
                <th>Sửa</th>
                <th></th>
                <th>Hình Đang Sử Dụng:<div class="text-danger ng-cloak" ng-if="nameslider1.name"><% nameslider1.name %></div> <div class="text-danger ng-cloak" ng-if="nameslider1.error"><% nameslider1.error %></div></th>
                <th>Hình Đang Sử Dụng:<div class="text-danger ng-cloak" ng-if="nameslider2.name"><% nameslider2.name %></div> <div class="text-danger ng-cloak" ng-if="nameslider2.error"><% nameslider2.error %></div></th>
                <th>Hình Đang Sử Dụng:<div class="text-danger ng-cloak" ng-if="nameslider3.name"><% nameslider3.name %></div> <div class="text-danger ng-cloak" ng-if="nameslider3.error"><% nameslider3.error %></div></th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="slider in slider">
                <td class="align-middle ng-cloak"><% slider.id %> </td>
                <td class="align-middle ng-cloak"><% slider.name %></td>
                
                <td class="align-middle ng-cloak">                  
                  <img ng-src="<%'mis/blank.png'%>" class="rounded" height="100px" width="100px" ng-if="!slider.image"/>   
                  <a href="<%'img_slider/' + slider.image%>"> <img ng-src="<%'img_slider/' + slider.image%>" class="rounded" height="100px" width="100px" ng-if="slider.image"/></a>                 
                </td>
                
                <td class="align-middle ng-cloak"> <% slider.updated_at %> </td>
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="showupdate(slider.id)">Sửa</button></td>
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="delete(slider.id)">Xóa</button></td> 
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="setslider1(slider.id)">Thiết Lập Slider 1</button></td>
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="setslider2(slider.id)">Thiết Lập Slider 2</button></td>
                <td class="align-middle ng-cloak"><button type="button" class="btn btn-default" ng-click="setslider3(slider.id)">Thiết Lập Slider 3</button></td>
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
                  <input type="text" class="form-control" name="slider_name_add" ng-model="slider_add.slider_name_add" ng-required="true" autocomplete="off">
                  <div ng-show="frmadd.slider_name_add.$dirty && frmadd.slider_name_add.$invalid">
                    <span class="help-block text-danger" ng-show="frmadd.slider_name_add.$error.required">Không Được Trống</span>
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
                  <input type="text" class="form-control" name="slider_name_edit" ng-model="slider_edit.name" ng-required="true" autocomplete="off">
                  <div ng-show="frmedit.slider_name_edit.$dirty && frmedit.slider_name_edit.$invalid">
                    <span class="help-block text-danger" ng-show="frmedit.slider_name_edit.$error.required">Không Được Trống</span>
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
                  <button type="submit" class="btn btn-primary" ng-disabled="frmedit.$invalid" ng-click="editPic(edit_picFile,slider_edit.id)">Đồng ý</button>
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
