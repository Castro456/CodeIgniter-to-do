$(document).ready(function () {
    //Toastr custom options
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "500",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "slideDown",
    "hideMethod": "fadeOut"
    }

	$(document).on("click", "#addbtn", function () {

		var task = $("#text").val();

        if(task == '' || task == null) {
            toastr.warning('Please enter a task');
            return false
        }

		$("#addbtn").attr("disabled", true);
		$("#addbtn").text("Adding...");

		$.ajax({
			url: "api/user/add-task",
			type: "POST",
			data: {
				task: task
			},

			success: function (result) {
				$("#addbtn").attr("disabled", false);
				$("#addbtn").text("Add");
				$("#text").val("");

				if (result) {
					toastr.success(result.message);
				} 
                else {
					toastr.error("Problem Occured");
				}
			}

		});
	});
});
