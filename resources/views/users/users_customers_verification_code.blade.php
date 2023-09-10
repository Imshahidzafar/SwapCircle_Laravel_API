<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            $system_image=DB::table('system_settings')->select('description')->where('type', 'system_image')->get(); 
            $system_name=DB::table('system_settings')->select('description')->where('type', 'system_name')->get(); 
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $system_name[0]->description; ?> :: Users Customers Portal</title>

        <link href="{{ url('/public/users/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/public/users/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/public/users/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrapper">
            <div class="container-fluid">
                <div class="row login min-vh-100">
                    <!-- LEFT SECTION START -->
                    <div class="col-lg-6 left d-lg-flex align-items-center justify-content-center justify-content-md-start py-5 d-none">
                        <img src="{{ url('/public/users/assets/images/Rocket_Boy_Flatline.png') }}" class="img-fluid w-75 mx-auto" alt="image">
                    </div>
                    <!-- LEFT SECTION END -->

                    <!-- RIGHT SECTION START -->
                    <div class="col-lg-6 d-flex flex-column justify-content-sm-around justify-content-center align-items-center flex-wrap  py-5">
                        <div class="logo text-center">
                            <img src="{{ url('/public/uploads/system_image/'.$system_image[0]->description) }}" class="img-fluid img-logo" alt="image">
                            <h3 class="main-heading mt-5">Verification Code</h3>
                            <p class="sub-heading mt-2">Enter verification code sent to your <br/> registered email.</p>
                            <!-- FORM VERIFICATION CODE START -->
                            <form id="frm_verification_code" class="mt-5">
                                @csrf
                                <!-- USERS CUSTOMERS ID -->
                                <input type="hidden" id="users_customers_id" value="{{ $id }}">
                                <!-- OTP -->
                                <div class="form-group position-relative mb-3 input_otp">
                                    <div class="d-flex flex-row justify-content-center align-items-center flex-wrap">
                                        <input type="text" class="form-control" placeholder="4" aria-label="Enter digit 1" name="digit_1" id="digit_1" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <input type="text" class="form-control" placeholder="4" aria-label="Enter digit 2" name="digit_2" id="digit_2" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <input type="text" class="form-control" placeholder="4" aria-label="Enter digit 3" name="digit_3" id="digit_3" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <input type="text" class="form-control" placeholder="4" aria-label="Enter digit 4" name="digit_4" id="digit_4" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <span class="error_msg" id="error_otp"></span>
                                </div>
                                <div class="pt-4">
                                    <button type="submit" class="btn btn-login btn-primary w-100 mt-4">Next</button>
                                </div>
                            </form>
                            <!-- FORM VERIFICATION CODE END -->
                        </div>
                    </div>
                    <!-- RIGHT SECTION END -->
                </div>
            </div>
        </div>

        <!-- SCRIPTS -->
        <script src="{{ url('/public/users/assets/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ url('/public/users/assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('/public/users/assets/js/jquery.validate.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                // -------------- FOCUS INPUT FIELD ------------- //
                $(function() {
                    const inputs = document.querySelectorAll("input");
                    const button = document.querySelector("button");
                    //console.log(inputs, button); 

                    // iterate over all inputs
                    inputs.forEach((input, index1) => {
                        input.addEventListener("keyup", (e) => {
                            const currentInput = input;
                            const nextInput = input.nextElementSibling;
                            const previousInput = input.previousElementSibling;

                            // if next input exists & current value is not empty, focus on next input
                            if(nextInput && currentInput.value !== "") {
                                nextInput.focus();
                            }

                            // if 'backspace' key is pressed 
                            if(e.key === "Backspace") {
                                // iterate over all inputs
                                inputs.forEach((input, index2) => {
                                    // if index1 of current input is less than or equal to index2 of input in outer loop
                                    // & previous element exists, focus on previous element
                                    if(index1 <= index2 && previousInput) {
                                        currentInput.value = "";
                                        previousInput.focus();
                                    }
                                });
                            }
                        });
                    });

                    // focus 1st input which index is '0' on window load
                    window.addEventListener("load", () => inputs[0].focus());
                });
                // -------------- FOCUS INPUT FIELD ------------- //

                // -------------- FORM VERIFICATION CODE VALIDATION ------------- //
                $("#frm_verification_code").validate({
                    rules: {
                        digit_1: {
                            required: true
                        },
                        digit_2: {
                            required: true
                        },
                        digit_3: {
                            required: true
                        },
                        digit_4: {
                            required: true
                        },
                    },
                    messages: {
                        digit_1: {
                            required: "Enter 4 digit verification code."
                        },
                        digit_2: {
                            required: "Enter 4 digit verification code."
                        },
                        digit_3: {
                            required: "Enter 4 digit verification code."
                        },
                        digit_4: {
                            required: "Enter 4 digit verification code."
                        },
                    },
                    errorPlacement: function (error, element) {
                        //error.insertAfter (element);
                        if ((element.attr("name") == "digit_1") || (element.attr("name") == "digit_2") || (element.attr("name") == "digit_3") || (element.attr("name") == "digit_4")) {
                            $("#error_otp").html(error);
                        } 
                    }
                });
                // -------------- FORM VERIFICATION CODE VALIDATION ------------- //

                // -------------- FORM VERIFICATION CODE SUBMISSION ------------- //
                $("#frm_verification_code").on("submit", function (event) {
                    event.preventDefault();
                    if ($("#frm_verification_code").valid()) {
                        var users_customers_id = $("#users_customers_id").val();  
                        var digit_1 = $("#digit_1").val();                        
                        var digit_2 = $("#digit_2").val();                        
                        var digit_3 = $("#digit_3").val();                       
                        var digit_4 = $("#digit_4").val();                        
                        var otp = digit_1 + digit_2 + digit_3 + digit_4;          

                        var settings = {
                            "url": "{{ env('API_URL') }}" + "users_customers_verify_otp",
                            "method": "POST",
                            "timeout": 0,
                            "headers": {
                                "Content-Type": "application/json"
                            },
                    
                            "data": JSON.stringify({
                                "users_customers_id": users_customers_id,
                                "verify_otp": otp,
                            }),
                        };

                        $.ajax(settings).done(function (response) {
                            if (response.status == "error"){ 
                                Command: toastr["error"](response.message);
                            } else{
                                var email = response.data.email;  alert(otp);
                                window.location.href = "/users/reset_password/" + email + "/" + otp;
                            }
                        });
                    }
                });
                // -------------- FORM VERIFICATION CODE SUBMISSION ------------- //
            });
        </script>
        <!-- SCRIPTS -->

         <!-- TOASTERS -->
        <link href="{{asset('toasters/toastr.min.css')}}" rel="stylesheet" type="text/css" />   
        <script src="{{asset('toasters/toastr.min.js')}}" type="text/javascript"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            //Command: toastr['success']("hello");

            <?php if(Session::has('success')){ ?> Command: toastr['success']("<?php echo Session('success'); ?>"); <?php } ?>
            <?php if(Session::has('error')){ ?> Command: toastr['error']("<?php echo Session('error'); ?>"); <?php } ?>
            <?php if(Session::has('warning')){ ?> Command: toastr['warning']("<?php echo Session('warning'); ?>"); <?php } ?>
            <?php if(Session::has('info')){ ?> Command: toastr['info']("<?php echo Session('info'); ?>"); <?php } ?>
        </script>
        <!-- TOASTERS -->
    </body>
</html>