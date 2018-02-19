﻿<!DOCTYPE html>
<html lang="en" ng-app="myapp">
<body>
    <div ng-controller="BannerController" ng-init="showbanner()">
      <img ng-src="<%'upload/banner/' + showbanner.image%>"/>
      <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('app/lib/angular.min.js')}}"></script>

      <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

      <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
      <script src="{{asset('vendor/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/angular-datatables.min.js')}}"></script>
      

      <script src="{{asset('vendor/datatables/Buttons-1.5.1/js/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/Buttons-1.5.1/js/buttons.bootstrap4.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/angular-datatables.buttons.min.js')}}"></script>
      
      <script src="{{asset('vendor/datatables/Buttons-1.5.1/js/buttons.html5.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/Buttons-1.5.1/js/buttons.print.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/Buttons-1.5.1/js/buttons.colVis.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/pdfmake-0.1.32/pdfmake.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/pdfmake-0.1.32/vfs_fonts.js')}}"></script>

      <script src="{{asset('vendor/sb-admin/js/sb-admin.min.js')}}"></script>


      
      <script src="{{asset('app/lib/moment.min.js')}}"></script>
      <script src="{{asset('app/lib/locale/vi.js')}}"></script>
      <script src="{{asset('app/lib/angular-moment.min.js')}}"></script>
      <script src="{{asset('app/lib/ng-file-upload.min.js')}}"></script>
      <script src="{{asset('app/app.js')}}"></script>   

      <script src="{{asset('back_end/js/web.js')}}"></script>
  </div>
</body>
</html>