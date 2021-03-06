app.controller('HistoryController', function ($scope, $http,API,DTOptionsBuilder, DTColumnDefBuilder){
  $scope.selected = [];
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
      text: 'Xóa',
      action: function ( e, dt, node, config ) {
        var url = API + 'del';
        $http({
          method: 'POST',
          url: url,
          data:{id:$scope.selected}

        }).then(function(response) {          
          $scope.loadData()
          $scope.selected = [];
        }, function(error) {
         console.log(error);
       });
      }
    }
    ]);
  $scope.dtColumnDefs = [
  DTColumnDefBuilder.newColumnDef(6).notSortable()
  ];



  $scope.loadData = function() {
    $http.get(API + 'getlisthistory').then(function(response){
      $scope.historys=response.data;  
      console.clear();    
    });
  }  

  $scope.exist = function(folder) {
    return $scope.selected.indexOf(folder) > -1;
  };

  $scope.selectedid = function(folder) {
    var idx = $scope.selected.indexOf(folder);
    if(idx > -1)
    {
      $scope.selected.splice(idx,1);
    }
    else
    {
      $scope.selected.push(folder);
    }
  };

  $scope.checkAll= function(){
    if($scope.selectAll)
    {
      angular.forEach($scope.historys,function(item){
        idx =$scope.selected.indexOf(item);
        if(idx >=0)
        {
          return true;
        }
        else
        {
          $scope.selected.push(item.id);
        }
      }) 
    }
    else
    {
      $scope.selected = [];
    }

  }  
});
