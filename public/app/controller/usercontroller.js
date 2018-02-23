app.controller('UserController', function ($scope, $http,API,DTOptionsBuilder, DTColumnDefBuilder){

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
  $scope.dtColumnDefs = [
  DTColumnDefBuilder.newColumnDef(4).notSortable(),
  DTColumnDefBuilder.newColumnDef(5).notSortable(),
  DTColumnDefBuilder.newColumnDef(6).notSortable(),
  ];
  $scope.loadData = function() {
    $http.get(API + 'getlistuser').then(function(response){
     $scope.user=response.data;
     console.clear();
   });
  }

  $scope.delete = function(id) {
    $http.delete(API + 'user/' + id).then(function(response){
      $scope.loadData();
    });
  }


  $scope.showupdate = function(id) {
    $('#update').modal('show');
    $http.get(API + 'user/' + id + '/edit').then(function(response){
     $scope.user_edit=response.data;
     console.clear();
   });
  }

  $scope.store = function() {
    var data = $scope.user_add;
    var url = API + 'user';
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

  $scope.update = function(id) {
    var data = $scope.user_edit;
    var url = API + 'user/' + id;
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