$("#checkall").click (function () {
            var checkedStatus = this.checked;
            $("#dataTable tbody tr td").find(":checkbox").each(function () {
                $(this).prop("checked", checkedStatus);
            });
        });
$("#logout").click (function () {
			$("#logout-form").submit();
        });
$("#act").click (function () {
        	$("#descrip").prop("readonly",false);
        		$("#descrip1").prop("readonly",false);
                $("#addButton").show();
                $("#addButton1").show();
                $("#imag").show();
                
        });
        $("#addButton").click (function () {
            $("#descrip").prop("readonly",true);
                $("#descrip1").prop("readonly",true);
                $("#addButton").hide();
                $("#addButton1").hide();
                $("#imag").hide();
        });