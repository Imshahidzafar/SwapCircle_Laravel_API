@extends('layout.users.master')
@section('content') 
    <!-- CONTENT START -->
    <div class="page-content-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid px-4 pb-4">

                <!-- LOADER STRAT -->
                <div class="loader">
                    <img class="loader-image" src="{{ url('/public/users/assets/images/loader.gif') }}" class="img-fluid" alt="" width="auto" height="70px">
                </div>
                <!-- LOADER END -->

                <!-- MODALS START -->
                <div class="mb-3">
                    <a href="{{ url('/users/wallets') }}" class="btn btn-primary">See Wallets</a>

                    <!-- MODAL SEND CURRENCY START -->
                    <div class="modal fade modal-xl" id="modal_send_currency" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-5">
                                    <div class="d-flex align-items-center mb-5">
                                        <svg class="flex-grow-0 pointer" data-bs-dismiss="modal" aria-label="Close" width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 20L0 10L10 0L11.775 1.775L3.55 10L11.775 18.225L10 20Z" fill="#4BD16F"/>
                                        </svg>
                                        <h2 class="flex-grow-1 modal-heading">Send Currency</h2>
                                    </div>
                                    <!-- FORM SEND CURRENCY START -->
                                    <form id="frm_send_currency" action="">
                                        @csrf
                                        <div class="row mt-37">
                                            <!-- BASE CURRENCY -->
                                            <div class="col-12 d-flex align-items-center justify-content-center gap-4 mb-4" id="sc_base_currency">
                                                <h4 class="sub-heading text-black mb-0">Base Currency</h4>
                                                <!-- <p class="mb-0 fs-4 text-black fw-bolder">€226<span class="fs-6 text-primary">.90</span></p> -->
                                            </div>
                                            <!-- FROM CURRENCY -->
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label class="form-label mb-3">From Currency</label>
                                                    <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="sc_from_currency" id="sc_from_currency">   
                                                        <option value="" disabled selected hidden>Select Currency</option>
                                                        <!-- <option value="euro">Euro</option>
                                                        <option value="pkr">PKR</option> -->
                                                    </select>
                                                    <span class="error_msg" id="error_sc_from_currency"></span>
                                                </div>
                                            </div>
                                            <!-- TOTAL AMOUNT -->
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label class="form-label mb-3">Total Amount</label>
                                                    <input type="text" name="sc_total_amount" id="sc_total_amount" placeholder="Enter Amount" class="form-control" min="1" step="0.01">
                                                    <span class="error_msg" id="error_sc_total_amount"></span>
                                                </div>
                                            </div>
                                            <!-- EXCHANGE CURRENCY -->
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label class="form-label mb-3">Exchange Currency</label>
                                                    <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="sc_exchange_currency" id="sc_exchange_currency">
                                                        <option value="" disabled selected hidden>Select Currency</option>
                                                        <!-- <option value="euro">Euro</option>
                                                        <option value="pkr">PKR</option> -->
                                                    </select>
                                                    <span class="error_msg" id="error_sc_exchange_currency"></span>
                                                </div>
                                            </div>
                                            <!-- EXCHANGE RATE -->
                                            <!-- <div class="col-12 d-flex align-items-center justify-content-center gap-4 mb-4">
                                                <h4 class="sub-heading text-black mb-0">Exchange Rate</h4>
                                                <p class="mb-0 fs-4 text-black fw-bolder">€226<span class="fs-6 text-primary">.90</span></p>
                                            </div> -->
                                            <!-- EXCHANGE RATE -->
                                            <div class="col-4 d-flex align-items-left justify-content-left gap-4 mb-4" id="sc_exchange_rate">
                                                <h4 class="sub-heading text-black mb-0">Exchange Rate</h4>
                                            </div>
                                            <!-- EXCHANGE AMOUNT -->
                                            <div class="col-8 d-flex align-items-left justify-content-left gap-4 mb-4" id="sc_exchange_amount">
                                                <h4 class="sub-heading text-black mb-0">Exchange Amount</h4>
                                            </div>
                                            <!-- SEND TO -->
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label class="form-label mb-3">Send to</label>
                                                    <input type="text" name="sc_email" id="sc_email" placeholder="Enter Email" class="form-control">
                                                    <div class="text-black" id="suggested_users"></div>
                                                    <span class="error_msg" id="error_sc_email"></span>
                                                    <input type="hidden" id="suggested_users_id" value="">
                                                </div> 
                                            </div>
                                            <!-- COUNTRY -->
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group mb-4">
                                                    <label class="form-label mb-3">Select Country</label>
                                                    <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="sc_country" id="sc_country">
                                                        <option value="" disabled selected hidden>Select Country</option>
                                                        <!-- <option value="euro">Pakintan</option>
                                                        <option value="pkr">India</option> -->
                                                    </select>
                                                    <span class="error_msg" id="error_sc_country"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 mx-auto">
                                                <div class="mt-37">
                                                    <button type="submit" class="btn btn-login btn-primary w-100">Next</button>
                                                    <!-- <a href="#" class="btn btn-login btn-primary w-100"  data-bs-dismiss="modal">Next</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- FORM SEND CURRENCY END -->                       
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL SEND CURRENCY START -->

                    <!-- MODAL SEND CURRENCY 2 START -->
                    <div class="modal fade" id="modal_send_currency2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-5">
                                    <div class="d-flex align-items-center mb-5">
                                        <svg class="flex-grow-0 pointer" data-bs-dismiss="modal" aria-label="Close" width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 20L0 10L10 0L11.775 1.775L3.55 10L11.775 18.225L10 20Z" fill="#4BD16F"/>
                                        </svg>
                                        <h2 class="flex-grow-1 modal-heading">Send currency</h2>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <p class="mb-30 fs-6 fw-semibold text-left">Total Amount</p>
                                        <div class="d-flex justify-content-center gap-3 mb-30">
                                            <!-- FROM AMOUNT -->
                                            <p class="mb-0 fs-4 text-black fw-bolder" id="sc2_from_amount"></p>
                                            <span class="plane-icon bg-primary mx-2">
                                                <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                            </span>
                                            <!-- EXCHANGE AMOUNT -->
                                            <p class="mb-0 fs-4 text-black fw-bolder" id="sc2_exchange_amount"></span></p>
                                        </div>
                                        <p class="mb-4 fs-6 fw-semibold text-left">Receiver</p>
                                        <div class="d-flex justify-content-center align-items-center gap-3 mb-4">
                                            <!-- IMAGE -->
                                            <img src="{{ url('/public/users/assets/images/profile.png') }}" class="img-fluid h-48 w-48 rounded-full" alt="" id="sc2_receiver_image">
                                            <div class="text-start">
                                                <!-- NAME -->
                                                <h5 class="fw-bolder fs-18 mb-1 text-black" id="sc2_receiver_name"></h5>
                                                <!--EAMIL -->
                                                <p class="mb-0 text-primary" id="sc2_receiver_email"></p>
                                            </div>
                                        </div>
                                        <div class="row text-start w-100 mb-5">
                                            <!-- COUNTRY -->
                                            <div class="col-md-6 px-0" id="country">
                                                <p class="fs-6 text-black">Country</p>
                                                <h5 class="fw-bolder fs-4" id="sc2_country_name"></h5>
                                            </div>
                                            <!-- DATE -->
                                            <div class="col-md-6 px-0">
                                                <p class="fs-6 text-black">Date</p>
                                                <h5 class="fw-bolder fs-4" id="sc2_current_date">21- Feb-2023</h5>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-login btn-primary w-100" data-bs-dismiss="modal" onclick="send_currency()">Send</a>
                                    </div>                     
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL SEND CURRENCY 2 START -->
                </div>
                <!-- MODALS END -->
                
                <div class="wallet-wrapper">
                    <ul class="wallet-items d-flex flex-wrap justify-content-start list-unstyled" id="wallets">
                        <!-- CREATE WALLET START -->
                        <li class="wallet-item wallet-create d-flex align-items-center pointer" data-bs-toggle="modal" data-bs-target="#exampleModal-1">
                            <img src="{{ url('/public/users/assets/images/icons/add-circle.png') }}" class="img-fluid me-2 d-block" alt="image">
                            <span class="text-black">Create <br/> Wallet</span>
                        </li>
                        <!-- MODAL START -->
                        <div class="modal fade" id="exampleModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body py-5 px-4">
                                        <div class="d-flex align-items-center mb-5">
                                            <svg class="flex-grow-0 pointer" data-bs-dismiss="modal" aria-label="Close" width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 20L0 10L10 0L11.775 1.775L3.55 10L11.775 18.225L10 20Z" fill="#4BD16F"/>
                                            </svg>
                                            <h2 class="flex-grow-1 modal-heading">Create Wallet</h2>
                                        </div>
                                        <div class="row mt-37">
                                            <div class="col-lg-8 mx-auto">
                                                <!-- FORM CREATE WALLET START -->
                                                <form id="frm_create_wallet" action="">
                                                    @csrf
                                                    <!-- BASE CURRENCY -->
                                                    <div class="form-group mb-4">
                                                        <label class="form-label mb-3">Base Currency</label>
                                                        <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="cw_base_currency" id="cw_base_currency">
                                                            <option value="" disabled selected hidden>Select Currency</option>
                                                            <!-- <option value="euro">Euro</option>
                                                            <option value="pkr">PKR</option> -->
                                                        </select>
                                                        <span class="error_msg" id="error_cw_base_currency"></span>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label class="form-label mb-3">Exchange Currency</label>
                                                        <select class="form-select form-select-lg" aria-label=".form-select-lg example" id="wallet_exchange_currency">
                                                            <option value="pkr">PKR</option>
                                                            <option value="euro">Euro</option>
                                                        </select>
                                                    </div> -->
                                                    <div class="mt-37">
                                                        <button type="submit" class="btn btn-login btn-primary w-100">Save</button>
                                                        <!-- <a href="#" class="btn btn-login btn-primary w-100"  data-bs-dismiss="modal">Save</a> -->
                                                    </div>
                                                </form>
                                                <!-- FORM CREATE WALLET END -->
                                            </div>
                                        </div>                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- MODAL END -->
                        <!-- CREATE WALLET END -->

                        <!--<li class="wallet-item">
                            <img src="{{ url('/public/users/assets/images/flags/flag-1.png') }}" class="img-fluid me-2" alt="image">
                            <span>NGN</span>
                            <h5 class="mb-0 text-black fw-bolder mt-1">₦890.00</h5>
                        </li>
                        <li class="wallet-item">
                            <img src="{{ url('/public/users/assets/images/flags/flag-1.png') }}" class="img-fluid me-2" alt="image">
                            <span>NGN</span>
                            <h5 class="mb-0 text-black fw-bolder mt-1">₦890.00</h5>
                        </li>
                        <li class="wallet-item">
                            <img src="{{ url('/public/users/assets/images/flags/flag-1.png') }}" class="img-fluid me-2" alt="image">
                            <span>NGN</span>
                            <h5 class="mb-0 text-black fw-bolder mt-1">₦890.00</h5>
                        </li>
                        <li class="wallet-item">
                            <img src="{{ url('/public/users/assets/images/flags/flag-1.png') }}" class="img-fluid me-2" alt="image">
                            <span>NGN</span>
                            <h5 class="mb-0 text-black fw-bolder mt-1">₦890.00</h5>
                        </li>
                        <li class="wallet-item">
                            <img src="{{ url('/public/users/assets/images/flags/flag-1.png') }}" class="img-fluid me-2" alt="image">
                            <span>NGN</span>
                            <h5 class="mb-0 text-black fw-bolder mt-1">₦890.00</h5>
                        </li>
                        <li class="wallet-item">
                            <img src="{{ url('/public/users/assets/images/flags/flag-1.png') }}" class="img-fluid me-2" alt="image">
                            <span>NGN</span>
                            <h5 class="mb-0 text-black fw-bolder mt-1">₦890.00</h5>
                        </li>
                        <li class="wallet-item">
                            <img src="{{ url('/public/users/assets/images/flags/flag-1.png') }}" class="img-fluid me-2" alt="image">
                            <span>NGN</span>
                            <h5 class="mb-0 text-black fw-bolder mt-1">₦890.00</h5>
                        </li>-->
                    </ul>

                    <!-- CATEGORIES START -->
                    <div class="wallet-tabs mt-4">
                        <ul class="nav nav-pills mb-4 mx-auto" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-transactions" type="button" role="tab" aria-controls="pills-transactions" aria-selected="true">All Transactions</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-offers" type="button" role="tab" aria-controls="pills-offers" aria-selected="false">🔥 Hot Swap Offers</button>
                            </li>
                            <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-rate-table" type="button" role="tab" aria-controls="pills-rate-table" aria-selected="false">Rate Table</button>
                            </li> -->
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- ALL TRANSACTIONS START -->
                            <div class="tab-pane fade show active" id="pills-transactions" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="row">
                                    <div class="row" id="all_transactions">
                                        <!-- <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-green">
                                                            <img src="{{ url('/public/users/assets/images/icons/send-1.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">From James Anderson</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-success me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-green">
                                                            <img src="{{ url('/public/users/assets/images/icons/send-1.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">From James Anderson</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-success me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-green">
                                                            <img src="{{ url('/public/users/assets/images/icons/send.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">To James Anderson</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-green">
                                                            <img src="{{ url('/public/users/assets/images/icons/send.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">To James Anderson</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-primary">
                                                            <img src="{{ url('/public/users/assets/images/icons/add-circle-1.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">Wallet Top-Up</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-success me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-primary">
                                                            <img src="{{ url('/public/users/assets/images/icons/add-circle-1.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">Wallet Top-Up</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-success me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-primary">
                                                            <img src="{{ url('/public/users/assets/images/icons/send.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">To Doyln Ellot</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">-₦63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-primary">
                                                            <img src="{{ url('/public/users/assets/images/icons/send.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">To Doyln Ellot</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">-₦63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-primary">
                                                            <img src="{{ url('/public/users/assets/images/icons/send.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">To Adeola Ajay!</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-primary">
                                                            <img src="{{ url('/public/users/assets/images/icons/send.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">To Adeola Ajay!</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-green">
                                                            <img src="{{ url('/public/users/assets/images/icons/arrow-down.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">Withdraw money</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-green">
                                                            <img src="{{ url('/public/users/assets/images/icons/arrow-down.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">Withdraw money</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-green">
                                                            <img src="{{ url('/public/users/assets/images/icons/arrow-down.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">Withdraw money</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-green">
                                                            <img src="{{ url('/public/users/assets/images/icons/arrow-down.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">Withdraw money</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-green">
                                                            <img src="{{ url('/public/users/assets/images/icons/arrow-down.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">Withdraw money</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="wallet-icon me-3 bg-green">
                                                            <img src="{{ url('/public/users/assets/images/icons/arrow-down.png') }}" alt="" srcset="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 fw-bolder">Withdraw money</p>
                                                            <small class="text-primary">Swap - 2:26pm</small>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger me-3">$63.98</small>
                                                </div>
                                            </div>                                            
                                        </div> -->
                                    </div>
                                    <!-- SEND CURRENCY START -->
                                    <div class="text-end">
                                        <a href="#" class="btn rounded-full btn-rounded ms-auto mb-3" data-bs-toggle="modal" data-bs-target="#modal_send_currency">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.1099 5.96028L16.1299 2.95028C20.1799 1.60028 22.3799 3.81028 21.0399 7.86028L18.0299 16.8803C16.0099 22.9503 12.6899 22.9503 10.6699 16.8803L9.7799 14.2003L7.0999 13.3103C1.0399 11.3003 1.0399 7.99028 7.1099 5.96028Z" fill="white"/>
                                                <path d="M12.1201 11.6296L15.9301 7.80957L12.1201 11.6296Z" fill="#292D32"/>
                                                <path d="M12.1201 12.38C11.9301 12.38 11.7401 12.31 11.5901 12.16C11.3001 11.87 11.3001 11.39 11.5901 11.1L15.3901 7.28C15.6801 6.99 16.1601 6.99 16.4501 7.28C16.7401 7.57 16.7401 8.05 16.4501 8.34L12.6501 12.16C12.5001 12.3 12.3101 12.38 12.1201 12.38Z" fill="#A6EBB8"/>
                                            </svg>
                                        </a>

                                        <!-- PAGINATION START -->
                                        <!-- <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-3">
                                            <p class="text-black mb-0">Showing 1 to 10 of 57 entries</p>
                                            <div class="pagination ms-auto d-flex justify-content-around flex-wrap" role="group" aria-label="Basic example">
                                                <a href="#" class="btn btn-outline-primary btn-prev">Previous</a>
                                                <a href="#" class="btn btn-outline-primary active">1</a>
                                                <a href="#" class="btn btn-outline-primary">2</a>
                                                <a href="#" class="btn btn-outline-primary">3</a>
                                                <a href="#" class="btn btn-outline-primary">4</a>
                                                <a href="#" class="btn btn-outline-primary">5</a>
                                                <a href="#" class="btn btn-outline-primary btn-next">Next</a>
                                            </div>
                                        </div> -->
                                        <!-- PAGINATION END -->
                                    </div>
                                    <!-- SEND CURRENCY END -->
                                </div>
                            </div>
                            <!-- ALL TRANSACTIONS END -->

                            <!-- 🔥 HOT SWAP OFFERS START -->
                            <div class="tab-pane fade" id="pills-offers" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="row">
                                    <!-- <div class="col-sm-6">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="wallet-icon me-3 bg-green">
                                                        <img src="{{ url('/public/users/assets/images/icons/send-1.png') }}" alt="" srcset="">
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 fw-bolder">From James Anderson</p>
                                                        <small class="text-primary">Swap - 2:26pm</small>
                                                    </div>
                                                </div>
                                                <small class="text-success me-3">$63.98</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="wallet-icon me-3 bg-green">
                                                        <img src="{{ url('/public/users/assets/images/icons/send-1.png') }}" alt="" srcset="">
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 fw-bolder">From James Anderson</p>
                                                        <small class="text-primary">Swap - 2:26pm</small>
                                                    </div>
                                                </div>
                                                <small class="text-success me-3">$63.98</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="wallet-icon me-3 bg-green">
                                                        <img src="{{ url('/public/users/assets/images/icons/send.png') }}" alt="" srcset="">
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 fw-bolder">To James Anderson</p>
                                                        <small class="text-primary">Swap - 2:26pm</small>
                                                    </div>
                                                </div>
                                                <small class="text-danger me-3">$63.98</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="wallet-icon me-3 bg-green">
                                                        <img src="{{ url('/public/users/assets/images/icons/send.png') }}" alt="" srcset="">
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 fw-bolder">To James Anderson</p>
                                                        <small class="text-primary">Swap - 2:26pm</small>
                                                    </div>
                                                </div>
                                                <small class="text-danger me-3">$63.98</small>
                                            </div>
                                        </div>                                            
                                    </div> -->
                                </div>
                                <!-- CREATE SWAP START -->
                                <div class="row">
                                    <div class="col-lg-4 mx-auto">
                                        <button class="btn btn-primary btn-login w-100" data-bs-toggle="modal" data-bs-target="#exampleModal-4">Create Swap</button>
                                        <!-- MODAL START -->
                                        <!--<button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal-4">Create Swap</button>-->
                                        <div class="modal fade" id="exampleModal-4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body py-5 px-4">
                                                    <div class="d-flex align-items-center mb-5">
                                                        <svg class="flex-grow-0 pointer" data-bs-dismiss="modal" aria-label="Close" width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10 20L0 10L10 0L11.775 1.775L3.55 10L11.775 18.225L10 20Z" fill="#4BD16F"/>
                                                        </svg>
                                                        <h2 class="flex-grow-1 modal-heading">Create Swap</h2>
                                                    </div>
                                                    <div class="row mt-37">
                                                        <div class="col-lg-8 mx-auto">
                                                            <!-- FORM CREATE SWAP START -->
                                                            <form id="frm_create_swap" action="">
                                                                @csrf
                                                                <!-- BASE CURRENCY -->
                                                                <div class="col-12 d-flex align-items-between justify-content-between gap-4 mb-2" id="cs_base_currency">
                                                                    <h6 class="text-black mb-0">Base Currency</h6>
                                                                    <!-- <p class="mb-0 fs-4 text-black fw-bolder">€226<span class="fs-6 text-primary">.90</span></p> -->
                                                                </div>
                                                                <!-- FROM ACCOUNT -->
                                                                <div class="form-group mb-4">
                                                                    <label class="form-label mb-3">From Account</label>
                                                                    <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="cs_from_account" id="cs_from_account">
                                                                        <option value="" disabled selected hidden>Select</option>
                                                                        <!-- <option value="euro">Euro</option>
                                                                        <option value="pkr">PKR</option> -->
                                                                    </select>
                                                                    <span class="error_msg" id="error_cs_from_account"></span>
                                                                    <span class="text-success" id="cs_from_account_amount"></span>
                                                                </div>
                                                                <!-- TOTAL AMOUNT -->
                                                                <div class="form-group mb-4">
                                                                    <label class="form-label mb-3">Total Amount</label>
                                                                    <input type="text" name="cs_total_amount" id="cs_total_amount" placeholder="Enter Amount" class="form-control text-capitalize" min="1" step="0.01">
                                                                    <span class="error_msg" id="error_cs_total_amount"></span>
                                                                </div>
                                                                <!-- TO ACCOUNT -->
                                                                <div class="form-group mb-4">
                                                                    <label class="form-label mb-3">To Account</label>
                                                                    <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="cs_to_account" id="cs_to_account">
                                                                        <option value="" disabled selected hidden>Select</option>
                                                                        <!-- <option value="euro">Euro</option>
                                                                        <option value="pkr">PKR</option> -->
                                                                    </select>
                                                                    <span class="error_msg" id="error_cs_to_account"></span>
                                                                    <span class="text-success" id="cs_to_account_amount"></span>
                                                                </div>
                                                                <div class="mt-37">
                                                                    <button type="submit" class="btn btn-login btn-primary w-100">Save</button>
                                                                    <!-- <a href="#" class="btn btn-login btn-primary w-100"  data-bs-dismiss="modal">Save</a> -->
                                                                </div>
                                                            </form>
                                                            <!-- FROM CREATE SWAP END -->
                                                        </div>
                                                    </div>                       
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- MODAL END -->
                                    </div>
                                </div>
                                <!-- CREATE SWAP END -->
                            </div>
                            <!-- HOT SWAP OFFERS END -->

                            <!-- RATE TABLE START -->
                            <!-- <div class="tab-pane fade" id="pills-rate-table" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                                    <p class="mb-0">£1</p>
                                                    <span class="plane-icon bg-primary mx-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" alt="">
                                                    </span>
                                                    <p class="mb-0">₦890.00</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="mb-0 text-danger d-flex align-items-center">
                                                        <span class="plane-icon bg-danger me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                        </span> <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-success d-flex align-items-center">
                                                        <span class="plane-icon bg-primary me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-black d-flex align-items-center">
                                                        <span class="plane-icon bg-black me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                                    <p class="mb-0">£1</p>
                                                    <span class="plane-icon bg-primary mx-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" alt="">
                                                    </span>
                                                    <p class="mb-0">₦890.00</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="mb-0 text-danger d-flex align-items-center">
                                                        <span class="plane-icon bg-danger me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                        </span> <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-success d-flex align-items-center">
                                                        <span class="plane-icon bg-primary me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-black d-flex align-items-center">
                                                        <span class="plane-icon bg-black me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                                    <p class="mb-0">£1</p>
                                                    <span class="plane-icon bg-primary mx-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" alt="">
                                                    </span>
                                                    <p class="mb-0">₦890.00</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="mb-0 text-danger d-flex align-items-center">
                                                        <span class="plane-icon bg-danger me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                        </span> <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-success d-flex align-items-center">
                                                        <span class="plane-icon bg-primary me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-black d-flex align-items-center">
                                                        <span class="plane-icon bg-black me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                                    <p class="mb-0">£1</p>
                                                    <span class="plane-icon bg-primary mx-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" alt="">
                                                    </span>
                                                    <p class="mb-0">₦890.00</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="mb-0 text-danger d-flex align-items-center">
                                                        <span class="plane-icon bg-danger me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                        </span> <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-success d-flex align-items-center">
                                                        <span class="plane-icon bg-primary me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-black d-flex align-items-center">
                                                        <span class="plane-icon bg-black me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                                    <p class="mb-0">£1</p>
                                                    <span class="plane-icon bg-primary mx-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" alt="">
                                                    </span>
                                                    <p class="mb-0">₦890.00</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="mb-0 text-danger d-flex align-items-center">
                                                        <span class="plane-icon bg-danger me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                        </span> <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-success d-flex align-items-center">
                                                        <span class="plane-icon bg-primary me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-black d-flex align-items-center">
                                                        <span class="plane-icon bg-black me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                                    <p class="mb-0">£1</p>
                                                    <span class="plane-icon bg-primary mx-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" alt="">
                                                    </span>
                                                    <p class="mb-0">₦890.00</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="mb-0 text-danger d-flex align-items-center">
                                                        <span class="plane-icon bg-danger me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                        </span> <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-success d-flex align-items-center">
                                                        <span class="plane-icon bg-primary me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-black d-flex align-items-center">
                                                        <span class="plane-icon bg-black me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                                    <p class="mb-0">£1</p>
                                                    <span class="plane-icon bg-primary mx-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" alt="">
                                                    </span>
                                                    <p class="mb-0">₦890.00</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="mb-0 text-danger d-flex align-items-center">
                                                        <span class="plane-icon bg-danger me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                        </span> <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-success d-flex align-items-center">
                                                        <span class="plane-icon bg-primary me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-black d-flex align-items-center">
                                                        <span class="plane-icon bg-black me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                                    <p class="mb-0">£1</p>
                                                    <span class="plane-icon bg-primary mx-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" alt="">
                                                    </span>
                                                    <p class="mb-0">₦890.00</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="mb-0 text-danger d-flex align-items-center">
                                                        <span class="plane-icon bg-danger me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                        </span> <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-success d-flex align-items-center">
                                                        <span class="plane-icon bg-primary me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-black d-flex align-items-center">
                                                        <span class="plane-icon bg-black me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                                    <p class="mb-0">£1</p>
                                                    <span class="plane-icon bg-primary mx-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" alt="">
                                                    </span>
                                                    <p class="mb-0">₦890.00</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="mb-0 text-danger d-flex align-items-center">
                                                        <span class="plane-icon bg-danger me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                        </span> <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-success d-flex align-items-center">
                                                        <span class="plane-icon bg-primary me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                    <div class="mb-0 text-black d-flex align-items-center">
                                                        <span class="plane-icon bg-black me-2">
                                                        <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                        </span>
                                                        <span>₦889.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                </div>
                            </div> -->
                            <!-- RATE TABLE END -->
                        </div>
                    </div> 
                    <!-- CATEGORIES END -->
                </div>
            </div>
        </div>  
    </div>
    <!-- CONTENT END -->
@endsection
@section('script') 
    <script type="text/javascript">
        var isFirstView = localStorage.getItem('isFirstView') || '';
        if (isFirstView !== 'Yes') {
            /* Show message to use as this is first view. */
            localStorage.setItem('isFirstView', 'Yes');
        }
    </script>
@endsection