app.controller('BannerController', function ($scope, Upload, $http,API,DTOptionsBuilder){
  $scope.loadData = function() {
    $http.get(API + 'getlistbanner').then(function(response){
      $scope.banner=response.data; 
      console.clear();   
    });
      $http.get(API + 'namebanner').then(function(response){
        $scope.namebanner=response.data; 
        console.clear();       
   });    
  }
  $scope.delete = function(id) {
    $http.delete(API + 'banner/' + id).then(function(response){
      $scope.loadData();
    });
  }
  $scope.uploadPic = function(file) {
    var url = API + 'banner';
    if(!file)
    {
      var data = $scope.banner_add;
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
        data: {file: file ,banner_name_add:$scope.banner_add.banner_name_add}
        });
      file.upload.then(function (response) {
        $scope.massage=response.data;
        $scope.loadData();
      });
    }
  };
  $scope.editPic = function(file ,id) {
    var url = API + 'banner/' + id;
    if(!file)
    {
      var data = $scope.banner_edit;
      $http({
        method: 'PUT',
        url: url,
        data: data
      }).then(function(response) {
        $scope.massage_edit=response.data;
        $scope.loadData();
      }, function(error) {
       console.log(error);
     });
    }
    else
    {
      file.upload = Upload.upload({
        url: url,
        data: {edit_file: file ,name:$scope.banner_edit.name}
        });
      file.upload.then(function (response) {
        $scope.massage_edit=response.data;
        $scope.loadData();
      });
    }
  };
  $scope.showupdate = function(id) {
    $('#update').modal('show');
    $http.get(API + 'banner/' + id + '/edit').then(function(response){
     $scope.banner_edit=response.data;
   });
  }
  $scope.setbanner = function(id) {
    $http.get(API + 'setbanner/' + id).then(function(response){
      $scope.loadData();
    });
  }


  $scope.dtOptions = DTOptionsBuilder.newOptions()
  .withDOM('bfltip')
  .withLanguage(language)
  .withButtons([
    'colvis',
    'csv',
    'copy',
    'print',
    'excel',
    'pdf',
    {
      text: 'Thêm',
      action: function ( e, dt, node, config ) {
        $('#add').modal('show');
      }
    }
    ]);

});