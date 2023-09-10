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
        		<link rel="icon" type="image" sizes="24x24" href="/public/uploads/system_image/favico.png">


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
                    <div class="col-lg-6 d-flex flex-column justify-content-sm-around justify-content-center align-items-center flex-wrap py-5">
                        <div class="logo text-center">
                            <img src="{{ url('/public/uploads/system_image/'.$system_image[0]->description) }}" class="img-fluid img-logo" alt="image">
                            <h3 class="main-heading mt-4">Hi,👋<br/>Welcome Back..!</h3>
                            <p class="sub-heading">Sign In to your <?php echo $system_name[0]->description; ?> account.</p>
                        </div>
                        <div class="login-tabs text-center mt-4 w-100 d-flex flex-column align-items-center">
                            <ul class="nav nav-pills mb-5 mx-auto" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Individual</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Corporate</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                    <!-- FORM LOGIN INDIVIDUAL START -->
                                    <form id="frm_login_individual">
                                        @csrf
                                        <!-- EMAIL -->
                                        <div class="form-group position-relative mb-3">
                                            <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/email.png') }}" class="img-fluid"></span>
                                            <input type="email" class="form-control" placeholder="Email address" aria-label="Email address" name="email" id="email">
                                            <span class="error_msg" id="error_email"></span>
                                        </div>
                                        <div class="form-group position-relative w-pass mb-3">
                                            <!-- PASSWORD -->
                                            <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/lock.png') }}" class="img-fluid"></span>
                                            <input type="password" class="form-control" placeholder="Enter password" aria-label="Enter password" name="password" id="password">
                                            <span class="input-icon right"><img src="{{ url('/public/users/assets/images/icons/Eye-slash 1.png') }}" class="img-fluid" id="icon_password"></span>
                                            <span class="error_msg" id="error_password"></span>
                                            <!-- FORGOT PASSWORD LINK -->
                                            <a href="{{ url('/users/forgot_password') }}" class="text-success float-end mb-5 mt-3 pb-5">Forgot password?</a>
                                        </div>
                                        <button type="submit" class="btn btn-login btn-primary w-100 mt-5">Login</button>
                                    </form>
                                    <!-- FORM LOGIN INDIVIDUAL END -->
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                    <!-- FORM LOGIN COMPANY START -->
                                    <form id="frm_login_company">
                                        @csrf
                                        <!-- EMAIL -->
                                        <div class="form-group position-relative mb-3">
                                            <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/email.png') }}" class="img-fluid"></span>
                                            <input type="email" class="form-control" placeholder="Email address" aria-label="Email address" name="company_email" id="company_email">
                                            <span class="error_msg" id="error_company_email"></span>
                                        </div>
                                        <div class="form-group position-relative w-pass mb-3">
                                            <!-- PASSWORD -->
                                            <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/lock.png') }}" class="img-fluid"></span>
                                            <input type="password" class="form-control" placeholder="Enter password" aria-label="Enter password" name="company_password" id="company_password">
                                            <span class="input-icon right"><img src="{{ url('/public/users/assets/images/icons/Eye-slash 1.png') }}" class="img-fluid" id="icon_company_password"></span>
                                            <span class="error_msg" id="error_company_password"></span>
                                            <!-- FORGOT PASSWORD LINK -->
                                            <a href="{{ url('/users/forgot_password') }}" class="text-success float-end  mb-5 mt-3 pb-5">Forgot password?</a>
                                        </div>
                                        <button type="submit" class="btn btn-login btn-primary w-100 mt-5">Login</button>
                                    </form>
                                    <!-- FORM LOGIN COMPANY END -->
                                </div>
                            </div>
                            <!-- SIGNUP LINK START -->
                            <p class="text-primary mt-4">New User? <a href="{{ url('/users/signup') }}">Get started here!</a></p>
                            <!-- SIGNUP LINK START -->
                        </div> 
                    </div>
                    <!-- RIGHT SECTION END -->
                </div>
            </div>
        </div>
        
        <!-- SCRIPTS -->
        <script src="{{ url('public/users/assets/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ url('/public/users/assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('/public/users/assets/js/jquery.validate.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                // -------------- SHOW / HIDE PASSWORD VALUE ------------- //
                $("#icon_password").on("click", function() {
                    var input = $("#password");
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else{
                        input.attr("type", "password");
                    }
                });
                $("#icon_company_password").on("click", function() {
                    var input = $("#company_password");
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else{
                        input.attr("type", "password");
                    }
                });
                // -------------- SHOW / HIDE PASSWORD VALUE ------------- //

                // -------------- FORM LOGIN INDIVIDUAL VALIDATION ------------- //
                $("#frm_login_individual").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                        },
                    },
                    messages: {
                        email: {
                            required: "This field is required.",
                            email: "Please enter a valid email address."
                        },
                        password: {
                            required: "This field is required."
                        },
                    },
                    errorPlacement: function (error, element) {
                        //error.insertAfter (element);
                        if (element.attr("name") == "email") {
                            $("#error_email").html(error);
                        } else if (element.attr("name") == "password") {
                            $("#error_password").html(error);
                        }
                    }
                }); 
                // -------------- FORM LOGIN INDIVIDUAL VALIDATION ------------- //

                // -------------- FORM LOGIN INDIVIDUAL SUBMISSION ------------- //
                $("#frm_login_individual").on("submit", function (event) {
                    event.preventDefault();
                    if ($("#frm_login_individual").valid()) {
                        var email = $("#email").val();        
                        var password = $("#password").val(); 

                        var settings = {
                            "url": "{{ env('API_URL') }}" + "signin",
                            "method": "POST",
                            "timeout": 0,
                            "headers": {
                                "Content-Type": "application/json"
                            },
                    
                            "data": JSON.stringify({
                                "email": email,
                                "password": password,
                            }),
                        };

                        $.ajax(settings).done(function (response) {
                            if (response.status == "error") { 
                                Command: toastr["error"](response.message);
                            } else{
                                if (response.data.users_customers_type == "Individual") {
                                    var settings = {
                                        "url": "/",
                                        "method": "POST",
                                        "timeout": 0,
                                        "headers": {
                                            "Content-Type": "application/json"
                                        },
                    
                                        "data": JSON.stringify({
                                            //"data": response.data,
                                            "_token": "{{ csrf_token() }}",
                                            "users_customers_type": response.data.users_customers_type,
                                            "users_customers_id": response.data.users_customers_id,
                                            "profile_pic": response.data.profile_pic,
                                            "first_name": response.data.first_name,
                                            "last_name": response.data.last_name,
                                            "email": response.data.email,
                                            "phone": response.data.phone,
                                        }),
                                    };

                                    $.ajax(settings).done(function (response) {
                                        if (response == true) { 
                                            window.location.href = "/users/dashboard";
                                        } else{
                                            Command: toastr["error"]("Oops! Something went wrong. Try again");
                                        } 
                                    });
                                } else{
                                    Command: toastr["error"]("Please select the correct user type for login.");
                                }
                            }
                        });
                    }
                });
                // -------------- FORM LOGIN INDIVIDUAL SUBMISSION ------------- //

                // -------------- FORM LOGIN COMPANY VALIDATION ------------- //
                $("#frm_login_company").validate({
                    rules: {
                        company_email: {
                            required: true,
                            email: true
                        },
                        company_password: {
                            required: true
                        },
                    },
                    messages: {
                        company_email: {
                            required: "This field is required.",
                            email: "Please enter a valid email address."
                        },
                        company_password: {
                            required: "This field is required."
                        },
                    },
                    errorPlacement: function (error, element) {
                        //error.insertAfter (element);
                        if (element.attr("name") == "company_email") {
                            $("#error_company_email").html(error);
                        } else if (element.attr("name") == "company_password") {
                            $("#error_company_password").html(error);
                        }
                    }
                }); 
                // -------------- FORM LOGIN COMPANY VALIDATION ------------- //

                // -------------- FORM LOGIN COMPANY SUBMISSION ------------- //
                $("#frm_login_company").on("submit", function (event) {
                    event.preventDefault();
                    if ($("#frm_login_company").valid()) {
                        var email = $("#company_email").val();        
                        var password = $("#company_password").val();  

                        var settings = {
                            "url": "{{ env('API_URL') }}" + "signin",
                            "method": "POST",
                            "timeout": 0,
                            "headers": {
                                "Content-Type": "application/json"
                            },
                    
                            "data": JSON.stringify({
                                "email": email,
                                "password": password,
                            }),
                        };

                        $.ajax(settings).done(function (response) {
                            if (response.status == "error") { 
                                Command: toastr['error'](response.message);
                            } else{
                                if (response.data.users_customers_type == "Company") {
                                    var settings = {
                                        "url": "/",
                                        "method": "POST",
                                        "timeout": 0,
                                        "headers": {
                                            "Content-Type": "application/json"
                                        },
                    
                                        "data": JSON.stringify({
                                            //"data": response.data,
                                            "_token": "{{ csrf_token() }}",
                                            "users_customers_type": response.data.users_customers_type,
                                            "users_customers_id": response.data.users_customers_id,
                                            "profile_pic": response.data.profile_pic,
                                            "company_name": response.data.company_name,
                                            "first_name": response.data.first_name,
                                            "email": response.data.email,
                                            "phone": response.data.phone,
                                        }),
                                    };

                                    $.ajax(settings).done(function (response) {
                                        if (response == true){ 
                                            window.location.href = "/users/dashboard";
                                        } else{
                                            Command: toastr["error"]("Oops! Something went wrong. Try again");
                                        } 
                                    });  
                                } else{
                                    Command: toastr["error"]("Please select the correct user type for login.");
                                }
                            }
                        });
                    }
                });
                // -------------- FORM LOGIN COMPANY SUBMISSION ------------- //
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