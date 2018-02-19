app.controller('ShowController', function ($scope, $http,API){

    $http.get(API + 'showbanner').then(function(response){
     $scope.showbanner=response.data; 
     console.clear();    
   });

});