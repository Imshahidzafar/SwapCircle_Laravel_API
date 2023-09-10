@extends('layout.users.master')
@section('content') 
    <!-- CONTENT START -->
    <div class="page-content-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid px-4 pb-4">
                
                <div class="wallet-wrapper">
                    <!-- LINK START -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="{{ url('/users/dashboard') }}" class="text-primary">Home</a></li>
                            <li class="mx-3  d-flex align-items-center">
                                <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.21749 3.11406C5.22417 4.12074 5.25773 5.73205 4.31816 6.77904L4.21749 6.88529L1.47119 9.47108C1.21084 9.73143 0.788734 9.73143 0.528385 9.47108C0.288062 9.23076 0.269576 8.8526 0.472926 8.59107L0.528385 8.52827L3.27468 5.94248C3.76797 5.44919 3.79393 4.66553 3.35257 4.14168L3.27468 4.05687L0.528385 1.47108C0.268035 1.21073 0.268035 0.78862 0.528385 0.52827C0.768707 0.287947 1.14686 0.269461 1.40839 0.472811L1.47119 0.52827L4.21749 3.11406Z" fill="#21333B"/>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void()">List of Wallets</a></li> 
                        </ol>
                    </nav>
                    <!-- LINK END -->

                    <!-- WALLETS START -->
                    <ul class="wallet-items d-flex flex-wrap justify-content-start list-unstyled mt-5" id="wallets_list">
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
                        </li> -->
                    </ul>
                    <!-- WALLETS END -->
                </div>

            </div>
        </div>  
    </div>
    <!-- CONTENT END -->
@endsection