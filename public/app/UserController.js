app.controller('UserController', function ($scope, $http,API){
	$http.get(API + 'getlistuser').then(function(response){
		$scope.listuser=response.data;
	});
	$scope.store = function() {
		var url = API + 'user';
		var data =$scope.user_add;
		$http({
			method : 'POST',
			url : url,
			data : data,
			headers : {'Content-Type':'application/json'}
		})
		.then(function(response) {
			console.log($scope.user_add);
		}, 
    function(response) {
    	console.log($scope.user_add);
    });
	}
	$scope.showupdate = function(id) {
		$('#update').modal('show');
		$http.get(API + 'user/' + id + '/edit').then(function(response){
			$scope.user_edit=response.data;
		});
	}
	$scope.update = function(id) {
		var url = API + 'user/' + id;
		var data =$scope.user_edit;
		$http({
			method : 'PUT',
			url : url,
			data : data,
			headers : {'Content-Type':'application/json'}
		})
		.then(function(response) {
			console.log($scope.user_edit);
			location.reload();
		}, 
    function(response) {
    	console.log($scope.user_edit);
    });
	}
});