@extends('layout.users.master')
@section('content')
    <!-- CONTENT START -->
    <div class="page-content-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid px-4 pb-4">
                <div class="billing-payment">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="{{ url('/users/profile') }}" class="text-primary">Profile</a></li>
                            <li class="mx-3">
                                <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.21749 3.11406C5.22417 4.12074 5.25773 5.73205 4.31816 6.77904L4.21749 6.88529L1.47119 9.47108C1.21084 9.73143 0.788734 9.73143 0.528385 9.47108C0.288062 9.23076 0.269576 8.8526 0.472926 8.59107L0.528385 8.52827L3.27468 5.94248C3.76797 5.44919 3.79393 4.66553 3.35257 4.14168L3.27468 4.05687L0.528385 1.47108C0.268035 1.21073 0.268035 0.78862 0.528385 0.52827C0.768707 0.287947 1.14686 0.269461 1.40839 0.472811L1.47119 0.52827L4.21749 3.11406Z" fill="#21333B"/>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Billing/Payment</a></li> 
                        </ol>
                    </nav>
                    <!-- YOUR ACCOUNT START -->
                    <div class="row mt-5">
                        <div class="col-12 mb-4">
                          <h3 class="fw-bold sub-heading text-black">Your Account</h3>
                        </div>
                    </div>
                    <div class="row" id="your_account">
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="card border-0 mb-3 rounded-4">
                                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="wallet-icon me-3">
                                            <img src="{{ url('/public/users/assets/images/oval.png') }}" class="img-fluid rounded-full">
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bolder">James Anderson</p>
                                            <small class="text-primary">$ James3651</small>
                                        </div>
                                    </div>
                                    <a href="#" class="p-2">
                                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 20L12 10L2 0L0.225 1.775L8.45 10L0.225 18.225L2 20Z" fill="#4BD16F"/>
                                        </svg>                                            
                                    </a>
                                </div>
                            </div>                                            
                        </div> -->
                    </div>
                        <!-- pagination -->
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
                    </div>
                    <!-- YOUR ACCOUNT END -->

                    <!-- ADD ACCOUNT START -->
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <button class="btn btn-primary btn-login w-100" data-bs-toggle="modal" data-bs-target="#exampleModal-8">Add Account</button>
                            <!-- MODAL START -->
                            <div class="modal fade" id="exampleModal-8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body py-5 px-4">
                                            <div class="d-flex align-items-center mb-5">
                                                <svg class="flex-grow-0 pointer" data-bs-dismiss="modal" aria-label="Close" width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 20L0 10L10 0L11.775 1.775L3.55 10L11.775 18.225L10 20Z" fill="#4BD16F"/>
                                                </svg>
                                                <h2 class="flex-grow-1 modal-heading">Add Account</h2>
                                            </div>
                                            <div class="row mt-37">
                                                <div class="col-lg-8 mx-auto">
                                                    <!-- FORM ADD ACCOUNT START -->
                                                    <form id="frm_add_account" action="">
                                                        @csrf
                                                        <!-- CURRENCY -->
                                                        <div class="form-group mb-4">
                                                            <label class="form-label mb-3">Currency</label>
                                                            <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="account_currency" id="account_currency">
                                                                <option value="" disabled selected hidden>Select currency</option>
                                                                <!-- <option value="euro">Euro</option>
                                                                <option value="pkr">PKR</option> -->
                                                            </select>
                                                            <span class="error_msg" id="error_account_currency"></span>
                                                        </div>
                                                        <!-- ACCOUNT HOLDER NAME -->
                                                        <div class="form-group mb-4">
                                                            <label class="form-label mb-3">Full name of account holder</label>
                                                            <input type="text" name="account_holder_name" id="account_holder_name" placeholder="Account holder name" class="form-control">
                                                            <span class="error_msg" id="error_account_holder_name"></span>
                                                        </div>
                                                        <!-- IBAN -->
                                                        <div class="form-group">
                                                            <label class="form-label mb-3">IBAN</label>
                                                            <input type="text" name="account_iban" id="account_iban" placeholder="Enter IBAN here" class="form-control">
                                                            <span class="error_msg" id="error_account_iban"></span>
                                                        </div>
                                                        <div class="mt-37">
                                                            <button type="submit" class="btn btn-login btn-primary w-100">Save</button>
                                                            <!-- <a href="#" class="btn btn-login btn-primary w-100"  data-bs-dismiss="modal">Save</a> -->
                                                        </div>
                                                    </form>
                                                    <!-- FORM ADD ACCOUNT END -->
                                                </div>
                                            </div>                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL END -->
                        </div>
                    </div>
                    <!-- ADD ACCOUNT END -->
                </div>
            </div>
        </div> 
    </div>
    <!-- CONTENT END -->
@endsection