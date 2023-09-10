    <!-- SCRIPTS -->
    <script src="{{ url('/public/users/assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ url('/public/users/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('/public/users/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('/public/users/assets/js/jquery.ui.min.js') }}"></script>
    <script src="{{ url('/public/users/assets/js/jquery.additional.methods.js') }}"></script>
    <script src="{{ url('/public/users/assets/js/clipboard.min.js') }}"></script>
    <script>
        var el = document.getElementById("dashboard-wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function(){
            el.classList.toggle("toggled")
        }
    </script>
    
    <script src="{{ url('/public/users/assets/plugin/splide/splide.min.js') }}"></script>
    <script>
        document.addEventListener( 'DOMContentLoaded', function() {
            var splide1 = new Splide( '#slider-1' , {
                arrows:true,
                pagination:false,
                perPage:5,
                gap:"20px",
                breakpoints: {
                    992: {
                            perPage: 3,
                        },    
                    640: {
                            perPage: 2,
                        },
                }
            });
            splide1.mount( );

            var splide2 = new Splide( '#slider-2' , {
                arrows:true,
                pagination:false,
                perPage:3,
                gap:"20px",
                breakpoints:{
                    992: {
                            perPage: 2,
                        },    
                    640: {
                            perPage: 1,
                        },
                }
                });
              splide2.mount( );
        });
    </script>
    
    <script src="{{ url('/public/users/assets/js/file-upload/index.js') }}"></script>
    <script>
        $(".edit-image-box").click(function(event) {
            var previewImg = $(this).children("img");

            $(this)
                .siblings()
                .children("input")
                .trigger("click");

            $(this)
                .siblings()
                .children("input")
                .change(function() {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var urll = e.target.result;
                        $(previewImg).attr("src", urll);
                        $(previewImg).attr("class", "image");
                        previewImg.parent().css("background", "transparent");
                        previewImg.show();
                        previewImg.siblings("p").hide();
                    };
                    reader.readAsDataURL(this.files[0]);
                });
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

    <script type="text/javascript">
        //logged in users customers id
        var users_customers_id = "<?php echo session()->get('id'); ?>";
        
        $(document).ready(function() {
            // -------------- NOTIFICATIONS & MESSAGES ------------- //
            notifications();
            unreaded_notifications();
            unreaded_messages();
            get_all_chats();
            get_selected_user_messages();
            //setInterval(update_messages, 500);
            // -------------- NOTIFICATIONS & MESSAGES ------------- //

            // -------------- USERS PROFILE ------------- //
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "users_customers_profile",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };
            
            $.ajax(settings).done(function (response) { 
                var profile_image = "{{ url('public') }}" + "/" + response.data.profile_pic;
                //header
                $("#user_profile").append('\
                    <a href="#" class="nav-link d-flex align-items-center" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">\
                        <div class="me-4 d-none d-lg-block">\
                            <h5 class="sub-heading text-black mb-1 fw-bolder">\
                                Hi, '+response.data.first_name+' '+response.data.last_name+'\
                            </h5>\
                            <span>Hello</span>\
                        </div>\
                        <img src="'+profile_image+'" class="img-fluid" alt="" srcset="" width="55px" height="50px">\
                    </a>\
                ');

                //profile
                $("#profile").append('\
                    <img src="'+profile_image+'" class="img-fluid me-3" alt="image">\
                    <div>\
                        <h4 class="sub-heading text-black fw-bold mb-2">\
                            '+response.data.first_name+' '+response.data.last_name+'\
                        </h4>\
                        <p class="mb-0 d-flex align-items-center">\
                            <span class="me-2">\
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">\
                                    <path d="M19.8333 23.9163H8.16665C4.66665 23.9163 2.33331 22.1663 2.33331 18.083V9.91634C2.33331 5.83301 4.66665 4.08301 8.16665 4.08301H19.8333C23.3333 4.08301 25.6666 5.83301 25.6666 9.91634V18.083C25.6666 22.1663 23.3333 23.9163 19.8333 23.9163Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M19.8334 10.5L16.1817 13.4167C14.98 14.3733 13.0083 14.3733 11.8067 13.4167L8.16669 10.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>\
                                </svg>\
                            </span>\
                            '+response.data.email+'\
                        </p>\
                    </div>\
                ');

                //edit profile
                $(".edit-image-box").append('<img src="'+profile_image+'" class="img-fluid" alt="">');
            });
            //ajax call api
            // -------------- USERS PROFILE ------------- //

            // -------------- ALL CURRENCIES ------------- //
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "all_currencies",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) { 
                $.each(response.data, function (key, item) { 
                    //create wallet
                    $("#cw_base_currency").append('\
                        <option value="'+item.system_currencies_id+'">\
                            '+item.name+' ('+item.code+')\
                        </option>\
                    ');

                    //send currency
                    $("#sc_exchange_currency").append('\
                        <option symbol="'+item.symbol+'" value="'+item.system_currencies_id+'">\
                            '+item.name+' ('+item.code+')\
                        </option>\
                    ');

                    //create offer
                    $("#co_exchange_currency").append('\
                        <option value="'+item.system_currencies_id+'">\
                            '+item.name+' ('+item.code+')\
                        </option>\
                    ');

                    //buy from currency
                    $("#buy_from_currency").append('\
                        <option code="'+item.code+'" symbol="'+item.symbol+'" value="'+item.system_currencies_id+'">\
                            '+item.code+' ('+item.symbol+')\
                        </option>\
                    ');

                    //buy to currency
                    $("#buy_to_currency").append('\
                        <option code="'+item.code+'" symbol="'+item.symbol+'" value="'+item.system_currencies_id+'">\
                            '+item.code+' ('+item.symbol+')\
                        </option>\
                    ');

                    //sell from currency
                    $("#sell_from_currency").append('\
                        <option code="'+item.code+'" symbol="'+item.symbol+'" value="'+item.system_currencies_id+'">\
                            '+item.code+' ('+item.symbol+')\
                        </option>\
                    ');

                    //sell to currency
                    $("#sell_to_currency").append('\
                        <option code="'+item.code+'" symbol="'+item.symbol+'" value="'+item.system_currencies_id+'">\
                            '+item.code+' ('+item.symbol+')\
                        </option>\
                    ');
                });
            }); 
            //ajax call api
            // -------------- ALL CURRENCIES ------------- //

            // -------------- FORM CREATE WALLET VALIDATION ------------- //
            $("#frm_create_wallet").validate({
                rules: {
                    cw_base_currency: {
                        required: true
                    },
                },
                messages: {
                    cw_base_currency: {
                        required: "Select base currency."
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "cw_base_currency") {
                        $("#error_cw_base_currency").html(error);
                    }
                }
            });
            // -------------- FORM CREATE WALLET VALIDATION ------------- //

            // -------------- FORM CREATE WALLET SUBMISSION ------------- //
            $("#frm_create_wallet").on("submit", function (event) {
                event.preventDefault();
                if ($("#frm_create_wallet").valid()) {         
                    var system_currencies_id = $("#cw_base_currency").val();  
                    
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "create_wallet",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "users_customers_id": users_customers_id,
                            "system_currencies_id": system_currencies_id,
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        if (response.status == "success") {
                            Command: toastr["success"]("Wallet is created successfully.");
                            window.setTimeout(function() {location.reload()},1000);
                        } else{
                            Command: toastr["error"](response.message);
                        }
                    });
                    //ajax call api
                }
            });
            // -------------- FORM CREATE WALLET SUBMISSION ------------- //

            // -------------- ALL WALLETS ------------- //
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "get_wallet",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };
            
            $.ajax(settings).done(function (response) { 
                //wallets
                var data = response.data.slice(0, 7);
                $.each(data, function (key, item) {
                    var flag_image = "{{ url('public') }}" + item.currency.country.image;
                    $("#wallets").append('\
                        <li class="wallet-item">\
                            <img src="'+flag_image+'" class="img-fluid me-2" alt="image">\
                            <span>'+item.currency.code+'</span>\
                            <h5 class="mb-0 text-black fw-bolder mt-1">'+item.currency.symbol + item.wallet_amount+'</h5>\
                        </li>\
                    ');
                });

                $.each(response.data, function (key, item) {
                    //see wallets 
                    var flag_image = "{{url('public')}}" + item.currency.country.image;
                    $("#wallets_list").append('\
                        <li class="wallet-item">\
                            <img src="'+flag_image+'" class="img-fluid me-2" alt="image">\
                            <span>'+item.currency.code+'</span>\
                            <h5 class="mb-0 text-black fw-bolder mt-1">'+item.currency.symbol + item.wallet_amount+'</h5>\
                        </li>\
                    ');

                    //send currency 
                    $("#sc_from_currency").append('\
                        <option symbol="'+item.currency.symbol+'" value="'+item.system_currencies_id+'">\
                            '+item.currency.name+' ('+item.currency.code+')\
                        </option>\
                    ');

                    //create swap
                    $("#cs_from_account").append('\
                        <option amount="'+item.wallet_amount+'" value="'+item.users_customers_wallets_id+'">\
                            '+item.currency.name+' ('+item.currency.code+')\
                        </option>\
                    '); 
                    $("#cs_to_account").append('\
                        <option amount="'+item.wallet_amount+'" value="'+item.users_customers_wallets_id+'">\
                            '+item.currency.name+' ('+item.currency.code+')\
                        </option>\
                    ');

                    //create offer
                    $("#co_from_account").append('\
                        <option value="'+item.system_currencies_id+'">\
                            '+item.currency.name+' ('+item.currency.code+')\
                        </option>\
                    ');

                    //add account
                    $("#account_currency").append('\
                        <option value="'+item.system_currencies_id+'">\
                            '+item.currency.name+' ('+item.currency.code+')\
                        </option>\
                    ');
                });
            });
            //ajax call api
            // -------------- ALL WALLETS ------------- //

            // -------------- BASE CURRENCY ------------- //
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "system_settings/",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                var result = Object.values(response.data).filter(obj => obj.type === "system_currencies_id");
                var system_currencies_id = result.map((item) => item.description); 
                
                //ajax call api
                var settings = {
                    "url": "{{ env('API_URL') }}" + "get_currencies_by_id",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },

                    "data": JSON.stringify({
                        "system_currencies_id": system_currencies_id,
                    }),
                };

                $.ajax(settings).done(function (response) {
                    $.each(response.data, function (key, item) {
                        //base currency id
                        $("#system_currencies_id").val(item.system_currencies_id);
                        //base currency name
                        $("#system_currencies_name").val(item.name);
                        //base currency code
                        $("#system_currencies_code").val(item.code);
                        //base currency symbol
                        $("#system_currencies_symbol").val(item.symbol);

                        //send currency
                        $("#sc_base_currency").html('<p class="mb-0 fs-5 text-black">'+item.name+' ('+item.code+')</p>');
                        //create swap
                        $("#cs_base_currency").append('<p class="mb-0 fs-6 text-black">('+item.symbol+') '+item.name+'</p>');
                    });
                });
                //ajax call api
            });
            //ajax call api
            // -------------- BASE CURRENCY ------------- //

            // -------------- ALL TRANSACTIONS ------------- //
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "all_transactions",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                $.each(response.data, function (key, item) {

                    var action_image = '';
                    if (item.to_users_customers) {
                        action_image += '<img src="{{ url('/public/users/assets/images/icons/send.png') }}" alt="" srcset="">';
                    } else{
                        action_image += '<img src="{{ url('/public/users/assets/images/icons/arrow-down.png') }}" alt="" srcset="">';
                    }

                    var name = '';
                    if (item.to_users_customers) {
                        name += 'To';
                        name += ' ';
                        name += item.to_users_customers.first_name;
                        name += ' ';
                        name += item.to_users_customers.last_name;
                    } else{
                        name += 'From';
                        name += ' ';
                        name += item.from_users_customers.first_name;
                        name += ' ';
                        name += item.from_users_customers.last_name;
                    }
                    
                    var amount = '';
                    if (item.to_users_customers) { 
                        amount += '<span class="text-danger me-3">';
                        amount += '-';
                        amount += '(';
                        amount += item.from_system_currencies;
                        amount += item.from_amount;
                        amount += ')';
                        amount += '</span>';
                    } else{
                        amount += '<span class="text-primary me-3">';
                        amount += '(';
                        amount += item.to_system_currencies;
                        amount += item.to_amount;
                        amount += ')';
                        amount += '</span>';
                    }

                    //all transactions
                    $("#all_transactions").append('\
                        <div class="col-sm-6">\
                            <div class="card border-0 mb-3">\
                                <div class="card-body p-2 d-flex justify-content-between align-items-center">\
                                    <div class="d-flex align-items-center">\
                                        <div class="wallet-icon me-3 bg-green">'+ action_image +'</div>\
                                        <div>\
                                            <p class="mb-0 fw-bolder">'+ name +'</p>\
                                        </div>\
                                    </div>\
                                    <small class="text-center">\
                                        <span class="text-success me-3">\
                                            <span id="all_transaction_id_'+ item.users_customers_txns_id +'"></span>' + item.base_amount +'\
                                        </span>\
                                        <br/>'+ amount +'\
                                    </small>\
                                </div>\
                            </div>\
                        </div>\
                    ');

                    //transactions
                    $("#transactions").append('\
                        <div class="col-sm-6">\
                            <div class="card border-0 mb-3">\
                                <div class="card-body p-2 d-flex justify-content-between align-items-center">\
                                    <div class="d-flex align-items-center">\
                                        <div class="wallet-icon me-3 bg-green">'+ action_image +'</div>\
                                        <div>\
                                            <p class="mb-0 fw-bolder">'+ name +'</p>\
                                        </div>\
                                    </div>\
                                    <small class="text-center">\
                                        <span class="text-success me-3">\
                                            <span id="all_transaction_id_'+ item.users_customers_txns_id +'"></span>'+ item.base_amount +'\
                                        </span>\
                                        <br/>'+ amount +'\
                                    </small>\
                                </div>\
                            </div>\
                        </div>\
                    ');

                    get_system_currency_symbol().then(function (system_currency_symbol) {
                    //use the transaction value here
                    $("#all_transaction_id_" + item.users_customers_txns_id).text(system_currency_symbol);
                    }).catch(function(error) {
                    console.error(error);
                    });
                });
            });
            //ajax call api
            // -------------- ALL TRANSACTIONS ------------- //

            // -------------- ALL COUNTRIES IN SEND CURRENCY ------------- //
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "all_countries",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                $.each(response.data, function (key, item) { 
                    $("#sc_country").append('<option value="'+item.system_countries_id+'">'+item.name+'</option>');
                });
            });
            //ajax call api
            // -------------- ALL COUNTRIES IN SEND CURRENCY ------------- //

            // -------------- FORM SEND CURRENCY VALIDATION ------------- //
            $("#frm_send_currency").validate({
                rules: {
                    sc_from_currency: {
                        required: true
                    },
                    sc_total_amount: {
                        required: true,
                        number: true
                    },
                    sc_exchange_currency: {
                        required: true
                    },
                    sc_email: {
                        required: true
                    },
                    sc_country: {
                        required: true
                    },
                },
                messages: {
                    sc_from_currency: {
                        required: "This field is required."
                    },
                    sc_total_amount: {
                        required: "This field is required.",
                        number: "Please enter a valid amount."
                    },
                    sc_exchange_currency: {
                        required: "This field is required."
                    },
                    sc_email: {
                        required: "This field is required."
                    },
                    sc_country: {
                        required: "This field is required."
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "sc_from_currency") {
                        $("#error_sc_from_currency").html(error);
                    } else if (element.attr("name") == "sc_total_amount") {
                        $("#error_sc_total_amount").html(error);
                    } else if (element.attr("name") == "sc_exchange_currency") {
                        $("#error_sc_exchange_currency").html(error);
                    } else if (element.attr("name") == "sc_email") {
                        $("#error_sc_email").html(error);
                    } else if (element.attr("name") == "sc_country") {
                        $("#error_sc_country").html(error);
                    }
                }
            });
            // -------------- FORM SEND CURRENCY VALIDATION ------------- //

            // -------------- EXCHANGE RATE & AMOUNT ------------- //
            $("#sc_from_currency, #sc_total_amount, #sc_exchange_currency").on("change", function() {
                var sender_currency_id = $("#sc_from_currency").val();
                var from_amount = $("#sc_total_amount").val();
                var receiver_currency_id = $("#sc_exchange_currency").val();
                var receiver_currency_symbol = $("#sc_exchange_currency option:selected").attr("symbol"); 

                if (sender_currency_id !== null && from_amount !== null && receiver_currency_id !== null) {
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "currency_converter",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "sender_currency_id": sender_currency_id,
                            "from_amount": from_amount,
                            "receiver_currency_id": receiver_currency_id,
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        //send currency exchange rate
                        $("#sc_exchange_rate p").html("");
                        var rate = response.data.converted_rate.toFixed(2).split(".");
                        $("#sc_exchange_rate").append('<p class="mb-0 fs-4 text-black fw-bolder">'+receiver_currency_symbol+' '+rate[0]+'.<span class="fs-6 text-primary">'+rate[1]+'</span></p>');

                        //send currency exchange amount
                        $("#sc_exchange_amount p").html("");
                        var amount = response.data.converted_amount.toFixed(2).split(".");
                        $("#sc_exchange_amount").append('<p class="mb-0 fs-4 text-black fw-bolder">'+receiver_currency_symbol+' '+amount[0]+'.<span class="fs-6 text-primary">'+amount[1]+'</span></p>');
                        
                        //send currency 2 exchange amount
                        $("#sc2_exchange_amount").html("");
                        $("#sc2_exchange_amount").append('\
                            '+ receiver_currency_symbol +' '+ amount[0] +'.\
                            <span class="fs-6 text-primary">'+ amount[1] +'</span>\
                        ');
                    });
                    //ajax call api
                }  
            });
            // -------------- EXCHANGE RATE & AMOUNT ------------- //

            // -------------- ALL USERS SUGGESTED ------------- //
            $("#sc_email").on("keyup", function() {
                var email = $(this).val();

                if (email !== "") {
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "all_users_suggested",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "email": email,
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        $("#suggested_users").html("");
                        const data = response.data. slice(-5);
                        $.each(data, function (key, item) {
                            $("#suggested_users").fadeIn("fast").append('\
                                <ul id="myList"><li value="'+ item.users_customers_id +'">'+ item.email +'</li></ul>\
                            ');
                        }); 
                    });
                    //ajax call api
                } else{
                    $("#suggested_users").fadeOut();
                }
            });

            $(document).on("click", "#suggested_users li", function() {
                alert("Are you sure to select this email?");
                $("#sc_email").val($(this).text());
                $("#suggested_users_id").val($(this).val());
                $("#suggested_users").fadeOut(); 
            });
            // -------------- ALL USERS SUGGESTED ------------- //

            // -------------- FORM SEND CURRENCY SUBMISSION ------------- //
            $("#frm_send_currency").on("submit", function (event) {
                event.preventDefault();
                if ($("#frm_send_currency").valid()) { 

                    $("#sc2_from_amount").html("");
                    $("#sc2_receiver_name").html("");
                    $("#sc2_receiver_email").html("");
                    $("#sc2_receiver_image").attr("src", "");
                    $("#sc2_country_name").html("");
                    $("#sc2_current_date").html("");                  
                    
                    //ajax call api
                    var profile_settings = {
                        "url": "{{ env('API_URL') }}" + "users_customers_profile",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "users_customers_id": $("#suggested_users_id").val(),
                        }),
                    };

                    $.ajax(profile_settings).done(function (profile_response) {
                        //from amount 
                        var from_currency_symbol = $("#sc_from_currency option:selected").attr("symbol");
                        var from_amount = $("#sc_total_amount").val().split(".");
                        if (from_amount[1] == null) {
                            from_amount[1] = "00";
                        }
                        $("#sc2_from_amount").append('\
                            '+ from_currency_symbol +' '+ from_amount[0] +'.\
                            <span class="fs-6 text-primary">'+ from_amount[1] +'</span>\
                        ');

                        //name
                        $("#sc2_receiver_name").html(profile_response.data.first_name);

                        //email
                        $("#sc2_receiver_email").html(profile_response.data.email);

                        //image
                        var source = "{{ url('/public') }}" + "/" + profile_response.data.profile_pic;
                        $("#sc2_receiver_image").attr("src", source);

                        //country
                        $("#sc2_country_name").html($("#sc_country option:selected").text());

                        //date
                        $("#sc2_current_date").html(get_today_date());

                        //display modal
                        $("#modal_send_currency2").modal("show");
                    });
                    //ajax call api
                }
            });
            // -------------- FORM SEND CURRENCY SUBMISSION ------------- //

            // -------------- WALLET AMOUNT OF SELECTED ACCOUNT IN CREATE SWAP ------------- //
            //from account
            $("#cs_from_account").on("change", function() {
                var wallet_amount = $("option:selected", this).attr("amount");
                $("#cs_from_account_amount").html(wallet_amount);
            });

            //to account
            $("#cs_to_account").on("change", function() {
                var wallet_amount = $("option:selected", this).attr("amount");
                $("#cs_to_account_amount").html(wallet_amount);
            });
            // -------------- WALLET AMOUNT OF SELECTED ACCOUNT IN CREATE SWAP ------------- //

            // -------------- COMPARE Total AMOUNT WITH WALLET IN CREATE SWAP ------------- //
            $(document).on("change keyup", "#cs_from_account, #cs_total_amount", function() {
                if ($("#cs_from_account").val() !== null && $("#cs_total_amount").val() !== "") {
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "user_wallet_detail",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-type": "application/json"
                        },

                        "data": JSON.stringify({
                            "users_customers_id": users_customers_id,
                            "users_customers_wallets_id": $("#cs_from_account").val(),
                        }),
                    };

                    $.ajax(settings).done(function (response) { 
                        if (response.data.wallet_amount - $("#cs_total_amount").val() >= 0) {
                            return true;
                        } else{
                            alert("The amount you are trying to transfer exceeds your available balance.");
                            $("#cs_total_amount").val("");
                        }
                    });
                    //ajax call api
                }
            });
            // -------------- COMPARE Total AMOUNT WITH WALLET IN CREATE SWAP ------------- //

            // -------------- FORM CREATE SWAP VALIDATION ------------- //
            $("#frm_create_swap").validate({
                rules: {
                    cs_from_account: {
                        required: true
                    },
                    cs_total_amount: {
                        required: true,
                        number: true
                    },
                    cs_to_account: {
                        required: true
                    },
                },
                messages: {
                    cs_from_account: {
                        required: "This field is required."
                    },
                    cs_total_amount: {
                        required: "This field is required.",
                        number: "Please enter a valid amount."
                    },
                    cs_to_account: {
                        required: "This field is required."
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "cs_from_account") {
                        $("#error_cs_from_account").html(error);
                    } else if (element.attr("name") == "cs_total_amount") {
                        $("#error_cs_total_amount").html(error);
                    } else if (element.attr("name") == "cs_to_account") {
                        $("#error_cs_to_account").html(error);
                    }
                }
            });
            // -------------- FORM CREATE SWAP VALIDATION ------------- //

            // -------------- FORM CREATE SWAP SUBMISSION ------------- //
            $("#frm_create_swap").on("submit", function (event) {
                event.preventDefault();
                if ($("#frm_create_swap").valid()) {
                    var system_currencies_id = $("#system_currencies_id").val(); 
                    var from_users_customers_wallets_id = $("#cs_from_account").val();
                    var amount_from = $("#cs_total_amount").val();
                    var to_users_customers_wallets_id = $("#cs_to_account").val(); 

                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "wallet_swap",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "users_customers_id": users_customers_id,
                            "from_users_customers_wallets_id": from_users_customers_wallets_id,
                            "to_users_customers_wallets_id": to_users_customers_wallets_id,
                            "amount_from": amount_from,
                            "system_currencies_id": system_currencies_id,
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        if (response.status == "success") {
                            Command: toastr["success"]("Swap is created successfully.");
                            window.setTimeout(function() {location.reload()},1000);
                        } else{
                            Command: toastr["error"](response.message);
                        }
                    });
                    //ajax call api
                }
            });
            // -------------- FORM CREATE SWAP SUBMISSION ------------- //
            
            // -------------- OFFERS ------------- //
            //all offers
            all_offers();
            //all offers

            //favorite offers
            favorite_offers();
            //favorite offers

            //my offers
            my_offers();
            //my offers

            //offers requests
            offer_requests();
            //offers requests

            //form create offer validation
            $("#frm_create_offer").validate({
                rules: {
                    co_from_account: {
                        required: true
                    },
                    co_total_amount: {
                        required: true,
                        number: true
                    },
                    co_exchange_currency: {
                        required: true
                    },
                    co_exchange_rate: {
                        required: true,
                        number: true
                    },
                    co_expires_in: {
                        required: true
                    },
                },
                messages: {
                    co_from_account: {
                        required: "This field is required."
                    },
                    co_total_amount: {
                        required: "This field is required.",
                        number: "Please enter a valid amount."
                    },
                    co_exchange_currency: {
                        required: "This field is required."
                    },
                    co_exchange_rate: {
                        required: "This field is required.",
                        number: "Please enter a valid amount."
                    },
                    co_expires_in: {
                        required: "This field is required."
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "co_from_account") {
                        $("#error_co_from_account").html(error);
                    } else if (element.attr("name") == "co_total_amount") {
                        $("#error_co_total_amount").html(error);
                    } else if (element.attr("name") == "co_exchange_currency") {
                        $("#error_co_exchange_currency").html(error);
                    } else if (element.attr("name") == "co_exchange_rate") {
                        $("#error_co_exchange_rate").html(error);
                    } else if (element.attr("name") == "co_expires_in") {
                        $("#error_co_expires_in").html(error);
                    }
                }
            });
            //form create offer validation

            //form create offer submission
            $("#frm_create_offer").on("submit", function (event) {
                event.preventDefault();
                if ($("#frm_create_offer").valid()) {
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "swap_offer",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "users_customers_id": users_customers_id,
                            "system_currencies_id": $("#system_currencies_id").val(),
                            "from_system_currencies_id": $("#co_from_account").val(),
                            "to_system_currencies_id": $("#co_exchange_currency").val(),
                            "from_amount": $("#co_total_amount").val(),
                            "exchange_rate": $("#co_exchange_rate").val(),
                            "expiry_time": $("#co_expires_in").val(),
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        if (response.status == "success") {
                            Command: toastr["success"]("Offer is created successfully.");
                            window.setTimeout(function() {location.reload()},1000);
                        } else{
                            Command: toastr["error"](response.message);
                        }
                    });
                    //ajax call api
                }
            });
            //form create offer submission
            // -------------- OFFERS ------------- //

            // -------------- TRACK ------------- //
            //from currency code for buy section
            $(document).on("change", "#buy_from_currency", function() {
                $("#buy_from_currency_code").html($("option:selected", this).attr("code"));
            });
            
            //to currency code for buy section
            $(document).on("change", "#buy_to_currency", function() {
                $("#buy_to_currency_code").html($("option:selected", this).attr("code"));
            });
            
            //converted amount for buy section
            $("#buy_from_currency, #buy_to_currency, #buy_entered_amount").on("change keyup", function() {
                var from_currency = $("#buy_from_currency option:selected").val();
                var to_currency = $("#buy_to_currency option:selected").val();
                var entered_amount = $("#buy_entered_amount").val();

                if (entered_amount !== "") {
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "buy_currency_rate",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "from_system_currencies_id": from_currency,
                            "to_system_currencies_id": to_currency,
                            "from_amount":entered_amount,
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        //ajax call api
                        var base_settings = {
                            "url": "{{ env('API_URL') }}" + "currency_converter",
                            "method": "POST",
                            "timeout": 0,
                            "headers": {
                                "Content-Type": "application/json"
                            },

                            "data": JSON.stringify({
                                "sender_currency_id": from_currency,
                                "receiver_currency_id": $("#system_currencies_id").val(),
                                "from_amount": entered_amount,
                            }),
                        };

                        $.ajax(base_settings).done(function (base_response) {
                            //buy converted amount
                            var amount = response.data.converted_amount.toFixed(2).split(".");
                            $("#buy_converted_amount").html('\
                                '+ amount[0] +'.\
                                <span class="text-primary">'+ amount[1] +'</span>\
                            ');

                            //buy entered amount2
                            var entered_amount2 = '';
                                entered_amount2 += $("#buy_from_currency option:selected").attr("symbol");
                                entered_amount2 += entered_amount;
                            $("#buy_entered_amount2").html('\
                                <span class="plane-icon bg-danger me-1">\
                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">\
                                </span>\
                                <span>'+ entered_amount2 +'</span>\
                            ');

                            //buy converted amount2
                            var conveted_amount2 = '';
                                conveted_amount2 += $("#buy_to_currency option:selected").attr("symbol");
                                conveted_amount2 += response.data.converted_amount.toFixed(2);
                            $("#buy_converted_amount2").html('\
                                <span class="plane-icon bg-primary me-1">\
                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">\
                                </span>\
                                <span>'+ conveted_amount2 +'</span>\
                            ');

                            //buy base amount
                            var base_amount = '';
                                base_amount += $("#system_currencies_symbol").val();
                                base_amount += base_response.data.converted_amount.toFixed(2);
                            $("#buy_base_amount").html('\
                                <span class="plane-icon bg-black me-1">\
                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">\
                                </span>\
                                <span>'+ base_amount +'</span>\
                            ');
                        });
                        //ajax call api
                    });
                    //ajax call api
                }
            });

            //from currency code for sell section
            $(document).on("change", "#sell_from_currency", function() {
                $("#sell_from_currency_code").html($("option:selected", this).attr("code"));
            });

            //to currency code for sell section
            $(document).on("change", "#sell_to_currency", function() {
                $("#sell_to_currency_code").html($("option:selected", this).attr("code"));
            });

            //converted amount for sell section
            $("#sell_from_currency, #sell_to_currency, #sell_entered_amount").on("change keyup", function() {
                var from_currency = $("#sell_from_currency option:selected").val();
                var to_currency = $("#sell_to_currency option:selected").val();
                var entered_amount = $("#sell_entered_amount").val();

                if (entered_amount !== "") {
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "sell_currency_rate",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "from_system_currencies_id": from_currency,
                            "to_system_currencies_id": to_currency,
                            "from_amount":entered_amount,
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        //ajax call api
                        var base_settings = {
                            "url": "{{ env('API_URL') }}" + "currency_converter",
                            "method": "POST",
                            "timeout": 0,
                            "headers": {
                                "Content-Type": "application/json"
                            },

                            "data": JSON.stringify({
                                "sender_currency_id": from_currency,
                                "receiver_currency_id": $("#system_currencies_id").val(),
                                "from_amount": entered_amount,
                            }),
                        };

                        $.ajax(base_settings).done(function (base_response) {
                            //sell converted amount
                            var amount = response.data.converted_amount.toFixed(2).split(".");
                            $("#sell_converted_amount").html('\
                                '+ amount[0] +'.\
                                <span class="text-primary">'+ amount[1] +'</span>\
                            ');

                            //sell entered amount2
                            var entered_amount2 = '';
                                entered_amount2 += $("#sell_from_currency option:selected").attr("symbol");
                                entered_amount2 += entered_amount;
                            $("#sell_entered_amount2").html('\
                                <span class="plane-icon bg-danger me-1">\
                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">\
                                </span>\
                                <span>'+ entered_amount2 +'</span>\
                            ');

                            //sell converted amount2
                            var conveted_amount2 = '';
                                conveted_amount2 += $("#sell_to_currency option:selected").attr("symbol");
                                conveted_amount2 += response.data.converted_amount.toFixed(2);
                            $("#sell_converted_amount2").html('\
                                <span class="plane-icon bg-primary me-1">\
                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">\
                                </span>\
                                <span>'+ conveted_amount2 +'</span>\
                            ');
                            
                            //sell base amount
                            var base_amount = '';
                                base_amount += $("#system_currencies_symbol").val();
                                base_amount += base_response.data.converted_amount.toFixed(2);
                            $("#sell_base_amount").html('\
                                <span class="plane-icon bg-black me-1">\
                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">\
                                </span>\
                                <span>'+ base_amount +'</span>\
                            ');
                        });
                        //ajax call api

                    });
                    //ajax call api
                }
            });
            // -------------- TRACK ------------- //

            // -------------- CONNECT ------------- //
            //connect categories
            connect_categories();
            //connect categories

            //popular connect articles
            popular_connect_articles();
            //popular connect articles

            //other connect articles
            other_connect_articles();
            //other connect articles

            //connect article blog
            connect_article_blog();
            //connect article blog
            // -------------- CONNECT ------------- //

            // -------------- PROFILE ------------- //
            //form feeback validation
            $("#frm_feedback").validate({
                rules: {
                    fb_name: {
                        required: true,
                        minlength: 3
                    },
                    fb_email: {
                        required: true,
                        email: true
                    },
                    fb_subject: {
                        required: true
                    },
                },
                messages: {
                    fb_name: {
                        required: "This field is required.",
                        minlength: "Name should be at least 3 characters long."
                    },
                    fb_email: {
                        required: "This field is required.",
                        email: "Please enter a valid email address."
                    },
                    fb_subject: {
                        required: "This field is required."
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "fb_name") {
                        $("#error_fb_name").html(error);
                    } else if (element.attr("name") == "fb_email") {
                        $("#error_fb_email").html(error);
                    } else if (element.attr("name") == "fb_subject") {
                        $("#error_fb_subject").html(error);
                    }
                }
            });
            //form feeback validation

            //form feeback submission
            $("#frm_feedback").on("submit", function (event) {
                event.preventDefault();
                if($("#frm_feedback").valid()) {
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "user_feedback",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "users_customers_id": users_customers_id,
                            "name": $("#fb_name").val(),
                            "email": $("#fb_email").val(),
                            "subject": $("#fb_subject").val(),
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        if (response.status == "success") {
                            Command: toastr["success"]("Feedback is sent successfully.");
                            window.setTimeout(function() {location.reload()},1000);
                        } else{
                            Command: toastr["error"](response.message);
                        }
                    });
                    //ajax call api
                }
            });
            //form feeback submission

            //show/hide old password value
            $(document).on("click", "#icon_old_password", function() {
                var input = $("#old_password");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else{
                    input.attr("type", "password");
                }
            });
            //show/hide old password value
            
            //show/hide new password value
            $(document).on("click", "#icon_new_password", function() {
                var input = $("#new_password");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else{
                    input.attr("type", "password");
                }
            });
            //show/hide new password value
            
            //show/hide confirm new password value
            $(document).on("click", "#icon_confirm_password", function() {
                var input = $("#confirm_password");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else{
                    input.attr("type", "password");
                }
            });
            //show/hide confirm new password value

            //form change password validation
            $("#frm_change_password").validate({
                rules: {
                    old_password: {
                        required: true
                    },
                    new_password: {
                        required: true,
                        minlength: 7
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#new_password"
                    },
                },
                messages: {
                    old_password: {
                        required: "This field is required."
                    },
                    new_password: {
                        required: "This field is required.",
                        minlength: "Password should be at least 7 characters long."
                    },
                    confirm_password: {
                        required: "This field is required.",
                        equalTo: "Please enter the same value as password." 
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "old_password") {
                        $("#error_old_password").html(error);
                    } else if (element.attr("name") == "new_password") {
                        $("#error_new_password").html(error);
                    } else if (element.attr("name") == "confirm_password") {
                        $("#error_confirm_password").html(error);
                    }
                }
            });
            //form change password validation

            //form change password submission
            $("#frm_change_password").on("submit", function (event) {
                event.preventDefault();
                if($("#frm_change_password").valid()) {
                    var email = "<?php echo session()->get('email'); ?>";
                    var old_password = $("#old_password").val();
                    var new_password = $("#new_password").val();
                    var confirm_password = $("#confirm_password").val();
                    
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "change_password",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "email": email,
                            "old_password": old_password,
                            "password": new_password,
                            "confirm_password": confirm_password,
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        if (response.status == "success") {
                            Command: toastr["success"]("Password is changed successfully.");
                            //clear form fields
                            $("#old_password").val("");
                            $("#new_password").val("");
                            $("#confirm_password").val("");
                        } else{
                            Command: toastr["error"](response.message);
                        }
                    });
                    //ajax call api
                }
            });
            //form change password submission

            //form add account validation
            $("#frm_add_account").validate({
                rules: {
                    account_currency: {
                        required: true
                    },
                    account_holder_name: {
                        required: true,
                        minlength: 3
                    },
                    account_iban: {
                        required: true
                    },
                },
                messages: {
                    account_currency: {
                        required: "This field is required."
                    },
                    account_holder_name: {
                        required: "This field is required.",
                        minlength: "Name should be at least 3 characters long."
                    },
                    account_iban: {
                        required: "This field is required." 
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "account_currency") {
                        $("#error_account_currency").html(error);
                    } else  if (element.attr("name") == "account_holder_name") {
                        $("#error_account_holder_name").html(error);
                    } else  if (element.attr("name") == "account_iban") {
                        $("#error_account_iban").html(error);
                    }
                }
            });
            //form add account validation

            //form add account submission
            $("#frm_add_account").on("submit", function (event) {
                event.preventDefault();
                if ($("#frm_add_account").valid()) {
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "add_acount",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "users_customers_id": users_customers_id,
                            "system_currencies_id": $("#account_currency").val(),
                            "full_name": $("#account_holder_name").val(),
                            "iban": $("#account_iban").val(),
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        if (response.status == "success") {
                            Command: toastr["success"]("Account is added successfully.");
                            window.setTimeout(function() {location.reload()},1000);
                        } else{
                            Command: toastr["error"](response.message);
                        }
                    });
                    //ajax call api
                }
            });
            //form add account submission
            
            //all accounts
            all_accounts();
            //all accounts

            //all faqs
            all_faqs();
            //all faqs

            //form delete account validation
            $("#frm_delete_account").validate({
                rules: {
                    delete_reason: {
                        required: true
                    },
                    comments: {
                        required: true
                    },
                },
                messages: {
                    delete_reason: {
                        required: "This field is required."
                    },
                    comments: {
                        required: "This field is required."
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "delete_reason") {
                        $("#error_delete_reason").html(error);
                    } else if (element.attr("name") == "comments") {
                        $("#error_comments").html(error);
                    }
                }
            });
            //form delete account validation

            //form delete account submission
            $("#frm_delete_account").on("submit", function (event) {
                event.preventDefault();
                if($("#frm_delete_account").valid()) {
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "delete_account",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "user_email": "<?php echo session()->get('email'); ?>",
                            "delete_reason": $("#delete_reason").val(),
                            "comments": $("#comments").val(),
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        Command: toastr["success"](response.message);
                        window.setTimeout(function() {location.reload()},1000);
                    });
                    //ajax call api
                }
            });
            //form delete account submission

            //update profile image
            function imageConversion (image) {
                var fileImage = image.files[0];
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    img_base64 = reader.result.toString().replace(/^data:(.*,)?/, "");

                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "users_customers_profile",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "users_customers_id": users_customers_id,
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        if (response.data.users_customers_type == "Individual") {
                            var settings = {
                                "url": "{{ env('API_URL') }}" + "update_profile",
                                "method": "POST",
                                "timeout": 0,
                                "headers": {
                                    "Content-Type": "application/json"
                                },

                                "data": JSON.stringify({
                                    "users_customers_id": users_customers_id,
                                    "first_name": response.data.first_name,
                                    "last_name": response.data.last_name,
                                    "phone": response.data.phone,
                                    "email": response.data.email,
                                    "location": response.data.location,
                                    "notifications": response.data.notifications,
                                    "valid_document": response.data.valid_document,
                                    "profile_pic": img_base64,
                                }),
                            };

                            $.ajax(settings).done(function (response) {
                                if (response.status == "success") {
                                    Command: toastr["success"]("Profile Image is updated successfully.");
                                    window.setTimeout(function() {location.reload()},1000);
                                } else{
                                    Command: toastr["error"](response.message);
                                }
                            });
                        } else{
                            var settings = {
                                "url": "{{ env('API_URL') }}" + "update_profile",
                                "method": "POST",
                                "timeout": 0,
                                "headers": {
                                    "Content-Type": "application/json"
                                },

                                "data": JSON.stringify({
                                    "users_customers_id": users_customers_id,
                                    "company_name": response.data.company_name,
                                    "first_name": response.data.first_name,
                                    "last_name": response.data.last_name,
                                    "phone": response.data.phone,
                                    "email": response.data.email,
                                    "location": response.data.location,
                                    "notifications": response.data.notifications,
                                    "valid_document": response.data.valid_document,
                                    "profile_pic": img_base64,
                                }),
                            };
                            $.ajax(settings).done(function (response) {
                                if (response.status == "success") {
                                    Command: toastr["success"]("Profile Image is updated successfully.");
                                    window.setTimeout(function() {location.reload()},1000);
                                } else{
                                    Command: toastr["error"](response.message);
                                }
                            });
                        }
                    });
                    //ajax call api
                }, false);

                if (fileImage) {
                    reader.readAsDataURL(fileImage);
                }
            }

            document.querySelector("#profile_pic").addEventListener("change", function() {
                imageConversion(this);
            });
            //update profile image
            // -------------- PROFILE ------------- //
        });

        // -------------- NOTIFICATIONS ------------- //
        function notifications() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "notifications",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.data == "") {
                    $("#notifications").append('\
                        <div class="row px-3 py-3">\
                            <div class="col-lg col-xl">\
                                <div class="media d-flex">\
                                    <div class="media-body ms-2 text-truncate">\
                                        <h6 class="my-0 fw-normal text-dark">No notification found.</h6>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                } else{
                    $.each(response.data, function (key, item) {
                        var sender_image = "{{ url('public') }}" + "/" + item.notification_sender.profile_pic;
                        $("#notifications").append('\
                            <div class="row px-3 py-3">\
                                <div class="col-lg col-xl">\
                                    <div class="media d-flex">\
                                        <div class="avatar avatar-xl">\
                                            <img src="'+sender_image+'" class="img-fluid rounded-circle" alt="image"/>\
                                        </div>\
                                        <div class="media-body ms-2 text-truncate">\
                                            <h6 class="my-0 fw-normal text-dark">\
                                                '+item.notification_sender.first_name+' '+item.notification_sender.last_name+'\
                                            </h6>\
                                            <small class="text-muted mb-0">'+item.message+'</small>\
                                        </div>\
                                        <div class="avatar avatar-xl">\
                                            <small class="float-end text-muted ps-2">'+item.time_ago+'</small>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        ');
                    });
                }
            });
            //ajax call api
        }
        // -------------- NOTIFICATIONS ------------- //

        // -------------- UNREADED NOTIFICATIONS ------------- //
        function unreaded_notifications() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "notifications_unread",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                $("#unreaded_notifications").html('');
                if (response.data.length > 0) {
                    $("#unreaded_notifications").html(response.data.length);
                    $("#unread_notification").removeClass("visually-hidden");
                }
            });
            //ajax call api
        }
        // -------------- UNREADED NOTIFICATIONS ------------- //

        // -------------- UNREADED MESSAGES ------------- //
        function unreaded_messages() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "unreaded_messages",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                $("#unreaded_messages").html('');
                if (response.data > 0) {
                    $("#unreaded_messages").html(response.data);
                    $("#unread_message").removeClass("visually-hidden");
                }
            });
            //ajax call api
        }
        // -------------- UNREADED MESSAGES ------------- //
        
        // -------------- GET SYSTEM CURRENCY SYMBOL ------------- //
        function get_system_currency_symbol() {
            return new Promise(function (resolve, reject) {
                //ajax call api
                var settings = {
                    "url": "{{ env('API_URL') }}" + "system_settings/",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    var result = Object.values(response.data).filter(obj => obj.type === "system_currencies_id");
                    var system_currencies_id = result.map((item) => item.description); 
                    
                    //ajax call api
                    var settings = {
                        "url": "{{ env('API_URL') }}" + "get_currencies_by_id",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "system_currencies_id": system_currencies_id,
                        }),
                    };

                    $.ajax(settings).done(function (response) {
                        $.each(response.data, function(key, item) {
                            resolve(item.symbol);
                        });
                    }).fail(function() {
                        reject(new Error("API call failed"));
                    });
                    //ajax call api
                });
                //ajax call api
            });
        }
        // -------------- GET SYSTEM CURRENCY SYMBOL ------------- //

        // -------------- GET TODAY DATE ------------- //
        function get_today_date() {
           var date = new Date();
           var dd = date.getDate(); 
           var mm = date.getMonth() + 1; 
           var yyyy = date.getFullYear();

           var current_date = dd + "-" + get_month_name(mm) + "-" + yyyy;
           return current_date;
        }
        // -------------- GET TODAY DATE ------------- //
        
        // -------------- GET MONTH NAME ------------- //
        function get_month_name(month_number) {
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];
            return months[month_number - 1];
        }
        // -------------- GET MONTH NAME ------------- //
        
        // -------------- SEND CURRENCY ------------- //
        function send_currency() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "transfer_currency",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "system_currencies_id": $("#system_currencies_id").val(),
                    "from_users_customers_id": users_customers_id,
                    "to_users_customers_id": $("#suggested_users_id").val(),
                    "from_system_currencies_id": $("#sc_from_currency").val(),
                    "to_system_currencies_id": $("#sc_exchange_currency").val(),
                    "payment_method_id": "1",
                    "from_amount": $("#sc_total_amount").val(),
                    "system_countries_id": $("#sc_country").val(),
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    Command: toastr["success"]("Currency is transferred successfully.");
                    window.setTimeout(function() {location.reload()},1000);
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call api
        }
        // -------------- SEND CURRENCY ------------- //

        // -------------- ALL OFFERS ------------- //
        function all_offers() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "all_swap_offers",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                $("#all_offers").html('');
                $.each(response.data, function (key, item) {
                    var liked_offer = '';
                    if (item.liked == "Yes") {
                        liked_offer = '<img src="{{ url('/public/users/assets/images/icons/heart-fav.png') }}" class="ms-3 img-fluid" alt="">';
                    } else{
                        liked_offer = '<img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class="ms-3 img-fluid" alt="" onclick="add_to_favorite_offers('+ item.swap_offers_id +')" id="add_favorite_offer_'+item.swap_offers_id+'">';
                    }

                    var from_currency_country_flag = "{{ url('/public') }}" + item.from_currency.country.image;
                    var to_currency_country_flag = "{{ url('/public') }}" + item.to_currency.country.image;
                    
                    $("#all_offers").append('\
                        <div class="col-md-6 col-xl-4">\
                            <div class="card border-0 mb-3">\
                                <div class="card-body">\
                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 flex-wrap gap-1">\
                                        <div class="d-flex align-items-center">\
                                            <p class="mb-0">'+ item.from_currency.symbol +'1</p>\
                                            <span class="plane-icon bg-primary mx-2">\
                                                <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">\
                                            </span>\
                                            <p class="mb-0">'+ item.to_currency.symbol + item.exchange_rate +'</p>\
                                        </div>\
                                        <div class="d-flex align-items-center">\
                                            <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">\
                                            <small class="ms-1 mb-0 text-primary">'+ item.time_ago +'</small>'+ liked_offer +'\
                                        </div>\
                                    </div>\
                                    <div onclick="display_send_offer_modal('+ item.swap_offers_id +')">\
                                        <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">\
                                            <div class="mb-0">\
                                                <small class="text-primary mb-2">You Pay</small>\
                                                <p class="my-1"><span class="text-success">'+ item.from_currency.symbol +'</span>'+ item.from_amount +'</p>\
                                            </div>\
                                            <div class="mb-0 d-flex align-items-center">\
                                                <img src="'+ from_currency_country_flag +'" class="img-fluid" alt="">\
                                                <small class="mx-2">'+ item.from_currency.country.code + '/' + item.to_currency.country.code +'</small>\
                                                <img src="'+ to_currency_country_flag +'" class="img-fluid" alt="">\
                                            </div>\
                                            <div class="mb-0 text-end">\
                                                <small class="text-primary mb-2">You Pay</small>\
                                                <p class="my-1"><span class="text-success">'+ item.to_currency.symbol +'</span>'+ item.to_amount +'</p>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                });
            });
            //ajax call api
        }
        // -------------- ALL OFFERS ------------- //

        // -------------- FAVORITE OFFERS ------------- //
        function favorite_offers() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "all_favorite_swaps_offers",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                $("#favorite_offers").html('');
                $.each(response.data, function (key, item) {
                    var from_currency_country_flag = "{{ url('/public') }}" + item.from_currency.country.image;
                    var to_currency_country_flag = "{{ url('/public') }}" + item.to_currency.country.image;

                    $("#favorite_offers").append('\
                        <div class="col-md-6 col-xl-4">\
                            <div class="card border-0 mb-3">\
                                <div class="card-body">\
                                    <div class="d-flex align-items-center justify-content-between border-bottom border-danger pb-3 mb-3 gap-1 flex-wrap">\
                                        <div class="d-flex align-items-center">\
                                            <p class="mb-0">'+ item.from_currency.symbol +'1</p>\
                                            <span class="plane-icon bg-primary mx-2">\
                                                <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">\
                                            </span>\
                                            <p class="mb-0">'+ item.to_currency.symbol + item.exchange_rate +'</p>\
                                        </div>\
                                        <div class="d-flex align-items-center">\
                                            <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">\
                                            <small class="ms-1 mb-0 text-primary">'+ item.time_ago +'</small>\
                                            <img src="{{ url('/public/users/assets/images/icons/heart-fav.png') }}" class="ms-3 img-fluid" alt="" onclick="remove_from_favorite_offers('+ item.swap_offers_id +')" id="remove_favorite_offer_'+item.swap_offers_id+'">\
                                        </div>\
                                    </div>\
                                    <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">\
                                        <div class="mb-0">\
                                            <small class="text-primary mb-2">You Pay</small>\
                                            <p class="my-1"><span class="text-success">'+ item.from_currency.symbol +'</span>'+ item.from_amount +'</p>\
                                        </div>\
                                        <div class="mb-0 d-flex align-items-center">\
                                            <img src="'+ from_currency_country_flag +'" class="img-fluid" alt="">\
                                            <small class="mx-2">'+ item.from_currency.country.code + '/' + item.to_currency.country.code +'</small>\
                                            <img src="'+ to_currency_country_flag +'" class="img-fluid" alt="">\
                                        </div>\
                                        <div class="mb-0 text-end">\
                                            <small class="text-primary mb-2">You Pay</small>\
                                            <p class="my-1"><span class="text-success">'+ item.to_currency.symbol +'</span>'+ item.to_amount +'</p>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                });
            });
            //ajax call api
        }
        // -------------- FAVORITE OFFERS ------------- //

        // -------------- MY OFFERS ------------- //
        function my_offers() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "user_swap_offers",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data":JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };
            
            $.ajax(settings).done(function (response) {
                $("#my_offers").html('');
                $.each(response.data, function (key, item) {
                    var from_currency_country_flag = "{{ url('/public') }}" + item.from_currency.country.image;
                    var to_currency_country_flag = "{{ url('/public') }}" + item.to_currency.country.image;

                    $("#my_offers").append('\
                        <div class="col-md-6 col-xl-4">\
                            <div class="card border-0 mb-3" onclick="view_offer_requests('+ item.swap_offers_id +')">\
                                <div class="card-body">\
                                    <div class="d-flex align-items-center justify-content-between border-bottom border-danger pb-3 mb-3 gap-1 flex-wrap">\
                                        <div class="d-flex align-items-center">\
                                            <p class="mb-0">'+ item.from_currency.symbol +'1</p>\
                                            <span class="plane-icon bg-primary mx-2">\
                                                <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">\
                                            </span>\
                                            <p class="mb-0">'+ item.to_currency.symbol + item.exchange_rate +'</p>\
                                        </div>\
                                        <div class="d-flex align-items-center">\
                                            <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">\
                                            <small class="ms-1 mb-0 text-primary">'+ item.time_ago +'</small>\
                                            <img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class="ms-3 img-fluid" alt="">\
                                        </div>\
                                    </div>\
                                    <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">\
                                        <div class="mb-0">\
                                            <small class="text-primary mb-2">You Pay</small>\
                                            <p class="my-1"><span class="text-success">'+ item.from_currency.symbol +'</span>'+ item.from_amount +'</p>\
                                        </div>\
                                        <div class="mb-0 d-flex align-items-center">\
                                            <img src="'+ from_currency_country_flag +'" class="img-fluid" alt="">\
                                            <small class="mx-2">'+ item.from_currency.country.code + '/' + item.to_currency.country.code +'</small>\
                                            <img src="'+ to_currency_country_flag +'" class="img-fluid" alt="">\
                                        </div>\
                                        <div class="mb-0 text-end">\
                                            <small class="text-primary mb-2">You Pay</small>\
                                            <p class="my-1"><span class="text-success">'+ item.to_currency.symbol +'</span>'+ item.to_amount +'</p>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                });
            });
            //ajax call api
        }
        // -------------- MY OFFERS ------------- //

        //-------------- DISPLAY SEND OFFER MODAL ------------- //
        function display_send_offer_modal(id) { 
            //putting value in send offer modal
            $("#so_swap_offers_id").val(id);

            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "all_swap_offers",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                var data = Object.values(response.data).filter(obj => obj.swap_offers_id === id); 

                $.each(data, function (key, item) {
                    //from currency
                    $("#so_from_currency").html('');
                    $("#so_from_currency").html(item.from_currency.symbol + 1);

                    //exchange rate
                    $("#so_exchange_rate").html('');
                    $("#so_exchange_rate").html(item.to_currency.symbol + item.exchange_rate);

                    //amount
                    $("#so_amount").html('');
                    $("#so_amount").html(item.from_currency.symbol + item.from_amount);

                    //converted amount
                    $("#so_converted_amount").html('');
                    $("#so_converted_amount").html(item.to_currency.symbol + item.to_amount);

                    //ajax call api
                    var base_settings = {
                        "url": "{{ env('API_URL') }}" + "currency_converter",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "sender_currency_id": item.from_system_currencies_id,
                            "receiver_currency_id": $("#system_currencies_id").val(),
                            "from_amount": item.from_amount,
                        }),
                    };

                    $.ajax(base_settings).done(function (base_response) {
                        var base_amount = base_response.data.converted_amount.toFixed(2).split(".");
                        var amount = '';
                            amount += $("#system_currencies_symbol").val();
                            amount += base_amount[0];
                            amount += '.';
                            amount += base_amount[1];

                        //base amount
                        $("#so_base_amount").html('');
                        $("#so_base_amount").html(amount);

                        //display modal
                        $("#modal_send_offer").modal("show");
                    });
                    //ajax call api
                });
            });
            //ajax call api  
        }
        // -------------- DISPLAY SEND OFFER MODAL ------------- //

        // -------------- SEND OFFER ------------- //
        function send_offer() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "swap_offer_request",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "swap_offers_id": $("#so_swap_offers_id").val(),
                    "from_users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    Command: toastr["success"]("Offer is sent successfully.");
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call api
        }
        // -------------- SEND OFFER ------------- //

        // -------------- ADD TO FAVORITE SWAP OFFERS ------------- //
        function add_to_favorite_offers(id) {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "add_favorite_swaps_offers",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                    "swap_offers_id": id,
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    //update image
                    var source = "{{ url('/public/users/assets/images/icons/heart-fav.png') }}";
                    $("#add_favorite_offer_" + id).attr("src", source);

                    //update data
                    favorite_offers();
                    all_offers();
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call api
        }
        // -------------- ADD TO FAVORITE SWAP OFFERS ------------- //

        // -------------- REMOVE FROM FAVORITE SWAP OFFERS ------------- //
        function remove_from_favorite_offers(id) {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "remove_favorite_swaps_offers",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                    "swap_offers_id": id,
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    //update data
                    favorite_offers();
                    all_offers();
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call api
        }
        // -------------- REMOVE FROM FAVORITE SWAP OFFERS ------------- //

        // -------------- VIEW OFFER REQUESTS ------------- //
        function view_offer_requests(id) {
            window.location.href = "/users/offer_requests/" + id;
        }
        // -------------- VIEW OFFER REQUESTS ------------- //

        // -------------- OFFER REQUESTS ------------- //
        function offer_requests() {
            if ($("#swap_offers_id").val() !== "") {
                //ajax call api
                var settings = {
                    "url": "{{ env('API_URL') }}" + "user_swap_offers_requests",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },

                    "data": JSON.stringify({
                        "swap_offers_id": $("#swap_offers_id").val(),
                    }),
                };

                $.ajax(settings).done(function (response) {
                    $("#offer_requests").html('');
                    $.each(response.data, function (key, item) {
                        var last_name = '';
                        if (item.user_data.last_name !== null) {
                            last_name += item.user_data.last_name;
                        }
                        var sender_image = "{{ url('/public') }}" + "/" + item.user_data.profile_pic;

                        $("#offer_requests").append('\
                            <div class="col-sm-6">\
                                <div class="card border-0 mb-3">\
                                    <div class="card-body p-2 d-flex justify-content-between align-items-center">\
                                        <div class="d-flex align-items-center">\
                                            <div class="wallet-icon me-3">\
                                                <img src="'+ sender_image +'" class="img-fluid" alt="" srcset="" id="user_image">\
                                            </div>\
                                            <div>\
                                                <p class="mb-0 fw-bolder">'+ item.user_data.first_name +' '+ last_name +'</p>\
                                            </div>\
                                        </div>\
                                        <a href="#" class="nav-link d-flex justify-content-right align-items-right" role="button" id="navbarDropdown2" data-bs-toggle="dropdown" aria-expanded="false">\
                                            <img src="{{ url('/public/users/assets/images/icons/messages-2.png') }}" class="img-fluid" alt="" srcset="" onclick="start_chat('+ item.from_users_customers_id +')">\
                                        </a>\
                                        <small class="text-center">\
                                            <button class="btn btn-primary me-3" onclick="display_accept_offer_modal('+ item.swap_offers_requests_id +', '+ item.swap_offers_id +', '+ item.user_data.users_customers_id +')">Accept</button><br/>\
                                            <button class="me-3" id="btn_remove" onclick="remove_offer_request('+ item.swap_offers_requests_id +')">Remove</button>\
                                        </small>\
                                    </div>\
                                </div>\
                            </div>\
                        ');
                    });
                });
                //ajax call api
            }
        }
        // -------------- OFFER REQUESTS ------------- //

        // -------------- DISPLAY ACCEPT OFFER MODAL ------------- //
        function display_accept_offer_modal(swap_offers_requests_id, swap_offers_id, request_sender_id) {
            //putting values in accept offer modal
            $("#request_sender_id").val(request_sender_id);
            $("#swap_offers_request_id").val(swap_offers_requests_id);
            
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "user_swap_offers",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                var data = Object.values(response.data).filter(obj => obj.swap_offers_id === swap_offers_id);  

                $.each(data, function (key, item) {
                    //from currency
                    $("#accept_offer_from_currency").html('');
                    $("#accept_offer_from_currency").html(item.from_currency.symbol + "1");

                    //exchange rate
                    $("#accept_offer_exchange_rate").html('');
                    $("#accept_offer_exchange_rate").html(item.to_currency.symbol + item.exchange_rate);

                    //amount
                    $("#accept_offer_amount").html('');
                    $("#accept_offer_amount").html(item.from_currency.symbol + item.from_amount);

                    //converted amount
                    $("#accept_offer_converted_amount").html('');
                    $("#accept_offer_converted_amount").html(item.to_currency.symbol + item.to_amount);

                    //ajax call api
                    var base_settings = {
                        "url": "{{ env('API_URL') }}" + "currency_converter",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },

                        "data": JSON.stringify({
                            "sender_currency_id": item.from_system_currencies_id,
                            "receiver_currency_id": $("#system_currencies_id").val(),
                            "from_amount": item.from_amount,
                        }),
                    };

                    $.ajax(base_settings).done(function (base_response) {
                        var base_amount = base_response.data.converted_amount.toFixed(2).split(".");
                        var amount = '';
                            amount += $("#system_currencies_symbol").val();
                            amount += base_amount[0];
                            amount += '.';
                            amount += base_amount[1];

                        //base amount
                        $("#accept_offer_base_amount").html('');
                        $("#accept_offer_base_amount").html(amount);

                        //display modal
                        $("#modal_accept_offer").modal("show");
                    });
                    //ajax call api
                });
            });
            //ajax call api
        }
        // -------------- DISPLAY ACCEPT OFFER MODAL ------------- //
        
        // -------------- ACCEPT OFFER REQUEST ------------- //
        function accept_offer_request() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" +"swap_offer_request_approve",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    swap_offers_requests_id: $("#swap_offers_request_id").val(),
                    swap_offers_id: $("#swap_offers_id").val(),
                    from_users_customers_id: $("#request_sender_id").val(),
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    Command: toastr["success"]("Offer request is accepted.");
                    //update data
                    //offer_requests();
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call pi
        }
        // -------------- ACCEPT OFFER REQUEST ------------- //

        // -------------- REMOVE OFFER REQUEST ------------- //
        function remove_offer_request(id) {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" +"swap_offer_request_reject",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "swap_offers_requests_id": id,
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    //update data
                    offer_requests();
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call pi
        }
        // -------------- REMOVE OFFER REQUEST ------------- //

        // -------------- START CHAT ------------- //
        function start_chat(id) {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "user_chat",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "requestType": "startChat",
                    "users_customers_id": users_customers_id,
                    "other_users_customers_id": id,  
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    window.location.href = "/users/message/" + id;
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call api
        }
        // -------------- START CHAT ------------- //
        
        // -------------- GET SELECTED USER MESSAGES ------------- //
        function get_selected_user_messages() {
            if ($("#selected_other_user_id").val() !== "") {
                var id = $("#selected_other_user_id").val();
                get_messages(id);
            }
        }
        // -------------- GET SELECTED USER MESSAGES ------------- //
        
        // -------------- CONNECT CATEGORIES ------------- //
        function connect_categories() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "connect_categories",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },
            };

            $.ajax(settings).done(function (response) {
                $.each(response.data, function (key, item) {
                    var category_image = "{{ url('/public') }}" + "/" + item.icon; 

                    $("#connect_categories").append('\
                        <div class="connects-category">\
                            <div class="connects-item"><img src="'+ category_image +'" class="img-fluid" alt=""></div>\
                            <div class="connects-item-name text-center mt-1"><small>'+ item.name +'</small></div>\
                        </div>\
                    ');
                });
            });
            //ajax call api
        }
        // -------------- CONNECT CATEGORIES ------------- //

        // -------------- POPULAR CONNECT ARTICLES ------------- //
        function popular_connect_articles() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "popular_connect_articles",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                $("#popular_articles").html('');
                $.each(response.data, function (key, item) {
                    var liked_article = '';
                    if (item.liked == "Yes") {
                        liked_article = '<img src="{{ url('/public/users/assets/images/icons/heart1-fav.png') }}" alt="" onclick="remove_popular_favorite_article('+ item.connect_articles_id +')" id="remove_popular_favorite_article_'+ item.connect_articles_id +'">';
                    } else{
                        liked_article = '<img src="{{ url('/public/users/assets/images/icons/heart1.png') }}" alt="" onclick="add_popular_favorite_article('+ item.connect_articles_id +')" id="add_popular_favorite_article_'+ item.connect_articles_id +'">';
                    }
                    var article_image = "{{ url('/public') }}" + "/" + item.image;
                    var article_blog_link = "https://portal.swapcircle.trade/" + "users/connect/blog/";

                    $("#popular_articles").append('\
                        <li class="splide__slide">\
                            <div class="card text-start border-0 rounded-4 overflow-hidden">\
                                <div class="card-body p-2" onclick="view_connect_article_blog('+ item.connect_articles_id +')">\
                                    <img class="card-img-top img-fluid" src="'+ article_image  +'" alt="Title">\
                                    <h4 class="card-title mt-1">'+ item.title +'</h4>\
                                    <p class="card-text w-30">'+ item.description +'</p>\
                                </div>\
                                <div class="card-footer border-top bg-white text-center py-2 d-flex justify-content-center gap-2">\
                                    '+ liked_article +'\
                                    <div class="card-icon" id="popular_article_link" data-clipboard-text="'+ article_blog_link + item. connect_articles_id +'">\
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">\
                                            <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>\
                                            <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>\
                                            <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>\
                                            <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>\
                                        </svg>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>\
                    ');
                });
            });
            //ajax call api
        }
        // -------------- POPULAR CONNECT ARTICLES ------------- //

        // -------------- OTHERS CONNECT ARTICLES ------------- //
        function other_connect_articles() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "connect_articles",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                $("#other_articles").html('');
                $.each(response.data, function (key, item) {
                var liked_article = '';
                    if (item.liked == "Yes") {
                        liked_article = '<img src="{{ url('/public/users/assets/images/icons/heart1-fav.png') }}" alt="" onclick="remove_other_favorite_article('+ item.connect_articles_id +')" id="remove_other_favorite_article_'+ item.connect_articles_id +'">';
                    } else{
                        liked_article = '<img src="{{ url('/public/users/assets/images/icons/heart1.png') }}" alt="" onclick="add_other_to_favorite_articles('+ item.connect_articles_id +')" id="add_other_favorite_article_'+ item.connect_articles_id +'">';
                    }
                    var article_image = "{{ url('/public') }}" + "/" + item.image;
                    var article_blog_link = "https://portal.swapcircle.trade/" + "users/connect/blog/";

                    $("#other_articles").append('\
                        <li class="splide__slide">\
                            <div class="card text-start border-0 rounded-4 overflow-hidden p-2">\
                                <div class="card-image position-relative">\
                                    <img class="card-img-top img-fluid" src="'+ article_image +'" alt="Title">\
                                    <div class="position-absolute top-0 end-0 text-end p-2">\
                                        <div class="d-flex justify-content-end gap-2 mb-2">\
                                            '+ liked_article +'\
                                            <span class="card-icon" id="other_article_link" data-clipboard-text="'+ article_blog_link + item. connect_articles_id +'">\
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">\
                                                    <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>\
                                                    <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>\
                                                    <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>\
                                                    <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>\
                                                </svg>\
                                            </span>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="card-body px-0 py-2" onclick="view_connect_article_blog('+ item.connect_articles_id +')">\
                                    <h4 class="card-title fw-bold">'+ item.title +'</h4>\
                                    <p class="card-text">'+ item.description +'</p>\
                                </div>\
                            </div>\
                        </li>\
                    ');
                });
            });
            //ajax call api
        }    
        // -------------- OTHERS CONNECT ARTICLES ------------- //

        // -------------- ADD POPULAR TO FAVORITE ARTICLES ------------- //
        function add_popular_favorite_article(id) {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "add_favorite_connect_articles",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                    "connect_articles_id": id,
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    //update image
                    var source = '{{ url('/public/users/assets/images/icons/heart1-fav.png') }}';
                    $("#add_popular_favorite_article_" + id).attr("src", source);

                    //update data
                    popular_connect_articles();
                    other_connect_articles();
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call api
        }
        // -------------- ADD POPULAR TO FAVORITE ARTICLES ------------- //

        // -------------- REMOVE POPULAR FROM FAVORITE ARTICLES ------------- //
        function remove_popular_favorite_article(id) {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "remove_favorite_connect_articles",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                    "connect_articles_id": id,
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    //update image
                    var source = '{{ url('/public/users/assets/images/icons/heart1.png') }}';
                    $("#remove_popular_favorite_article_" + id).attr("src", source);

                    //update data
                    popular_connect_articles();
                    other_connect_articles();
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call api
        }
        // -------------- REMOVE POPULAR FROM FAVORITE ARTICLES ------------- //

        // -------------- ADD OTHER TO FAVORITE ARTICLES ------------- //
        function add_other_to_favorite_articles(id) {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "add_favorite_connect_articles",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                    "connect_articles_id": id,
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    //update image
                    var source = '{{ url('/public/users/assets/images/icons/heart1-fav.png') }}';
                    $("#add_other_favorite_article_" + id).attr("src", source);

                    //update data
                    popular_connect_articles();
                    other_connect_articles();
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call api
        }
        // -------------- ADD OTHER TO FAVORITE ARTICLES ------------- //

        // -------------- REMOVE OTHER FROM FAVORITE ARTICLES ------------- //
        function remove_other_favorite_article(id) {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "remove_favorite_connect_articles",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                    "connect_articles_id": id,
                }),
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    //update image
                    var source = '{{ url('/public/users/assets/images/icons/heart1.png') }}';
                    $("#remove_other_favorite_article_" + id).attr("src", source);

                    //update data
                    popular_connect_articles();
                    other_connect_articles();
                } else{
                    Command: toastr["error"](response.message);
                }
            });
            //ajax call api
        }
        // -------------- REMOVE OTHER FROM FAVORITE ARTICLES ------------- //
        
        // -------------- VIEW CONNECT ARTICLE BLOG ------------- //
        function view_connect_article_blog(id) {
            window.location.href = "/users/connect/blog/" + id;
        }
        // -------------- VIEW CONNECT ARTICLE BLOG ------------- //
        
        // -------------- CONNECT ARTICLE BLOG ------------- //
        function connect_article_blog() {
            if ($("#connect_articles_id").val() !== "") {
                //ajax call api
                var settings = {
                    "url": "{{ env('API_URL') }}" + "popular_connect_articles",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },

                    "data": JSON.stringify({
                        "users_customers_id": users_customers_id,
                    }),
                };

                $.ajax(settings).done(function (response) {
                    var data = Object.values(response.data).filter(obj => obj.connect_articles_id === $("#connect_articles_id").val());
                    $("#connect_article_blog").html('');

                    $.each(data, function (key, item) {
                        var article_image = "{{ url('/public') }}" + "/" + item.image;

                        $("#connect_article_blog").append('\
                            <div class="row mt-0 d-flex justify-content-center">\
                                <div class="col-lg-5 col-md-7">\
                                    <div class="card text-start border-0 rounded-4 overflow-hidden p-3">\
                                        <div class="card-image position-relative">\
                                            <img class="card-img-top img-fluid" src="'+ article_image +'" alt="Title">\
                                        </div>\
                                        <div class="card-body px-0 py-2">\
                                            <h2 class="fw-bold">'+ item.title +'</h2>\
                                            <p>'+ item.description +'</p>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        ');
                    });
                });
                //ajax call api
            }
        }
        // -------------- CONNECT ARTICLE BLOG ------------- //

        // -------------- COPY ARTICLE BLOG LINK ------------- //
        $(function() {
            new Clipboard('#popular_article_link');
            new Clipboard('#other_article_link');
        });
        // -------------- COPY ARTICLE BLOG LINK ------------- //

        // -------------- ALL ACCOUNTS ------------- //
        function all_accounts() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "all_acounts",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                $("#your_account").html('');
                $.each(response.data, function (key, item) {
                    var user_image = "{{ url('/public') }}" + "/" + item.user_data.profile_pic;
                    $("#your_account").append('\
                        <div class="col-lg-4 col-md-6">\
                            <div class="card border-0 mb-3 rounded-4">\
                                <div class="card-body p-2 d-flex justify-content-between align-items-center">\
                                    <div class="d-flex align-items-center">\
                                        <div class="wallet-icon me-3">\
                                            <img src="'+ user_image +'" class="img-fluid rounded-full">\
                                        </div>\
                                        <div>\
                                            <p class="mb-0 fw-bolder">'+ item.full_name +'</p>\
                                            <small class="text-primary">'+ item.account_currency. symbol + ' ' + item.iban +'</small>\
                                        </div>\
                                    </div>\
                                    <a href="#" class="p-2">\
                                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">\
                                            <path d="M2 20L12 10L2 0L0.225 1.775L8.45 10L0.225 18.225L2 20Z" fill="#4BD16F"/>\
                                        </svg>\
                                    </a>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                });
            });
            //ajax call api
        }
        // -------------- ALL ACCOUNTS ------------- //

        // -------------- ALL FAQS ------------- //
        function all_faqs() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "all_faqs",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                $.each(response.data, function (key, item) {
                    if (item.faqs_id == 1) {
                        $("#accordionExample").append('\
                            <div class="accordion-item">\
                                <h2 class="accordion-header" id="headingOne">\
                                    <button class="accordion-button bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#'+item.faqs_id+'" aria-expanded="true" aria-controls="'+item.faqs_id+'">\
                                        '+item.question+'\
                                    </button>\
                                </h2>\
                                <div id="'+item.faqs_id+'" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">\
                                    <div class="accordion-body pt-0">'+item.answer+'\</div>\
                                </div>\
                            </div> \
                        ');
                    } else{
                        $("#accordionExample").append('\
                            <div class="accordion-item">\
                                <h2 class="accordion-header" id="heading">\
                                    <button class="accordion-button bg-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#'+item.faqs_id+'" aria-expanded="false" aria-controls="'+item.faqs_id+'">\
                                        '+item.question+'\
                                    </button>\
                                </h2>\
                                <div id="'+item.faqs_id+'" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#accordionExample">\
                                    <div class="accordion-body pt-0">'+item.answer+'</div>\
                                </div>\
                            </div>\
                        ');
                    }
                });
            });
            //ajax call api
        }
        // -------------- ALL FAQS ------------- //

        // -------------- GET ALL CHATS ------------- //
        function get_all_chats() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "getAllChat",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "users_customers_id": users_customers_id,
                }),
            };

            $.ajax(settings).done(function (response) {
                $.each(response.data, function (key, item) {
                    var user_id = '';
                        user_id += item.user_data.users_customers_id;

                    var user_name = '';
                        user_name += item.user_data.first_name;
                        user_name += ' ';
                        user_name += item.user_data.last_name;

                    var user_image = '';
                        user_image += "{{ url('/public') }}" + "/" + item.user_data.profile_pic;

                    $("#all_chats").append('\
                            <li class="p-3 d-flex gap-0 msg-tab" onclick="get_messages('+ user_id +')">\
                                <div class="me-2 d-flex align-items-center flex-grow-1">\
                                    <div class="position-relative me-2">\
                                        <img src="'+ user_image +'" class="img-fluid" alt="image">\
                                    </div>\
                                    <div class="flex-grow-1">\
                                        <p class="mb-0 text-black">'+ user_name +'</p>\
                                        <small class="text-black">'+ item.last_message +'</small>\
                                    </div>\
                                </div>\
                                <div class="text-end msg-show ">\
                                    <p class="mb-1">'+ item.date +'</p>\
                                </div>\
                            </li>\
                        ');
                });
            });
            //ajax call api
        }   
        // -------------- GET ALL CHATS ------------- //

        // -------------- GET MESSAGES ------------- //
        function get_messages(id) {
            //message receiver id
            $("#msg_receiver_id").val(id);

            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "user_chat",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "requestType": "getMessages",
                    "users_customers_id":users_customers_id,
                    "other_users_customers_id": id,
                }),
            };

            $.ajax(settings).done(function (response) {
                $("#messages").html('');
                $.each(response.data, function (key, item) {
                    var date = '';
                    if (item.date !== "") {
                        date += '<span class="bg-secondary rounded-pill text-white px-2 py-1">';
                        date += item.date;
                        date += '</span>';
                    }
                    
                    var my_msg = '';
                    var other_user_msg = '';
                    var other_user_image = '';
                    var other_user_name = '';
                    if (item.user_data.users_customers_id == users_customers_id) {
                        my_msg += '<p class="msg  ms-auto text-start">'+ item.message +'</p>';
                        my_msg += '<small class="sm-auto">'+ item.time +'</small>';
                    } else{
                        other_user_image += "{{ url('/public')}}" +"/" + item.user_data.profile_pic;
                        other_user_msg += '<div class="position-relative me-4">';
                        other_user_msg += '<img src="'+ other_user_image +'" class="img-fluid" alt="image">';
                        other_user_msg += '</div>';
                        other_user_msg += '<div class="flex-grow-1">';
                        other_user_msg += '<div>';
                        other_user_msg += '<span class="text-success fw-normal">'+ item.user_data.first_name +'</span>';
                        other_user_msg += '<p class="msg">'+ item.message +'</p>';
                        other_user_msg += '</div>';
                        other_user_msg += '<small>'+ item.time +'</small>';
                        other_user_msg += '</div>';
                    }
                    
                    $("#messages").append('\
                        <!-- msg day -->\
                        <li class="chat-list msg-day text-center">'+ date +'</li>\
                        <!-- other msg -->\
                        <li class="chat-list other-msg">'+ other_user_msg +'</li>\
                        <!-- my msg -->\
                        <li class="chat-list my-msg text-end">'+ my_msg + '</li>\
                    ');
                });
            });
            //ajax call api
        }
        // -------------- GET MESSAGES ------------- //
        
        // -------------- SEND MESSAGE ------------- //
        function send_message() {
            //ajax call api
            var settings = {
                "url": "{{ env('API_URL') }}" + "user_chat",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },

                "data": JSON.stringify({
                    "requestType": "sendMessage",
                    "sender_type": "Users",
                    "users_customers_id": users_customers_id,
                    "other_users_customers_id": $("#msg_receiver_id").val(),
                    "content": $("#entered_message").val(),
                    "messageType": "1",
                }),
            };
            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    get_messages($("#msg_receiver_id").val());
                    $("#entered_message").val("");
                } else{
                    Command: toastr["error"](response.message);
                }
            })
            //ajax call api
        }
        // -------------- SEND MESSAGE ------------- //

        // -------------- UPDATE MESSAGES ------------- //
        function update_messages() {
            if ($("#msg_receiver_id").val() !== "" ){
                //ajax call api
                var settings = {
                    "url": "{{ env('API_URL') }}" + "user_chat",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },

                    "data": JSON.stringify({
                        "requestType": "updateMessages",
                        "users_customers_id": users_customers_id,
                        "other_users_customers_id": $("#msg_receiver_id").val(),
                    }),
                };

                $.ajax(settings).done(function (response) {
                    get_messages($("#msg_receiver_id").val());
                });
                //ajax call api
            }
        }
        // -------------- UPDATE MESSAGES ------------- //
        </script>