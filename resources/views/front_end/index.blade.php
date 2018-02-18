
</div>

<!DOCTYPE html>
<html lang="en" ng-app="myapp">
@include('back_end.layout.head')
<body>
<div ng-controller="BannerController" ng-init="showbanner()">
  <img ng-src="<%'upload/banner/' + showbanner.image%>"/>
    @include('back_end.layout.js')
  </body>
  </html>