app.controller('ShowController', function ($scope, $http,API,$window){

  $http.get(API + 'showbanner').then(function(response){
   $scope.showbanner=response.data; 
   console.clear();    
 });
  $http.get(API + 'showslider1').then(function(response){
   $scope.showslider1=response.data; 
   console.clear();    
 });
  $http.get(API + 'showslider2').then(function(response){
   $scope.showslider2=response.data; 
   console.clear();    
 });
  $http.get(API + 'showslider3').then(function(response){
   $scope.showslider3=response.data; 
   console.clear();    
 });
});