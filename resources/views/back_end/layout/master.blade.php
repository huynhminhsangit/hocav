<!DOCTYPE html>
<html lang="en" ng-app="myapp">
@include('back_end.layout.head')
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/') }}">TRANG QUẢN TRỊ</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span class="nav-link-text">Trang Chủ</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-chart-pie"></i>
            <span class="nav-link-text">Thống Kê</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#layout" data-parent="#exampleAccordion"  data-background-icon=''>
            <i class="fas fa-wrench"></i>
            <span class="nav-link-text">Giao Diện</span>
          </a>
          <ul class="sidenav-second-level collapse" id="layout">
            <li>
              <a href="{{ url('banner') }}">Banner</a>
            </li>
            <li>
              <a href="{{ url('user') }}">Slider</a>
            </li>
            <li>
              <a href="{{ url('user') }}">Menu</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#manager" data-parent="#exampleAccordion"  data-background-icon=''>
            <i class="fas fa-wrench"></i>
            <span class="nav-link-text">Quản Lý</span>
          </a>
          <ul class="sidenav-second-level collapse" id="manager">
            <li>
              <a href="{{ url('user') }}">Người Dùng</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="{{ url('personal') }}">
            <i class="fas fa-user"></i>
            <span class="nav-link-text">Trang cá nhân</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="{{ url('history') }}">
            <i class="fas fa-history"></i>
            <span class="nav-link-text">Lịch Sử Hành Động</span>
          </a>
        </li>
        <li class="nav-item text-warning" data-toggle="tooltip" data-placement="right">

          <span class="nav-link-text">

          </span>
        </li>
        <li class="nav-item text-warning" data-toggle="tooltip" data-placement="right">
          <span class="nav-link-text">Địa chỉ IP của bạn :{{Auth::user()->last_login_ip}}</span>
        </li><li class="nav-item text-warning" data-toggle="tooltip" data-placement="right">
          <span class="nav-link-text">Lần cuối đăng nhập :
            @if(!Auth::user()->last_login_at)
            0
            @else
            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Auth::user()->last_login_at)->diffForHumans() }}
            @endif
          </span>
        </li>
        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        @if(!Auth::user()->avatar)
        <li class="nav-item">          
          <img ng-src="{{ url('upload/blank.png') }}" class="rounded-circle" height="40px" width="40px"/>
          @else
          <img ng-src="{{ url('upload/avatars/'.Auth::user()->avatar) }}" class="rounded-circle" height="40px" width="40px"/>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link"> {{Auth::user()->name}}</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#logout">
            <i class="fas fa-sign-out-alt"></i>Đăng Xuất</a>  
          </li>
        </ul>
      </div>
    </nav>
    <div class="content-wrapper">
      <div class="container-fluid">
        @yield('breadcrumb')
        @yield('content')
      </div>
      <footer class="sticky-footer">
        <div class="container">
          <div class="text-center">
            <small>Copyright © Your Website 2018 </small>
          </div>
        </div>
      </footer>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Đăng xuất</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Bạn có chắc chắn 100% muốn đăng xuất</div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="button" data-dismiss="modal">Hủy</button>
              <a class="btn btn-primary " id="logout">Đăng xuất</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('back_end.layout.js')
  </body>
  </html>
