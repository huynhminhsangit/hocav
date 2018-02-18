@extends('back_end.layout.master')
@section('title','Trang Chủ')
@section('content')
Đây là trang mẫu
<div ng-controller="BannerController" ng-init="showbanner()">
  <img ng-src="<%'upload/banner/' + showbanner.image%>"/>
</div>
@endsection

