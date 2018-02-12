var app = angular.module('myapp', ['angularMoment'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
app.constant('API','http://hocav.herokuapp.com/');
app.run(function(amMoment) {
	amMoment.changeLocale('vi');
});
app.controller('UserController', function ($scope, $http,API){
	$http.get(API + 'getlistuser').then(function(response){
			$scope.users=response.data;
		});
	$scope.showupdate = function(id) {
		$('#update').modal('show');
		$http.get(API + 'user/' + id + '/edit').then(function(response){
			$scope.user_edit=response.data;
		});
	}

});


