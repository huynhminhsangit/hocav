<!DOCTYPE html>
<html lang="en" ng-app="myapp">
<body>
    <div ng-controller="ShowController">
      <img ng-src="<%'upload/banner/' + showbanner.image%>"/>
      @include('back_end.layout.js')
  </div>
</body>
</html>