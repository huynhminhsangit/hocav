$("#logout").click (function () {
			$("#logout-form").submit();
        });
$("#act").click (function () {
        	$("#descrip").prop("readonly",false);
        		$("#descrip1").prop("readonly",false);
                $("#addButton").show();
                $("#imag").show();
                
        });
        $("#addButton").click (function () {
            $("#descrip").prop("readonly",true);
                $("#descrip1").prop("readonly",true);
                $("#addButton").hide();
                $("#imag").hide();
        });
