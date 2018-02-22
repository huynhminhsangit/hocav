var app = angular.module('front', [], function($interpolateProvider,$compileProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
  $compileProvider.debugInfoEnabled(false);
});
app.constant('API','http://localhost:81/hoctienganh/public/');



























