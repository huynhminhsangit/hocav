var app = angular.module('myapp', ['angularMoment'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
app.constant('API','http://hocav.herokuapp.com/');
app.run(function(amMoment) {
	amMoment.changeLocale('vi');
});
app.controller('UserController', function ($scope, $http,API){
	$scope.showupdate = function(id) {
		$('#update').modal('show');
		$http.get(API + 'user/' + id + '/edit').then(function(response){
			$scope.user_edit=response.data;
		});
	}
});
app.directive("compareTo", function ()  
{  
    return {  
        require: "ngModel",  
        scope:  
        {  
            confirmPassword: "=compareTo"  
        },  
        link: function (scope, element, attributes, modelVal)  
        {  
            modelVal.$validators.compareTo = function (val)  
            {  
                return val == scope.confirmPassword;  
            };  
            scope.$watch("confirmPassword", function ()  
            {  
                modelVal.$validate();  
            });  
        }  
    };  
}); 
app.controller('PersonalController', function ($scope, $http,API){
	$scope.personal = {  
        password: "",  
        confirmPassword: ""  
    }; 
	$http.get(API + 'getlistpersonal').then(function(response){
		$scope.personal=response.data;
	});
});



