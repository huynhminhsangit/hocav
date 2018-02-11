app.controller('UserController', function ($scope, $http,API){
	$http.get(API + 'getlistuser').then(function(response){
		$scope.user=response.data;
	});
	$scope.save = function() {
		var url = API + 'user';
		var data =$scope.users;
		$http({
			method : 'POST',
			url : url,
			data : data,
			headers : {'Content-Type':'application/x-www-form-urlencoded'}
		})
		.then(function(response) {
            console.log($scope.users);
        }, 
    function(response) { // optional
            console.log($scope.users);
        });
	}
});