var app = angular.module('back', ['angularMoment','datatables', 'datatables.buttons','ngFileUpload'], function($interpolateProvider,$compileProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
  $compileProvider.debugInfoEnabled(false);
});
app.constant('API','http://hocav.herokuapp.com/');
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



























