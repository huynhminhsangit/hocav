app.controller('ClientController', function ($scope, $http,API,DTOptionsBuilder){

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
    ]);
  $scope.loadData = function() {
    $http.get(API + 'getlistclient').then(function(response){
     $scope.client=response.data;
     console.clear();
   });
  }

  $scope.delete = function(id) {
    $http.delete(API + 'client/' + id).then(function(response){
      $scope.loadData();
    });
  }


  $scope.showupdate = function(id) {
    $('#update').modal('show');
    $http.get(API + 'client/' + id + '/edit').then(function(response){
     $scope.client_edit=response.data;
     console.clear();
   });
  }

  $scope.update = function(id) {
    var data = $scope.client_edit;
    var url = API + 'client/' + id;
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
});