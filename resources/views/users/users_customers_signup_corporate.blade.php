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
        <link href="{{ url('/public/users/assets/plugin/select-flag/css/intlTelInput.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/public/users/assets/css/jquery.ui.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/public/users/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/public/users/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
         <div id="signup">
            <div class="container py-100">
                <div class="row">
                    <div class="col-12 text-center mb-2 logo">
                        <h3 class="main-heading mb-3">Welcome..!</h3>
                        <img src="{{ url('/public/uploads/system_image/'.$system_image[0]->description) }}" class="img-fluid mb-3 img-logo" alt="logo">
                        <p class="sub-heading">Create your <?php echo $system_name[0]->description; ?> account.</p>
                    </div>
                </div>
                <!-- FORM SIGNUP START -->
                <form id="frm_signup">
                    @csrf
                    <div class="row px-3">
                        <div class="col-md-4 col-sm-6 mb-1"></div>
                        <!-- PROFILE PIC -->
                        <div class="col-md-4 col-sm-6 mb-1">
                            <div class="control-group text-center mx-auto file-upload" id="upload_profile">
                                <div class="image-box text-center mx-auto">
                                    <img src="{{ url('/public/users/assets/images/icons/document-upload.png') }}" class="img-fluid" id="profile_pic_preview" alt="">
                                </div>
                                <div class="controls">
                                    <input type="file" accept="image/png, image/jpg, image/jpeg" name="profile_pic" id="profile_pic" hidden multiple/>
                                    <span class="error_msg" id="error_profile_pic"></span>
                                    <textarea rows="10" cols="50" id="profile_pic_string" hidden></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-1"></div>
                        <!-- COMPANY NAME -->
                        <div class="col-md-4 col-sm-12 mb-3">
                            <div class="form-group position-relative">
                                <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/company.png') }}" alt="icon" class="img-fluid"></span>
                                <input type="text" class="form-control" placeholder="Company Name" aria-label="Company Name" name="company_name" id="company_name">
                                <span class="error_msg" id="error_company_name"></span>
                            </div>
                        </div>
                        <!-- REPRESENTATIVE NAME -->
                        <div class="col-md-4 col-sm-12 mb-3">
                            <div class="form-group position-relative">
                                <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/profile-1.png') }}" alt="icon" class="img-fluid"></span>
                                <input type="text" class="form-control" placeholder="Representative name" aria-label="Representative name" name="representative_name" id="representative_name">
                                <span class="error_msg" id="error_representative_name"></span>
                            </div>
                        </div>
                        <!-- EMAIL -->
                        <div class="col-md-4 col-sm-12 mb-3">
                            <div class="form-group position-relative">
                                <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/email.png') }}" alt="icon" class="img-fluid"></span>
                                <input type="email" class="form-control" placeholder="Email address" aria-label="Email address" name="email" id="email">
                                <span class="error_msg" id="error_email"></span>
                            </div>
                        </div>
                        <!-- PHONE NUMBER -->
                        <div class="col-md-4 col-sm-12 mb-3">
                            <div class="form-group position-relative">
                                <input type="tel" class="form-control w-100" placeholder="Phone number" aria-label="Phone number" name="phone_number" id="phone_number">
                                <span class="error_msg" id="error_phone_number"></span>
                            </div>
                        </div>
                        <!-- PASSWORD -->
                        <div class="col-md-4 col-sm-12 mb-3">
                            <div class="form-group position-relative w-pass">
                                <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/lock.png') }}" alt="icon" class="img-fluid"></span>
                                <input type="password" class="form-control" placeholder="Create password" aria-label="Create password" name="password" id="password">
                                <span class="input-icon right"><img src="{{ url('/public/users/assets/images/icons/Eye-slash 1.png') }}" alt="icon" class="img-fluid" id="icon_password"></span>
                                <span class="error_msg" id="error_password"></span>
                            </div>
                        </div>
                        <!-- CONFIRM PASSWORD -->
                        <div class="col-md-4 col-sm-12 mb-3">
                            <div class="form-group position-relative w-pass">
                                <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/lock.png') }}" alt="icon" class="img-fluid"></span>
                                <input type="password" class="form-control" placeholder="Confirm password" aria-label="Confirm password" name="confirm_password" id="confirm_password">
                                <span class="input-icon right"><img src="{{ url('/public/users/assets/images/icons/Eye-slash 1.png') }}" alt="icon" class="img-fluid" id="icon_confirm_password"></span>
                                <span class="error_msg" id="error_confirm_password"></span>
                            </div>
                        </div>
                        <!-- LOCATION -->
                        <div class="col-12 mb-5">
                            <div class="form-group position-relative">
                                <span class="input-icon"><span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/location.png') }}" alt="icon" class="img-fluid"></span></span>
                                <input type="text" class="form-control" placeholder="2972 Westheimer Rd. Santa Ana, Illinois." aria-label="location" name="location" id="location">
                                <span class="error_msg" id ="error_location"></span>
                            </div>
                        </div>
                        <!-- UPLOAD -->
                        <div class="col-12">
                            <h3 class="title text-success">Upload</h3>
                        </div>
                        <!-- ID OPTIONS -->
                        <div class="col-md-4 col-sm-6 mb-3">
                            <p class="sub-heading">Government issued ID for User Validation</p>
                            <ul class="list-unstyled">
                                <li><span class="text-danger" >*</span>Acceptable IDs will be</li>
                                <li>1- Drivers License</li>
                                <li>2- Passport</li>
                                <li>3- National Identity Card</li>
                                <li>4- Voters Card</li>
                            </ul>
                        </div>
                        <!-- ID FRONT IMAGE -->
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="control-group file-upload" id="file-upload1">
                                <div class="image-box text-center mx-auto">
                                    <!-- <p>Upload Image</p> -->
                                    <img src="{{ url('/public/users/assets/images/icons/document-upload.png') }}" class="img-fluid" id="id_front_image_preview" alt="">
                                </div>
                                <div class="controls" style="/*display: none;*/">
                                    <input type="file" accept="image/png, image/jpg, image/jpeg" name="id_front_image" id="id_front_image" hidden multiple/>
                                    <span class="error_msg" id="error_id_front_image"></span>
                                    <textarea rows="10" cols="50" id="id_front_image_string" hidden></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- ID BACK IMAGE -->
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="control-group file-upload" id="file-upload1">
                                <div class="image-box text-center mx-auto">
                                    <img src="{{ url('/public/users/assets/images/icons/document-upload.png') }}" class="img-fluid" id="id_back_image_preview" alt="">
                                </div>
                                <div class="controls">
                                    <input type="file" accept="image/png, image/jpg, image/jpeg" name="id_back_image" id="id_back_image" hidden multiple/>
                                    <span class="error_msg" id="error_id_back_image"></span>
                                    <textarea rows="10" cols="50" id="id_back_image_string" hidden></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 mb-5"></div>
                        <!-- ID NUMBER -->
                        <div class="col-md-4 col-sm-12 mb-5">
                            <div class="form-group position-relative">
                                <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/profile-1.png') }}" alt="icon" class="img-fluid"></span>
                                <input type="text" class="form-control" placeholder="Enter user ID number" aria-label="ID Number" name="id_number" id="id_number" maxlength="13">
                                <span class="error_msg" id="error_id_number"></span>
                            </div>
                        </div>
                        <!-- EXPIRY DATE -->
                        <div class="col-md-4 col-sm-12 mb-5">
                            <div class="form-group position-relative">
                                <span class="input-icon"><img src="{{ url('/public/users/assets/images/icons/Expiry Date.png') }}" alt="icon" class="img-fluid"></span>
                                <input type="text" class="form-control mb-3" placeholder="Enter Expiry date of ID" aria-label="location" name="expiry_date" id="expiry_date">
                                <span class="error_msg" id="error_expiry_date"></span>
                                <small class="text-primary"><span class="text-danger" >*</span>After expiration of current id, re-verification process  will need.</small>
                            </div>
                        </div>
                        <div class="col-sm-6 mx-auto mt-5">
                            <button type="submit" class="btn btn-login btn-primary w-100">Next</button>
                            <!--<a href="javascript:void()" class="btn btn-login btn-primary w-100">Next</a>-->
                        </div>
                    </div>
                </form>
                <!-- FORM SIGNUP END -->
            </div>
        </div>
        
        <!-- SCRIPTS-->
        <script src="{{ url('/public/users/assets/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ url('/public/users/assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('/public/users/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('/public/users/assets/js/jquery.ui.min.js') }}"></script>
        <script src="{{ url('/public/users/assets/js/jquery.additional.methods.js') }}"></script>
        <!--<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>-->
        <script src="{{ url('/public/users/assets/plugin/select-flag/js/intlTelInput-jquery.js') }}"></script>
        <script src="{{ url('/public/users/assets/js/file-upload/index.js') }}"></script>
        <script src="{{ url('/public/users/assets/plugin/select-flag/js/utils.js')}}"></script>
        <script>
            $(document).ready(function() {
                // --------------- SHOW / HIDE PASSWORD --------------- //
                $("#icon_password").on("click", function() {
                    var input = $("#password");
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else{
                        input.attr("type", "password");
                    }
                });
                $("#icon_confirm_password").on("click", function() {
                    var input = $("#confirm_password");
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else{
                        input.attr("type", "password");
                    }
                });
                // --------------- SHOW / HIDE PASSWORD --------------- //

                // --------------- DATEPICKER CALENDER --------------- //
                $(function() {
                    var today = new Date();
                    var tomorrow = new Date(today.getTime() + 24 * 60 * 60 * 1000); 
                    //console.log(tomorrow);
                    $("#expiry_date").datepicker({
                        dateFormat: "yy-mm-dd",
                        minDate: tomorrow, 
                    });
                });
                // --------------- DATEPICKER CALENDER --------------- //

                // --------------- IMAGE PREVIEW & BSASE64 STRING --------------- //
                function previewImage (image, preview, string) {
                    var preview = document.querySelector(preview);
                    var fileImage = image.files[0];
                    var reader = new FileReader();

                    reader.addEventListener("load", function() {
                        preview.style.height = "100";
                        preview.title = fileImage.name;

                       // CONVERT IMAGE FILE TO BASE64 STRING
                       preview.src = reader.result;
                       // CONVERT IMAGE FILE TO BASE64 STRING

                       document.querySelector(string).value = reader.result.toString().replace(/^data:(.*,)?/, "");
                   }, false);

                    if (fileImage) {
                        reader.readAsDataURL(fileImage);
                    }
                }

                document.querySelector("#profile_pic").addEventListener("change", function() {
                    previewImage(this,"#profile_pic_preview","#profile_pic_string");
                });

                document.querySelector("#id_front_image").addEventListener("change", function() {
                    previewImage(this,"#id_front_image_preview","#id_front_image_string");
                });

                document.querySelector("#id_back_image").addEventListener("change", function() {
                    previewImage(this,"#id_back_image_preview","#id_back_image_string");
                });
                // --------------- IMAGE PREVIEW & BSASE64 STRING --------------- //

                // --------------- FORM SIGNUP VALIDATION --------------- //
                $("#frm_signup").validate({
                    ignore: [],
                    rules: {
                        profile_pic: {
                            required: true
                        },
                        company_name: {
                            required: true
                        },
                        representative_name: {
                            required: true,
                            minlength: 3
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        phone_number: {
                            required: true,
                            digits: true
                        },
                        password: {
                            required: true,
                            minlength: 7
                        },
                        confirm_password: {
                            required: true,
                            equalTo: "#password"
                        },
                        location: {
                            required: true
                        },
                        id_front_image: {
                            required: true
                        },
                        id_back_image: {
                            required: true
                        },
                        id_number: {
                            required: true,
                            digits: true
                        },
                        expiry_date: {
                            required: true
                        },
                    },
                    messages: {
                        profile_pic: {
                            required: "Select profile picture."
                        },
                        company_name: {
                            required: "This field is required."
                        },
                        representative_name: {
                            required: "This field is required.",
                            minlength: "Name should be at least 3 characters long."
                        },
                        email: {
                            required: "This field is required.",
                            email: "Please enter a valid email address."
                        },
                        phone_number: {
                            required: "This field is required.",
                            digits: "Please enter a valid phone number."
                        },
                        password: {
                            required: "This field is required.",
                            minlength: "Password should be at least 7 characters long."
                        },
                        confirm_password: {
                            required: "This field is required.",
                            equalTo: "Please enter the same value as password."
                        },
                        location: {
                            required: "This field is required."
                        },
                        id_front_image: {
                            required: "Select front image of ID."
                        },
                        id_back_image: {
                            required: "Select back image of ID." 
                        },
                        id_number: {
                            required: "This field is required.",
                            digits: "Please enter a valid ID number."
                        },
                        expiry_date: {
                            required: "This field is required."
                        },
                    },
                    errorPlacement: function (error, element) {
                        //error.insertAfter (element);
                        if (element.attr("name") == "profile_pic") {
                            $("#error_profile_pic").html(error);
                        } else if (element.attr("name") == "company_name") {
                            $("#error_company_name").html(error);
                        } else if (element.attr("name") == "representative_name") {
                            $("#error_representative_name").html(error);
                        } else if (element.attr("name") == "email") {
                            $("#error_email").html(error);
                        } else if (element.attr("name") == "phone_number") {
                            $("#error_phone_number").html(error);
                        } else if (element.attr("name") == "password") {
                            $("#error_password").html(error);
                        } else if (element.attr("name") == "confirm_password") {
                            $("#error_confirm_password").html(error);
                        } else if (element.attr("name") == "location") {
                            $("#error_location").html(error);
                        } else if (element.attr("name") == "id_front_image") {
                            $("#error_id_front_image").html(error);
                        } else if (element.attr("name") == "id_back_image") {
                            $("#error_id_back_image").html(error);
                        } else if (element.attr("name") == "id_number") {
                            $("#error_id_number").html(error);
                        } else if (element.attr("name") == "expiry_date") {
                            $("#error_expiry_date").html(error);
                        }
                    }
                });
                // --------------- FORM SIGNUP VALIDATION --------------- //

                $("#frm_signup").on("submit", function (event) {
                    event.preventDefault();
                    if ($("#frm_signup").valid()) {
                        var profile_pic = $("#profile_pic_string").val();           
                        var company_name = $("#company_name").val();                
                        var representative_name = $("#representative_name").val();  
                        var email = $("#email").val();                              
                        var phone_number = $("#phone_number").val();                
                        var password = $("#password").val();                       
                        var location = $("#location").val();                        
                        var id_front_image = $("#id_front_image_string").val();     
                        var id_back_image = $("#id_back_image_string").val();       
                        var id_number = $("#id_number").val();                      
                        var expiry_date = $("#expiry_date").val();                   


                        var settings = {
                            "url": "{{ env('API_URL') }}" + "signup",
                            "method": "POST",
                            "timeout": 0,
                            "headers": {
                                "Content-Type": "application/json"
                            },
                    
                            "data": JSON.stringify({
                                "users_customers_type": "Company",
                                "profile_pic": profile_pic,
                                "company_name": company_name,
                                "first_name": representative_name,
                                "email": email,
                                "phone": phone_number,
                                "password": password,
                                "location": location,
                                "id_front_image": id_front_image,
                                "id_back_image": id_back_image,
                                "id_number": id_number,
                                "date_expiry": expiry_date,
                            }),
                        };

                        $.ajax(settings).done(function (response) {
                            if (response.status == "error") { 
                                Command: toastr["error"](response.message);
                            } else{
                                var settings = {
                                    "url": "/users/signup_process",
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
                                        "company_name": company_name,
                                        "first_name": representative_name,
                                        "email": response.data.email,
                                        "phone": response.data.phone,
                                    }),
                                };

                                $.ajax(settings).done(function (response) {
                                    if (response == true) {
                                        window.location.href = "/users/signup_verified";
                                    } else{
                                        Command: toastr["error"]("Oops! Something went wrong. Try again");
                                    } 
                                });
                            }
                        });
                    }
                });
                // --------------- FORM SIGNUP SUBMISSION --------------- //                  
            });
            // --------------- TELEPHONE NO. --------------- //
            /*$("#telephone").intlTelInput({
                initialCountry: 'auto',
                geoIpLookup: function(success, failure) {
                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "";
                        success(countryCode);
                    });
                },
                utilsScript: "{{ url('/public/assets/plugin/select-flag/js/utils.js') }}"
            });*/
            // --------------- TELEPHONE NO. --------------- //
        </script>
        <!-- SCRIPTS-->

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