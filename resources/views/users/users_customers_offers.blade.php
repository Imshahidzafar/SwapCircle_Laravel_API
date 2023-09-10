@extends('layout.users.master')
@section('content') 
    <!-- CONTENT START -->
    <div class="page-content-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid px-4 pb-4">

                <!-- MODAL SEND OFFER START -->
                <div class="modal fade" id="modal_send_offer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body py-5 px-4 text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2 mb-30">
                                    <!-- SWAP OFFERS ID -->
                                    <input type="hidden" id="so_swap_offers_id" value="">
                                    <!-- FROM CURRENCY -->
                                    <p class="mb-0 fs-4 text-black" id="so_from_currency"></p>
                                    <span class="plane-icon wh-40 bg-primary mx-2">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.625 8.625C3.625 8.27982 3.34518 8 3 8C2.65482 8 2.375 8.27982 2.375 8.625C2.375 11.0412 4.33375 13 6.75 13H11.4907L10.6829 13.808L10.6309 13.8669C10.4402 14.1121 10.4575 14.4666 10.6828 14.6919C10.9269 14.936 11.3226 14.936 11.5667 14.692L13.4417 12.8172L13.4419 12.817L13.4935 12.7585C13.4775 12.7792 13.4601 12.7988 13.4417 12.8172M11.4907 11.75H6.75L6.61444 11.7471C4.95144 11.6761 3.625 10.3055 3.625 8.625" fill="#E8F9DC"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.3167 1.30806C5.07262 1.06398 4.67689 1.06398 4.43281 1.30806L2.55781 3.18306L2.55599 3.18513C2.53906 3.20221 2.52312 3.22026 2.50825 3.23919L2.50582 3.24194C2.31518 3.48712 2.33251 3.84164 2.55781 4.06694L4.43281 5.94194L4.49169 5.99393C4.73688 6.18458 5.09139 6.16724 5.3167 5.94194L5.36869 5.88306C5.55933 5.63788 5.542 5.28336 5.3167 5.05806L4.5087 4.25H9.24999L9.38554 4.25289C11.0485 4.32386 12.375 5.69453 12.375 7.375C12.375 7.72018 12.6548 8 13 8C13.3452 8 13.625 7.72018 13.625 7.375C13.625 4.95875 11.6662 3 9.24999 3H4.5087L5.3167 2.19194L5.36869 2.13306C5.55933 1.88788 5.542 1.53336 5.3167 1.30806Z" fill="white"/>
                                        </svg>
                                    </span>
                                    <p class="mb-0 fs-4 text-black" id="so_exchange_rate"></p> 
                                </div>
                                <div class="d-flex flex-column gap-5">
                                    <div class="row px-5">
                                        <!-- AMOUNT -->
                                        <div class="col-lg-6 d-flex align-items-left justify-content-left mb-3">Amount</div>
                                        <div class="col-lg-6 d-flex mb-3">
                                            <div class="mb-0 text-danger d-flex">
                                                <span class="plane-icon bg-danger me-2">
                                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                </span>
                                                <span id="so_amount"></span>
                                            </div>
                                        </div>
                                        <!-- CONVERTED AMOUNT -->
                                        <div class="col-lg-6 d-flex align-items-left justify-content-left mb-3">Converted Amount</div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="mb-0 text-success d-flex"> 
                                                <span class="plane-icon bg-primary me-2">
                                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                </span>
                                                <span id="so_converted_amount"></span>
                                            </div>
                                        </div>
                                        <!-- BASE AMOUNT -->
                                        <div class="col-lg-6 d-flex align-items-left justify-content-left mb-3">Base Amount</div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="mb-0 text-black d-flex">
                                                <span class="plane-icon bg-black me-2">
                                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                </span>
                                                <span id="so_base_amount">$-0.10</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-login btn-primary w-100 mt-1" data-bs-dismiss="modal" onclick="send_offer()">Send Offer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- MODAL SEND OFFER END -->

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <h3 class="fw-bold sub-heading text-black">Marketplace</h3>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="" role="button" id="navbarDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                           <img src="{{ url('/public/users/assets/images/icons/filter.png') }}" class="img-fluid w-35" alt="" srcset="">
                        </a>

                        <ul class="dropdown-menu position-absolute  mt-3 dropdown-menu-end" aria-labelledby="navbarDropdown2">
                            <li><a href="#" class="dropdown-item fw-bold py-2">Today</a></li>
                            <li><a href="#" class="dropdown-item fw-bold py-2">Week</a></li>
                            <li><a href="#" class="dropdown-item fw-bold py-2">Month</a></li>
                        </ul>
                    </div> -->
                </div>
                
                <!-- OFFERS CATEGORIES START -->
                <div class="offers-wrapper">
                    <div class="wallet-tabs mt-4">
                        <ul class="nav nav-pills mb-4 mx-auto" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-all-offers" type="button" role="tab" aria-controls="pills-all-offers" aria-selected="true">All Offers</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-favorite" type="button" role="tab" aria-controls="pills-favorite" aria-selected="false">Favorite</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-my-offers" type="button" role="tab" aria-controls="pills-my-offers" aria-selected="false">My Offers</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- ALL OFFERS START -->
                            <div class="tab-pane fade show active" id="pills-all-offers" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="row" id="all_offers">

                                    <!-- CARDS START -->
                                    <!-- <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 flex-wrap gap-1">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 flex-wrap gap-1">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 flex-wrap gap-1">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 flex-wrap gap-1">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 flex-wrap gap-1">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 flex-wrap gap-1">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 flex-wrap gap-1">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 flex-wrap gap-1">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 flex-wrap gap-1">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div> -->
                                    <!-- CARDS END -->
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
                            </div>
                            <!-- ALL OFFERS END -->

                            <!-- 🔥 FAVORITE START -->
                            <div class="tab-pane fade" id="pills-favorite" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="row" id="favorite_offers">
                                    {{-- <!-- CARDS START -->
                                    <!-- <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom border-danger pb-3 mb-3 gap-1 flex-wrap">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart-fav.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom border-danger pb-3 mb-3 gap-1 flex-wrap">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart-fav.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom border-danger pb-3 mb-3 gap-1 flex-wrap">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart-fav.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom border-danger pb-3 mb-3 gap-1 flex-wrap">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart-fav.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom border-danger pb-3 mb-3 gap-1 flex-wrap">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart-fav.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom border-danger pb-3 mb-3 gap-1 flex-wrap">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart-fav.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div> -->
                                    <!-- CARDS END -->
                                    <!-- PAGINATION START -->
                                    <!-- <div class="d-flex justify-content-between align-items-center flex-wrap">
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
                                    <!-- PAGINATION END -->  --}}
                                </div>   
                            </div>
                            <!-- FAVORITE END -->

                            <!-- MY OFFERS START -->
                            <div class="tab-pane fade" id="pills-my-offers" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="row" id="my_offers">
                                    <!-- CARDS START -->
                                    <!-- <div class="col-md-6 col-xl-4">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between border-bottom border-danger pb-3 mb-3 gap-1 flex-wrap">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0">£1</p>
                                                        <span class="plane-icon bg-primary mx-2">
                                                            <img src="{{ url('/public/users/assets/images/icons/mini-icon/Repeat.png') }}" class="img-fluid" alt="">
                                                        </span>
                                                        <p class="mb-0">₦890.00</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/icons/clock.png') }}" class="img-fluid" alt="">
                                                        <small class="ms-1 mb-0 text-primary">24 hrs ago</small>
                                                        <img src="{{ url('/public/users/assets/images/icons/heart-fav.png') }}" class=" ms-3 img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="offers-card-body d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                    <div class="mb-0">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">£</span>1000.<small>00</small></p>
                                                    </div>
                                                    <div class="mb-0 d-flex align-items-center">
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-2.png') }}" class="img-fluid" alt="">
                                                        <small class="mx-2">GBP/NGN</small>
                                                        <img src="{{ url('/public/users/assets/images/flags/flag-3.png') }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="mb-0 text-end">
                                                        <small class="text-primary mb-2">You Pay</small>
                                                        <p class="my-1"><span class="text-success">₦</span>890,000.<small>00</small></p>
                                                    </div>
                                                </div>
                                                <small class="text-primary">(Inc. Service charges  £10.00)</small>
                                            </div>
                                        </div>                                            
                                    </div> -->
                                    <!-- CARDS END -->
                                </div>
                                <!-- CREATE OFFER START -->
                                <div class="row">
                                    <div class="col-lg-4 mx-auto">
                                        <button class="btn btn-primary btn-login w-100" data-bs-toggle="modal" data-bs-target="#exampleModal-6">Create Offer</button>
                                        <!-- MODAL START -->
                                        <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-6">Create Offer</button> -->
                                        <div class="modal fade modal-xl" id="exampleModal-6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body p-5">
                                                        <div class="d-flex align-items-center mb-5">
                                                            <svg class="flex-grow-0 pointer" data-bs-dismiss="modal" aria-label="Close" width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 20L0 10L10 0L11.775 1.775L3.55 10L11.775 18.225L10 20Z" fill="#4BD16F"/>
                                                            </svg>
                                                            <h2 class="flex-grow-1 modal-heading">Create Offer</h2>
                                                        </div>
                                                        <!-- FORM CREATE OFFER START -->
                                                        <form id="frm_create_offer" action="">
                                                            @csrf
                                                            <div class="row mt-37">
                                                                <!-- FROM CURRENCY -->
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group mb-4">
                                                                        <label class="form-label mb-3">From Account</label>
                                                                        <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="co_from_account" id="co_from_account">
                                                                            <option value="" disabled selected hidden>Select</option>
                                                                            <!-- <option value="euro">Euro</option>
                                                                            <option value="pkr">PKR</option> -->
                                                                        </select>
                                                                        <span class="error_msg" id="error_co_from_account"></span>
                                                                    </div>
                                                                </div>
                                                                <!-- TOTAL AMOUNT -->
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group mb-4">
                                                                        <label class="form-label mb-3">Total Amount</label>
                                                                        <input type="text" name="co_total_amount" id="co_total_amount" placeholder="Enter Amount" class="form-control" min="1" step="0.01">
                                                                        <span class="error_msg" id="error_co_total_amount"></span>
                                                                    </div>
                                                                </div>
                                                                <!-- EXCHANGE CURRENCY -->
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group mb-4">
                                                                        <label class="form-label mb-3">Exchange Currency</label>
                                                                        <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="co_exchange_currency" id="co_exchange_currency">
                                                                            <option value="" disabled selected hidden>Select</option>
                                                                            <!-- <option value="euro">Euro</option>
                                                                            <option value="pkr">PKR</option> -->
                                                                        </select>
                                                                        <span class="error_msg" id="error_co_exchange_currency"></span>
                                                                    </div>
                                                                </div>
                                                                <!-- EXCHANGE RATE -->
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group mb-4">
                                                                        <label class="form-label mb-3">Exchange Rate</label>
                                                                        <input type="text" name="co_exchange_rate" id="co_exchange_rate" placeholder="Enter Amount" class="form-control" min="0.01" step="0.01">
                                                                        <span class="error_msg" id="error_co_exchange_rate"></span>
                                                                    </div>
                                                                </div>
                                                                <!-- EXPIRES IN -->
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group mb-4">
                                                                        <label class="form-label mb-3">Expires In</label>
                                                                        <input type="text" name="co_expires_in" id="co_expires_in" placeholder="Enter time in hours" class="form-control" min="1" step="1">
                                                                        <span class="error_msg" id="error_co_expires_in"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4 mx-auto">
                                                                    <div class="mt-37">
                                                                        <button type="submit" class="btn btn-login btn-primary w-100">Save</button>
                                                                        <!-- <a href="#" class="btn btn-login btn-primary w-100"  data-bs-dismiss="modal">Save</a> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form> 
                                                        <!-- FORM CREATE OFFER END -->                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- MODAL END -->
                                    </div>
                                </div>
                                <!-- CREATE OFFER END -->
                            </div>
                            <!-- MY OFFERS END -->
                        </div>
                    </div> 
                </div>
                <!-- OFFERS CATEGORIES END -->
            </div>
        </div> 
    </div>
    <!-- CONTENT END -->
@endsection
