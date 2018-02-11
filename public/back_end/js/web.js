$("#checkall").click (function () {
            var checkedStatus = this.checked;
            $("#dataTable tbody tr td").find(":checkbox").each(function () {
                $(this).prop("checked", checkedStatus);
            });
        });