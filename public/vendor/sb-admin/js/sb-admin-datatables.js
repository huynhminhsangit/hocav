$(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'lBfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print','colvis',
        {
            text: 'Thêm',
            action: function ( e, dt, node, config ) {
                $('#add').modal('show');
            }
        },
        {
            text: 'Xóa',
            action: function ( e, dt, node, config ) {
                $( "#del" ).submit();                
            }
        }
        ],   
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        "language":
        {
            "decimal":        "",
            "emptyTable":     "Không Có Dữ Liệu",
            "info":           "_START_ - _TOTAL_",
            "infoEmpty":      "0 - 0",
            "infoFiltered":   "(filtered from _MAX_ total entries)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Hiện _MENU_ Dữ liệu",
            "loadingRecords": "Đang chạy...",
            "processing":     "Đang chạy...",
            "search":         "Tìm kiếm:",
            "zeroRecords":    "Không tìm thấy dữ liệu",
            "paginate": {
                "first":      "Trang Đầu",
                "last":       "Trang Cuối",
                "next":       "Trang Tiếp Theo",
                "previous":   "Trang Sau"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
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
    });
} );
