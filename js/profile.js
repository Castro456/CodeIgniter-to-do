$(document).ready(function(){
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

    $('.save-btn').on('click',function(){

        $(".save-btn").attr("disabled", true);
        $(".save-btn").text("Saving changes...");

        var user_id = $("#user-id").val(); 
        var email = $("#email").val(); 
        var first_name = $("#fname").val(); 
        var last_name = $("#lname").val(); 
        var phone = $("#phone").val(); 
        var dob = $("#dob").val(); 
        var age = $("#calage").val(); 

        $.ajax({
            url: "api/admin/update-user",
            type: "POST",
            data:{
                user_id : user_id,
                fname : first_name,
                lname : last_name,
                email : email,
                phone : phone,
                dob : dob,
                age : age
            },
            success:function(message){ 

                $(".save-btn").attr("disabled", false);
                $(".save-btn").text("Save changes");

                if(message.message == "Nothing to change"){
                    toastr.warning(message.message);
                }

                else if(message.message == "Error Occurred"){
                    toastr.error(message.message);
                }

                else if(message.message == "This phone number already exits"){
                    toastr.warning(message.message);
                }

                else if(message.message == "User details updated"){
                    $(".save-btn").attr("disabled", true);
                    $(".save-btn").text("Please Wait...");
                    toastr.success("Changes updated successfully");
                    toastr.info("Logging out to reflect the changes");
                    window.setTimeout(function() {
                        window.location.replace("login/unset_session");
                    }, 4000);
                }

                else{
                    toastr.error("Problem Occurred");
                }

            },
            error:function(result){
                $(".save-btn").attr("disabled", false);
                $(".save-btn").text("Save changes");
            }
        })
    })
})