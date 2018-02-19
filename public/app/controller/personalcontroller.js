app.controller('PersonalController', function ($scope, Upload, $http,API){

  $scope.loadData = function() {
    $http.get(API + 'getlistpersonal').then(function(response){
      $scope.personal=response.data;
      console.clear();
    })
  };
  $scope.uploadPic = function(file) {
    var url = API + 'personal';
    if(!file)
    {
      var data = $scope.personal;
      $http({
        method: 'POST',
        url: url,
        data: data
      }).then(function(response) {
        $scope.massage=response.data;
        $scope.loadData();
      }, function(error) {
       console.log(error);
     });
    }
    else
    {
      file.upload = Upload.upload({
        url: url,
        data: {file: file ,name:$scope.personal.name,email:$scope.personal.email}
      });
      file.upload.then(function (response) {
        $scope.massage=response.data;
        $scope.loadData();
      });
    }
  };


  $scope.update_pass = function() {
    var url = API + 'personal/pass';
    $http({
      method: 'POST',
      url: url,
      data: {password_new:$scope.password_new,password_old:$scope.password_old}
    }).then(function(response) {
      $scope.massage=response.data;
      console.log(response);
      $scope.loadData();
    }, function(error) {
     console.log(error);
   });
  }

});