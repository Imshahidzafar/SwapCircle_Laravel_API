@extends('layout.users.master')
@section('content')
    <!-- CONTENT START -->
    <div class="page-content-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid px-4 pb-4">

                <div class="wallet-wrapper">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-2">
                        <h3 class="fw-bold sub-heading text-black">Track rates of currencies</h3>
                    </div>
                   <!-- CATEGORIES -->
                    <div class="wallet-tabs">
                        <ul class="nav nav-pills me-auto mb-5" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-buy" type="button" role="tab" aria-controls="pills-buy" aria-selected="false">Buy</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-sell" type="button" role="tab" aria-controls="pills-sell" aria-selected="false">Sell</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">

                            <!-- BUY START -->
                            <div class="tab-pane fade show active" id="pills-buy" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6 mx-auto mb-0">
                                       <div class="card bg-transparent rate-box-top mb-4">
                                        <div class="card-body px-4">
                                            <div class="d-flex justify-content-between align-items-end mb-4">
                                                <h4 class="fw-bold mb-3" id="buy_from_currency_code">USD</h4>
                                                <!-- <svg width="25" height="26" class="pe-1" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.32999 8.70979C6.49593 8.70979 8.25178 6.95394 8.25178 4.788C8.25178 2.62206 6.49593 0.866211 4.32999 0.866211C2.16405 0.866211 0.408203 2.62206 0.408203 4.788C0.408203 6.95394 2.16405 8.70979 4.32999 8.70979ZM27.8607 8.70979C30.0267 8.70979 31.7825 6.95394 31.7825 4.788C31.7825 2.62206 30.0267 0.866211 27.8607 0.866211C25.6948 0.866211 23.9389 2.62206 23.9389 4.788C23.9389 6.95394 25.6948 8.70979 27.8607 8.70979ZM8.25178 28.3187C8.25178 30.4847 6.49593 32.2405 4.32999 32.2405C2.16405 32.2405 0.408203 30.4847 0.408203 28.3187C0.408203 26.1528 2.16405 24.3969 4.32999 24.3969C6.49593 24.3969 8.25178 26.1528 8.25178 28.3187ZM27.8607 32.2405C30.0267 32.2405 31.7825 30.4847 31.7825 28.3187C31.7825 26.1528 30.0267 24.3969 27.8607 24.3969C25.6948 24.3969 23.9389 26.1528 23.9389 28.3187C23.9389 30.4847 25.6948 32.2405 27.8607 32.2405Z" fill="#D3D5DA"/>
                                                </svg> -->
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center" id="select_tag">
                                                    <select class="w-auto form-select-lg mb-0 border-0 bg-transparent fw-normal track-title" aria-label=".form-select-lg example" id="buy_from_currency">
                                                        <option symbol="$" value="2" disabled selected hidden>$</option>
                                                        <!-- <option value="2">£</option> -->
                                                    </select>
                                                    <!-- ENTERED AMOUNT -->
                                                    <input type="text" class="form-control sub-heading text-black fw-bold mb-0" placeholder="enter amount" id="buy_entered_amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                    <!-- <p class="sub-heading text-black fw-bold mb-0 track-title">$156<span class="text-primary">.50</span><span class="text-success"> |</span></p> -->
                                                </div>
                                                <!-- <a href="#">
                                                    <svg width="35" height="35" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="6.44727" y="4.14551" width="35.2961" height="39.2179" rx="6" fill="#A6EBB8"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2905 13.9893C14.2905 12.8847 15.186 11.9893 16.2905 11.9893H31.8995C33.004 11.9893 33.8995 12.8847 33.8995 13.9893V17.8328C33.8995 18.9374 33.004 19.8328 31.8995 19.8328H16.2905C15.186 19.8328 14.2905 18.9374 14.2905 17.8328V13.9893ZM18.2123 25.7155C18.2123 26.7985 17.3344 27.6764 16.2514 27.6764C15.1684 27.6764 14.2905 26.7985 14.2905 25.7155C14.2905 24.6325 15.1684 23.7546 16.2514 23.7546C17.3344 23.7546 18.2123 24.6325 18.2123 25.7155ZM24.095 27.6764C25.178 27.6764 26.0559 26.7985 26.0559 25.7155C26.0559 24.6325 25.178 23.7546 24.095 23.7546C23.012 23.7546 22.1341 24.6325 22.1341 25.7155C22.1341 26.7985 23.012 27.6764 24.095 27.6764ZM33.8995 25.7155C33.8995 26.7985 33.0215 27.6764 31.9386 27.6764C30.8556 27.6764 29.9777 26.7985 29.9777 25.7155C29.9777 24.6325 30.8556 23.7546 31.9386 23.7546C33.0215 23.7546 33.8995 24.6325 33.8995 25.7155ZM16.2514 35.52C17.3344 35.52 18.2123 34.6421 18.2123 33.5591C18.2123 32.4761 17.3344 31.5982 16.2514 31.5982C15.1684 31.5982 14.2905 32.4761 14.2905 33.5591C14.2905 34.6421 15.1684 35.52 16.2514 35.52ZM26.0559 33.5591C26.0559 34.6421 25.178 35.52 24.095 35.52C23.012 35.52 22.1341 34.6421 22.1341 33.5591C22.1341 32.4761 23.012 31.5982 24.095 31.5982C25.178 31.5982 26.0559 32.4761 26.0559 33.5591ZM31.9386 35.52C33.0215 35.52 33.8995 34.6421 33.8995 33.5591C33.8995 32.4761 33.0215 31.5982 31.9386 31.5982C30.8556 31.5982 29.9777 32.4761 29.9777 33.5591C29.9777 34.6421 30.8556 35.52 31.9386 35.52Z" fill="black"/>
                                                    </svg>
                                                </a> -->
                                            </div>
                                        </div>
                                        <div class="half-circle-top"></div>
                                       </div> 
                                       <div class="position-relative">
                                        <a href="#" class="track-btn"><img src="{{ url('/public/users/assets/images/icons/Repeat.svg') }}" alt="" srcset=""></a>
                                        </div>                                         
                                       <div class="card border-0 rate-box-bottom">
                                        <div class="half-circle-top bottom"></div>
                                        <div class="card-body px-4 pt-0">
                                            <div class="d-flex justify-content-between align-items-end mb-4">
                                                <h4 class="fw-bold mb-3" id="buy_to_currency_code">EUR</h4>
                                                <!-- <svg width="25" height="26" class="pe-1" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.32999 8.70979C6.49593 8.70979 8.25178 6.95394 8.25178 4.788C8.25178 2.62206 6.49593 0.866211 4.32999 0.866211C2.16405 0.866211 0.408203 2.62206 0.408203 4.788C0.408203 6.95394 2.16405 8.70979 4.32999 8.70979ZM27.8607 8.70979C30.0267 8.70979 31.7825 6.95394 31.7825 4.788C31.7825 2.62206 30.0267 0.866211 27.8607 0.866211C25.6948 0.866211 23.9389 2.62206 23.9389 4.788C23.9389 6.95394 25.6948 8.70979 27.8607 8.70979ZM8.25178 28.3187C8.25178 30.4847 6.49593 32.2405 4.32999 32.2405C2.16405 32.2405 0.408203 30.4847 0.408203 28.3187C0.408203 26.1528 2.16405 24.3969 4.32999 24.3969C6.49593 24.3969 8.25178 26.1528 8.25178 28.3187ZM27.8607 32.2405C30.0267 32.2405 31.7825 30.4847 31.7825 28.3187C31.7825 26.1528 30.0267 24.3969 27.8607 24.3969C25.6948 24.3969 23.9389 26.1528 23.9389 28.3187C23.9389 30.4847 25.6948 32.2405 27.8607 32.2405Z" fill="#D3D5DA"/>
                                                </svg> -->
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="d-flex align-items-center" id="select_tag">
                                                    <select class="w-auto form-select-lg mb-0 border-0 bg-transparent fw-normal track-title" aria-label=".form-select-lg example" id="buy_to_currency">
                                                        <option symbol="€"value="11" disabled selected hidden>€</option>
                                                        <!-- <option value="1">$</option> -->
                                                    </select>
                                                    <!-- CONVERTED AMOUNT -->
                                                    <p class="sub-heading text-black fw-bold mb-0 track-title" id="buy_converted_amount"></p>
                                                </div>
                                                <!-- <a href="#">
                                                    <svg width="35" height="35" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="6.44727" y="4.14551" width="35.2961" height="39.2179" rx="6" fill="#A6EBB8"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2905 13.9893C14.2905 12.8847 15.186 11.9893 16.2905 11.9893H31.8995C33.004 11.9893 33.8995 12.8847 33.8995 13.9893V17.8328C33.8995 18.9374 33.004 19.8328 31.8995 19.8328H16.2905C15.186 19.8328 14.2905 18.9374 14.2905 17.8328V13.9893ZM18.2123 25.7155C18.2123 26.7985 17.3344 27.6764 16.2514 27.6764C15.1684 27.6764 14.2905 26.7985 14.2905 25.7155C14.2905 24.6325 15.1684 23.7546 16.2514 23.7546C17.3344 23.7546 18.2123 24.6325 18.2123 25.7155ZM24.095 27.6764C25.178 27.6764 26.0559 26.7985 26.0559 25.7155C26.0559 24.6325 25.178 23.7546 24.095 23.7546C23.012 23.7546 22.1341 24.6325 22.1341 25.7155C22.1341 26.7985 23.012 27.6764 24.095 27.6764ZM33.8995 25.7155C33.8995 26.7985 33.0215 27.6764 31.9386 27.6764C30.8556 27.6764 29.9777 26.7985 29.9777 25.7155C29.9777 24.6325 30.8556 23.7546 31.9386 23.7546C33.0215 23.7546 33.8995 24.6325 33.8995 25.7155ZM16.2514 35.52C17.3344 35.52 18.2123 34.6421 18.2123 33.5591C18.2123 32.4761 17.3344 31.5982 16.2514 31.5982C15.1684 31.5982 14.2905 32.4761 14.2905 33.5591C14.2905 34.6421 15.1684 35.52 16.2514 35.52ZM26.0559 33.5591C26.0559 34.6421 25.178 35.52 24.095 35.52C23.012 35.52 22.1341 34.6421 22.1341 33.5591C22.1341 32.4761 23.012 31.5982 24.095 31.5982C25.178 31.5982 26.0559 32.4761 26.0559 33.5591ZM31.9386 35.52C33.0215 35.52 33.8995 34.6421 33.8995 33.5591C33.8995 32.4761 33.0215 31.5982 31.9386 31.5982C30.8556 31.5982 29.9777 32.4761 29.9777 33.5591C29.9777 34.6421 30.8556 35.52 31.9386 35.52Z" fill="black"/>
                                                    </svg>
                                                </a> -->
                                            </div>
                                        </div>
                                       </div> 
                                       <div class="d-inline-flex pt-5">
                                            <!-- Entered AMOUNT -->
                                            <div class="mb-0 text-danger d-flex px-5" id="buy_entered_amount2">
                                                <!--<span class="plane-icon bg-danger me-1">
                                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                </span>
                                                <span>$10.50</span> -->
                                            </div>
                                            <!-- CONVERTED AMOUNT -->
                                            <div class="mb-0 text-success d-flex px-5" id="buy_converted_amount2"> 
                                                <!-- <span class="plane-icon bg-primary me-1">
                                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                </span>
                                                <span>$10.50</span> -->
                                            </div>
                                            <!-- BASE AMOUNT -->
                                            <div class="mb-0 text-black d-flex px-5" id="buy_base_amount">
                                                <!-- <span class="plane-icon bg-black me-1">
                                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                </span>
                                                <span>$10.50</span> -->
                                            </div> 
                                        </div>                                         
                                    </div>
                                    <div class="col-12  mt-5">
                                        <a href="{{ url('/users/billing_payment') }}" class="btn btn-login btn-primary w-100">Buy APPL</a>
                                    </div>
                                </div>
                            </div>
                            <!-- BUY END -->
                            
                            <!-- SELL START -->
                            <div class="tab-pane fade" id="pills-sell" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-lg-6 mx-auto mb-0">
                                       <div class="card bg-transparent rate-box-top mb-4">
                                        <div class="card-body px-4">
                                            <div class="d-flex justify-content-between align-items-end mb-4">
                                                <h4 class="fw-bold mb-3" id="sell_from_currency_code">USD</h4>
                                                <!-- <svg width="25" height="26" class="pe-1" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.32999 8.70979C6.49593 8.70979 8.25178 6.95394 8.25178 4.788C8.25178 2.62206 6.49593 0.866211 4.32999 0.866211C2.16405 0.866211 0.408203 2.62206 0.408203 4.788C0.408203 6.95394 2.16405 8.70979 4.32999 8.70979ZM27.8607 8.70979C30.0267 8.70979 31.7825 6.95394 31.7825 4.788C31.7825 2.62206 30.0267 0.866211 27.8607 0.866211C25.6948 0.866211 23.9389 2.62206 23.9389 4.788C23.9389 6.95394 25.6948 8.70979 27.8607 8.70979ZM8.25178 28.3187C8.25178 30.4847 6.49593 32.2405 4.32999 32.2405C2.16405 32.2405 0.408203 30.4847 0.408203 28.3187C0.408203 26.1528 2.16405 24.3969 4.32999 24.3969C6.49593 24.3969 8.25178 26.1528 8.25178 28.3187ZM27.8607 32.2405C30.0267 32.2405 31.7825 30.4847 31.7825 28.3187C31.7825 26.1528 30.0267 24.3969 27.8607 24.3969C25.6948 24.3969 23.9389 26.1528 23.9389 28.3187C23.9389 30.4847 25.6948 32.2405 27.8607 32.2405Z" fill="#D3D5DA"/>
                                                </svg> -->
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center" id="select_tag">
                                                    <select class="w-auto form-select-lg mb-0 border-0 bg-transparent fw-normal track-title" aria-label=".form-select-lg example" id="sell_from_currency">
                                                        <option symbol="$" value="2" disabled selected hidden>$</option>
                                                        <!-- <option value="2">£</option> -->
                                                    </select>
                                                    <!-- ENTERED AMOUNT -->
                                                    <input type="text" class="form-control" placeholder="enter amount" id="sell_entered_amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                    <!-- <p class="sub-heading text-black fw-bold mb-0 track-title">$156<span class="text-primary">.50</span><span class="text-success"> |</span></p> -->
                                                </div>
                                                <!-- <a href="#">
                                                    <svg width="35" height="35" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="6.44727" y="4.14551" width="35.2961" height="39.2179" rx="6" fill="#A6EBB8"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2905 13.9893C14.2905 12.8847 15.186 11.9893 16.2905 11.9893H31.8995C33.004 11.9893 33.8995 12.8847 33.8995 13.9893V17.8328C33.8995 18.9374 33.004 19.8328 31.8995 19.8328H16.2905C15.186 19.8328 14.2905 18.9374 14.2905 17.8328V13.9893ZM18.2123 25.7155C18.2123 26.7985 17.3344 27.6764 16.2514 27.6764C15.1684 27.6764 14.2905 26.7985 14.2905 25.7155C14.2905 24.6325 15.1684 23.7546 16.2514 23.7546C17.3344 23.7546 18.2123 24.6325 18.2123 25.7155ZM24.095 27.6764C25.178 27.6764 26.0559 26.7985 26.0559 25.7155C26.0559 24.6325 25.178 23.7546 24.095 23.7546C23.012 23.7546 22.1341 24.6325 22.1341 25.7155C22.1341 26.7985 23.012 27.6764 24.095 27.6764ZM33.8995 25.7155C33.8995 26.7985 33.0215 27.6764 31.9386 27.6764C30.8556 27.6764 29.9777 26.7985 29.9777 25.7155C29.9777 24.6325 30.8556 23.7546 31.9386 23.7546C33.0215 23.7546 33.8995 24.6325 33.8995 25.7155ZM16.2514 35.52C17.3344 35.52 18.2123 34.6421 18.2123 33.5591C18.2123 32.4761 17.3344 31.5982 16.2514 31.5982C15.1684 31.5982 14.2905 32.4761 14.2905 33.5591C14.2905 34.6421 15.1684 35.52 16.2514 35.52ZM26.0559 33.5591C26.0559 34.6421 25.178 35.52 24.095 35.52C23.012 35.52 22.1341 34.6421 22.1341 33.5591C22.1341 32.4761 23.012 31.5982 24.095 31.5982C25.178 31.5982 26.0559 32.4761 26.0559 33.5591ZM31.9386 35.52C33.0215 35.52 33.8995 34.6421 33.8995 33.5591C33.8995 32.4761 33.0215 31.5982 31.9386 31.5982C30.8556 31.5982 29.9777 32.4761 29.9777 33.5591C29.9777 34.6421 30.8556 35.52 31.9386 35.52Z" fill="black"/>
                                                    </svg>
                                                </a> -->
                                            </div>
                                        </div>
                                        <div class="half-circle-top"></div>
                                       </div> 
                                       <div class="position-relative">
                                        <a href="#" class="track-btn"><img src="{{ url('/public/users/assets/images/icons/Repeat.svg') }}" alt="" srcset=""></a>
                                        </div>                                         
                                       <div class="card border-0 rate-box-bottom">
                                        <div class="half-circle-top bottom"></div>
                                        <div class="card-body px-4 pt-0">
                                            <div class="d-flex justify-content-between align-items-end mb-4">
                                                <h4 class="fw-bold mb-3" id="sell_to_currency_code">EUR</h4>
                                                <!-- <svg width="25" height="26" class="pe-1" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.32999 8.70979C6.49593 8.70979 8.25178 6.95394 8.25178 4.788C8.25178 2.62206 6.49593 0.866211 4.32999 0.866211C2.16405 0.866211 0.408203 2.62206 0.408203 4.788C0.408203 6.95394 2.16405 8.70979 4.32999 8.70979ZM27.8607 8.70979C30.0267 8.70979 31.7825 6.95394 31.7825 4.788C31.7825 2.62206 30.0267 0.866211 27.8607 0.866211C25.6948 0.866211 23.9389 2.62206 23.9389 4.788C23.9389 6.95394 25.6948 8.70979 27.8607 8.70979ZM8.25178 28.3187C8.25178 30.4847 6.49593 32.2405 4.32999 32.2405C2.16405 32.2405 0.408203 30.4847 0.408203 28.3187C0.408203 26.1528 2.16405 24.3969 4.32999 24.3969C6.49593 24.3969 8.25178 26.1528 8.25178 28.3187ZM27.8607 32.2405C30.0267 32.2405 31.7825 30.4847 31.7825 28.3187C31.7825 26.1528 30.0267 24.3969 27.8607 24.3969C25.6948 24.3969 23.9389 26.1528 23.9389 28.3187C23.9389 30.4847 25.6948 32.2405 27.8607 32.2405Z" fill="#D3D5DA"/>
                                                </svg> -->
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="d-flex align-items-center" id="select_tag">
                                                    <select class="w-auto form-select-lg mb-0 border-0 bg-transparent fw-normal track-title" aria-label=".form-select-lg example" id="sell_to_currency">
                                                        <option symbol="€" value="11" disabled selected hidden>€</option>
                                                        <!-- <option value="1">$</option> -->
                                                    </select>
                                                    <!-- CONVERTED AMOUNT -->
                                                    <p class="sub-heading text-black fw-bold mb-0 track-title" id="sell_converted_amount"></p>
                                                </div>
                                                <!-- <a href="#">
                                                    <svg width="35" height="35" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="6.44727" y="4.14551" width="35.2961" height="39.2179" rx="6" fill="#A6EBB8"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2905 13.9893C14.2905 12.8847 15.186 11.9893 16.2905 11.9893H31.8995C33.004 11.9893 33.8995 12.8847 33.8995 13.9893V17.8328C33.8995 18.9374 33.004 19.8328 31.8995 19.8328H16.2905C15.186 19.8328 14.2905 18.9374 14.2905 17.8328V13.9893ZM18.2123 25.7155C18.2123 26.7985 17.3344 27.6764 16.2514 27.6764C15.1684 27.6764 14.2905 26.7985 14.2905 25.7155C14.2905 24.6325 15.1684 23.7546 16.2514 23.7546C17.3344 23.7546 18.2123 24.6325 18.2123 25.7155ZM24.095 27.6764C25.178 27.6764 26.0559 26.7985 26.0559 25.7155C26.0559 24.6325 25.178 23.7546 24.095 23.7546C23.012 23.7546 22.1341 24.6325 22.1341 25.7155C22.1341 26.7985 23.012 27.6764 24.095 27.6764ZM33.8995 25.7155C33.8995 26.7985 33.0215 27.6764 31.9386 27.6764C30.8556 27.6764 29.9777 26.7985 29.9777 25.7155C29.9777 24.6325 30.8556 23.7546 31.9386 23.7546C33.0215 23.7546 33.8995 24.6325 33.8995 25.7155ZM16.2514 35.52C17.3344 35.52 18.2123 34.6421 18.2123 33.5591C18.2123 32.4761 17.3344 31.5982 16.2514 31.5982C15.1684 31.5982 14.2905 32.4761 14.2905 33.5591C14.2905 34.6421 15.1684 35.52 16.2514 35.52ZM26.0559 33.5591C26.0559 34.6421 25.178 35.52 24.095 35.52C23.012 35.52 22.1341 34.6421 22.1341 33.5591C22.1341 32.4761 23.012 31.5982 24.095 31.5982C25.178 31.5982 26.0559 32.4761 26.0559 33.5591ZM31.9386 35.52C33.0215 35.52 33.8995 34.6421 33.8995 33.5591C33.8995 32.4761 33.0215 31.5982 31.9386 31.5982C30.8556 31.5982 29.9777 32.4761 29.9777 33.5591C29.9777 34.6421 30.8556 35.52 31.9386 35.52Z" fill="black"/>
                                                    </svg>
                                                </a> -->
                                            </div>
                                        </div>
                                       </div> 
                                       <div class="d-inline-flex pt-5">
                                            <!-- Entered AMOUNT -->
                                            <div class="mb-0 text-danger d-flex px-5" id="sell_entered_amount2">
                                                <!--<span class="plane-icon bg-danger me-1">
                                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/send-down.png') }}" alt="">
                                                </span>
                                                <span>$10.50</span> -->
                                            </div>
                                            <!-- CONVERTED AMOUNT -->
                                            <div class="mb-0 text-success d-flex px-5" id="sell_converted_amount2"> 
                                                <!-- <span class="plane-icon bg-primary me-1">
                                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/send.png') }}" alt="">
                                                </span>
                                                <span>$10.50</span> -->
                                            </div>
                                            <!-- BASE AMOUNT -->
                                            <div class="mb-0 text-black d-flex px-5" id="sell_base_amount">
                                                <!-- <span class="plane-icon bg-black me-1">
                                                    <img src="{{ url('/public/users/assets/images/icons/mini-icon/account_balance.png') }}" alt="">
                                                </span>
                                                <span>$10.50</span> -->
                                            </div> 
                                        </div>                                         
                                    </div>
                                    <div class="col-12  mt-5">
                                        <a href="{{ url('/users/billing_payment') }}" class="btn btn-login btn-primary w-100">Buy APPL</a>
                                    </div>
                                </div>
                            </div>
                            <!-- SELL END -->
                           
                        </div>
                    </div> 
                </div>
            </div>
        </div> 
    </div>
    <!-- CONTENT END -->
@endsection