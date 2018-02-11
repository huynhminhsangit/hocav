var app = angular.module('my-app', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
app.constant('API','http://hocav.herokuapp.com');


