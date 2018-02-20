app.controller('SliderController', function ($scope, Upload, $http,API,DTOptionsBuilder){
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
  $scope.delete = function(id) {
    $http.delete(API + 'slider/' + id).then(function(response){
      $scope.loadData();
    });      
  }
  $scope.loadData = function() {
    $http.get(API + 'getlistslider').then(function(response){
      $scope.slider=response.data; 
      console.clear();   
    });
    $http.get(API + 'nameslider1').then(function(response){
      $scope.nameslider1=response.data; 
      console.clear();     
    }); 
    $http.get(API + 'nameslider2').then(function(response){
      $scope.nameslider2=response.data; 
      console.clear();     
    });  
    $http.get(API + 'nameslider3').then(function(response){
      $scope.nameslider3=response.data; 
      console.clear();     
    }); 
  }

    $scope.uploadPic = function(file) {
      var url = API + 'slider';
      if(!file)
      {
        var data = $scope.slider_add;
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
          data: {file: file ,slider_name_add:$scope.slider_add.slider_name_add}
        });
        file.upload.then(function (response) {
          $scope.massage=response.data;
          $scope.loadData();
        });
      }
    };
    $scope.editPic = function(file ,id) {
      var url = API + 'slider/' + id;
      if(!file)
      {
        var data = $scope.slider_edit;
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
          data: {edit_file: file ,name:$scope.slider_edit.name}
        });
        file.upload.then(function (response) {
          $scope.massage_edit=response.data;
          $scope.loadData();
        });
      }
    };
    $scope.showupdate = function(id) {
      $('#update').modal('show');
      $http.get(API + 'slider/' + id + '/edit').then(function(response){
       $scope.slider_edit=response.data;
     });
    }
    $scope.setslider1 = function(id) {
      $http.get(API + 'setslider1/' + id).then(function(response){
        $scope.loadData();
      });
    }
    $scope.setslider2 = function(id) {
      $http.get(API + 'setslider2/' + id).then(function(response){
        $scope.loadData();
      });
    }
    $scope.setslider3 = function(id) {
      $http.get(API + 'setslider3/' + id).then(function(response){
        $scope.loadData();
      });
    }
  });