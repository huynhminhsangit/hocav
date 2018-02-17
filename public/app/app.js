var app = angular.module('myapp', ['angularMoment','datatables', 'datatables.buttons','ngFileUpload'], function($interpolateProvider,$compileProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
  $compileProvider.debugInfoEnabled(false);
});
app.constant('API','http://localhost:81/hoctienganh/public/');
app.run(function(amMoment) {
	amMoment.changeLocale('vi');
});
var language = {
  "sEmptyTable": "Không Có Dữ Liệu",
  "sInfo": "_START_ - _TOTAL_",
  "sInfoEmpty": "0 - 0",
  "sInfoFiltered": "(Lọc Từ _MAX_ Dòng)",
  "sInfoPostFix": "",
  "sInfoThousands": ",",
  "sLengthMenu": "Hiện _MENU_ Dữ liệu",
  "sLoadingRecords": "Đang Chạy...",
  "sProcessing": "Đang Chạy...",
  "sSearch": "Tìm Kiếm:",
  "sZeroRecords": "Không tìm thấy dữ liệu",
  "oPaginate": {
    "sFirst": "Trang Đầu",
    "sLast": "Trang Cuối",
    "sNext": "Trang Tiếp Theo",
    "sPrevious": "Trang Sau"
  },
  "oAria": {
    "sSortAscending": ": activate to sort column ascending",
    "sSortDescending": ": activate to sort column descending"
  },
  "buttons": {
    copy: 'Sao chép',
    csv: 'Xuất ra csv',
    excel: 'Xuất ra excel',
    pdf: 'Xuất ra PDF',
    print: 'In',
    colvis: 'Ẩn cột'
  }
}
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

app.controller('UserController', function ($scope, $http,API,DTOptionsBuilder, DTColumnBuilder){

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
  $scope.loadData = function() {
    $http.get(API + 'getlistuser').then(function(response){
     $scope.users=response.data;
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
     $scope.massage=response.data;
     $scope.loadData();
   }, function(error) {
     console.log(error);
   });
  }
});







app.controller('PersonalController', function ($scope, Upload, $http,API){

  $scope.loadData = function() {
    $http.get(API + 'getlistpersonal').then(function(response){
      $scope.personal=response.data;
    })
  };
  $scope.uploadPic = function(file) {
    var url = API + 'personal';
    if(!file)
    {
      var data = $scope.personal;
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
    else
    {
      file.upload = Upload.upload({
        url: url,
        data: {file: file ,name:$scope.personal.name,email:$scope.personal.email}
      });
      file.upload.then(function (response) {
        $scope.massage=response.data;
        $scope.loadData();
      });
    }
  };


  $scope.update_pass = function() {
    var url = API + 'personal/pass';
    $http({
      method: 'POST',
      url: url,
      data: {password_new:$scope.password_new,password_old:$scope.password_old}
    }).then(function(response) {
      $scope.massage=response.data;
      console.log(response);
      $scope.loadData();
    }, function(error) {
     console.log(error);
   });
  }

});

app.controller('BannerController', function ($scope, $http,API){

});



app.controller('HistoryController', function ($scope, $http,API,DTOptionsBuilder, DTColumnBuilder){
  $scope.selected = [];

  $scope.loadData = function() {
    $http.get(API + 'getlisthistory').then(function(response){
      $scope.historys=response.data;      
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
});




