@extends('layout.users.master')
@section('content')
    <!-- CONTENT START -->
    <div class="page-content-wrapper"> 
        <div class="page-content-tab">
            <div class="container-fluid px-4 pb-4">
                <div class="connects-wrapper">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                        <h3 class="fw-bold sub-heading text-black"><span class="text-success">Swap Circle</span> Connect</h3>
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="" role="button" id="navbarDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                               <img src="{{ url('/public/users/assets/images/icons/filter.png') }}" class="img-fluid" alt="" srcset="">
                            </a>

                            <ul class="dropdown-menu position-absolute  mt-3 dropdown-menu-end" aria-labelledby="navbarDropdown2">
                                <li><a href="#" class="dropdown-item fw-bold py-2">Today</a></li>
                                <li><a href="#" class="dropdown-item fw-bold py-2">Week</a></li>
                                <li><a href="#" class="dropdown-item fw-bold py-2">Month</a></li>
                            </ul>
                        </div> -->
                    </div>
                    <!-- CONNECT CATEGORIES START -->
                    <div class="d-flex flex-wrap align-items-center gap-4" id="connect_categories">
                        <!--<div class="connects-category">
                            <div class="connects-item">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.8693 30.8072H11.3239C6.81568 30.8072 5.0625 29.054 5.0625 24.5458V14.0004C5.0625 13.4599 5.51068 13.0117 6.05114 13.0117H27.142C27.6825 13.0117 28.1307 13.4599 28.1307 14.0004V24.5458C28.1307 29.054 26.3775 30.8072 21.8693 30.8072ZM7.03977 14.989V24.5458C7.03977 27.9467 7.92295 28.8299 11.3239 28.8299H21.8693C25.2702 28.8299 26.1534 27.9467 26.1534 24.5458V14.989H7.03977Z" fill="#A6EBB8"/>
                                    <path d="M26.5227 14.9891H6.75C4.44318 14.9891 3.125 13.6709 3.125 11.3641V10.0459C3.125 7.73908 4.44318 6.4209 6.75 6.4209H26.5227C28.7636 6.4209 30.1477 7.80499 30.1477 10.0459V11.3641C30.1477 13.605 28.7636 14.9891 26.5227 14.9891ZM6.75 8.39817C5.55045 8.39817 5.10227 8.84635 5.10227 10.0459V11.3641C5.10227 12.5636 5.55045 13.0118 6.75 13.0118H26.5227C27.6827 13.0118 28.1705 12.5241 28.1705 11.3641V10.0459C28.1705 8.8859 27.6827 8.39817 26.5227 8.39817H6.75Z" fill="#A6EBB8"/>
                                    <path d="M16.162 8.39788H8.88562C8.6088 8.39788 8.34517 8.27925 8.16062 8.08152C7.35653 7.19834 7.3829 5.84061 8.22653 4.99697L10.0984 3.12516C10.9683 2.25516 12.4052 2.25516 13.2752 3.12516L16.8606 6.71061C17.1374 6.98743 17.2297 7.42243 17.0715 7.79152C16.9265 8.16061 16.5706 8.39788 16.162 8.39788ZM9.61062 6.42061H13.7893L11.8779 4.52243C11.7724 4.41697 11.6011 4.41697 11.4956 4.52243L9.6238 6.39425C9.6238 6.40743 9.61062 6.40743 9.61062 6.42061Z" fill="#A6EBB8"/>
                                    <path d="M24.3744 8.39788H17.098C16.7026 8.39788 16.3335 8.16061 16.1885 7.79152C16.0303 7.42243 16.1226 7.00061 16.3994 6.71061L19.9848 3.12516C20.8548 2.25516 22.2917 2.25516 23.1617 3.12516L25.0335 4.99697C25.8771 5.84061 25.9167 7.19834 25.0994 8.08152C24.9148 8.27925 24.6512 8.39788 24.3744 8.39788ZM19.4971 6.42061H23.6757C23.6626 6.40743 23.6626 6.40743 23.6494 6.39425L21.7776 4.52243C21.6721 4.41697 21.5007 4.41697 21.3953 4.52243L19.4971 6.42061Z" fill="#A6EBB8"/>
                                    <path d="M13.9211 23.0958C13.552 23.0958 13.1697 23.0035 12.827 22.819C12.0756 22.4104 11.6143 21.6326 11.6143 20.789V14.0004C11.6143 13.4599 12.0624 13.0117 12.6029 13.0117H20.5647C21.1052 13.0117 21.5533 13.4599 21.5533 14.0004V20.7626C21.5533 21.6194 21.092 22.3972 20.3406 22.7926C19.5893 23.2013 18.6797 23.1485 17.9679 22.674L16.7947 21.8831C16.6893 21.804 16.5443 21.804 16.4256 21.8831L15.1865 22.7004C14.8043 22.964 14.3561 23.0958 13.9211 23.0958ZM13.5915 14.989V20.7758C13.5915 20.9472 13.697 21.0263 13.7629 21.0658C13.8288 21.1054 13.9606 21.1449 14.1056 21.0526L15.3447 20.2354C16.1224 19.7213 17.1243 19.7213 17.8888 20.2354L19.062 21.0263C19.207 21.1185 19.3388 21.079 19.4047 21.0394C19.4706 20.9999 19.5761 20.9208 19.5761 20.7494V14.9758H13.5915V14.989Z" fill="#A6EBB8"/>
                                </svg>
                            </div>
                            <div class="connects-item-name text-center mt-1">
                                <small>Travel</small>
                            </div>
                        </div>
                        <div class="connects-item">
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5443 30.1472C15.4634 30.1472 14.3824 29.8045 13.4861 29.1322L6.61836 23.9913C5.33972 23.0291 4.5752 21.5 4.5752 19.905V3.1377H28.5133V19.905C28.5133 21.5 27.7488 23.0291 26.4702 23.9913L19.6025 29.1322C18.7061 29.8045 17.6252 30.1472 16.5443 30.1472ZM6.55247 5.10179V19.8918C6.55247 20.8673 7.02699 21.8032 7.80472 22.3963L14.6724 27.5373C15.7797 28.3677 17.322 28.3677 18.4293 27.5373L25.297 22.3963C26.0747 21.8032 26.5493 20.8673 26.5493 19.8918V5.10179H6.55247Z" fill="#A6EBB8"/>
                                <path d="M29.7263 5.10227H3.36266C2.82221 5.10227 2.37402 4.65409 2.37402 4.11364C2.37402 3.57318 2.82221 3.125 3.36266 3.125H29.7263C30.2668 3.125 30.7149 3.57318 30.7149 4.11364C30.7149 4.65409 30.2668 5.10227 29.7263 5.10227Z" fill="#A6EBB8"/>
                                <path d="M21.8173 12.3523H11.2718C10.7314 12.3523 10.2832 11.9041 10.2832 11.3636C10.2832 10.8232 10.7314 10.375 11.2718 10.375H21.8173C22.3577 10.375 22.8059 10.8232 22.8059 11.3636C22.8059 11.9041 22.3577 12.3523 21.8173 12.3523Z" fill="#A6EBB8"/>
                                <path d="M21.8173 18.9431H11.2718C10.7314 18.9431 10.2832 18.4949 10.2832 17.9545C10.2832 17.414 10.7314 16.9658 11.2718 16.9658H21.8173C22.3577 16.9658 22.8059 17.414 22.8059 17.9545C22.8059 18.4949 22.3577 18.9431 21.8173 18.9431Z" fill="#A6EBB8"/>
                            </svg>      
                        </div>
                        <div class="connects-item">
                            <svg width="27" height="29" viewBox="0 0 27 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.53994 27.4095L12.6113 24.8259C13.0727 24.4304 13.8372 24.4304 14.2986 24.8259L17.3699 27.4095C18.0818 27.7654 18.9518 27.4095 19.2154 26.645L19.7954 24.8918C19.9404 24.47 19.7954 23.8504 19.479 23.534L16.4868 20.5286C16.2627 20.3177 16.0913 19.8959 16.0913 19.5927V15.8359C16.0913 15.2822 16.4999 15.0186 17.014 15.2295L23.4863 18.024C24.5013 18.459 25.3318 17.9186 25.3318 16.8113V15.1109C25.3318 14.2277 24.6727 13.2127 23.8554 12.87L16.4868 9.69314C16.2759 9.60087 16.0913 9.32405 16.0913 9.08678V5.13223C16.0913 3.89314 15.1818 2.42996 14.0745 1.86314C13.679 1.66541 13.2177 1.66541 12.8222 1.86314C11.7149 2.42996 10.8054 3.90632 10.8054 5.14541V9.09996C10.8054 9.33723 10.6209 9.61405 10.4099 9.70632L3.05449 12.8831C2.23722 13.2127 1.57812 14.2277 1.57812 15.1109V16.8113C1.57812 17.9186 2.40858 18.459 3.42358 18.024L9.89585 15.2295C10.3968 15.0054 10.8186 15.2822 10.8186 15.8359V19.5927C10.8186 19.8959 10.6472 20.3177 10.4363 20.5286L7.44403 23.534C7.12767 23.8504 6.98267 24.4568 7.12767 24.8918L7.70767 26.645C7.94494 27.4095 8.81494 27.7786 9.53994 27.4095Z" stroke="#A6EBB8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="connects-item">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M26.2295 7.99312H12.0564L10.6012 4.82948H10.8859C11.2339 4.82948 11.5186 4.54475 11.5186 4.19675V1.03312C11.5186 0.685118 11.2339 0.400391 10.8859 0.400391H3.29318C2.94518 0.400391 2.66045 0.685118 2.66045 1.03312V4.19675C2.66045 4.54475 2.94518 4.82948 3.29318 4.82948H3.5779L0.509175 11.5364C0.509175 11.568 0.509175 11.568 0.477539 11.5997C0.477539 11.6313 0.477539 11.6313 0.477539 11.6629C0.477539 11.6946 0.477539 11.6946 0.477539 11.7262C0.477539 11.7578 0.477539 11.7895 0.477539 11.7895V26.3422C0.477539 26.6902 0.762266 26.9749 1.11027 26.9749H11.9299C12.531 28.1138 13.7332 28.8731 15.0935 28.8731H15.7579C16.2641 28.8731 16.7703 28.7782 17.2448 28.5568C17.7194 28.7466 18.1939 28.8731 18.7317 28.8731H19.3961C20.7881 28.8731 21.9903 28.1138 22.5597 26.9749H26.2928C26.6408 26.9749 26.9255 26.6902 26.9255 26.3422V13.308C28.0961 13.0233 28.9819 11.9477 28.9819 10.6822C28.9186 9.1953 27.7164 7.99312 26.2295 7.99312ZM3.9259 1.66585H10.2532V3.56403H3.9259V1.66585ZM12.4677 20.5211C11.8666 21.1538 11.5186 21.9764 11.5186 22.8622V25.3931C11.5186 25.488 11.5186 25.6146 11.5186 25.7095H1.71136V15.3644L3.29318 14.6051L3.35645 14.5735C4.08408 14.2255 4.87499 14.0989 5.6659 14.2255C6.07718 14.2888 6.45681 14.3837 6.83645 14.5735C8.29172 15.2695 9.93681 15.2695 11.3921 14.5735L12.4994 14.0357V20.5211H12.4677ZM12.4677 12.6437L10.8859 13.4029L10.8226 13.4346C10.095 13.7826 9.30408 13.9091 8.51318 13.7826C8.1019 13.7193 7.72227 13.6244 7.34263 13.4346C5.88736 12.7386 4.24227 12.7386 2.78699 13.4346L1.71136 13.9408V11.916L1.77463 11.7895L4.9699 4.82948H9.20918L12.4044 11.7895L12.4677 11.916V12.6437ZM21.6423 25.3931C21.6423 26.6269 20.5983 27.6077 19.3328 27.6077H18.6684C18.2572 27.6077 17.8459 27.5128 17.4979 27.2913C17.403 27.228 17.3081 27.228 17.1815 27.228C17.055 27.228 16.9601 27.2597 16.8652 27.2913C16.5172 27.4811 16.1059 27.6077 15.6946 27.6077H15.0303C13.7648 27.6077 12.7208 26.6269 12.7208 25.3931V22.8622C12.7208 21.6284 13.7648 20.6477 15.0303 20.6477H15.6946C15.9794 20.6477 16.2641 20.7109 16.5488 20.8058V21.5968C16.5488 21.9448 16.8335 22.2295 17.1815 22.2295C17.5295 22.2295 17.8143 21.9448 17.8143 21.5968V20.8058C18.0674 20.7109 18.3521 20.6477 18.6684 20.6477H19.3328C20.5983 20.6477 21.6423 21.6284 21.6423 22.8622V25.3931ZM26.2295 12.1058C25.8815 12.1058 25.5968 12.3906 25.5968 12.7386V25.7095H22.9077C22.9077 25.6146 22.9077 25.488 22.9077 25.3931V22.8622C22.9077 20.9324 21.2943 19.3822 19.3328 19.3822H18.6684C18.3837 19.3822 18.099 19.4138 17.8143 19.4771V18.7495C17.8143 18.0535 18.3837 17.484 19.0797 17.484C19.4277 17.484 19.7124 17.1993 19.7124 16.8513C19.7124 16.5033 19.4277 16.2186 19.0797 16.2186C17.6877 16.2186 16.5488 17.3575 16.5488 18.7495V19.4771C16.2641 19.4138 15.9794 19.3822 15.6946 19.3822H15.0303C14.5557 19.3822 14.0812 19.4771 13.6699 19.6353V11.7895C13.6699 11.7578 13.6699 11.7578 13.6699 11.7262C13.6699 11.6946 13.6699 11.6946 13.6699 11.6629C13.6699 11.6313 13.6699 11.6313 13.6699 11.5997C13.6699 11.568 13.6699 11.568 13.6383 11.5364L12.6259 9.25857H26.2295C27.0204 9.25857 27.6532 9.8913 27.6532 10.6822C27.6532 11.4731 27.0204 12.1058 26.2295 12.1058ZM7.08954 16.8513C5.50772 16.8513 4.24227 18.1168 4.24227 19.6986C4.24227 21.2804 5.50772 22.5458 7.08954 22.5458C8.67136 22.5458 9.93681 21.2804 9.93681 19.6986C9.93681 18.1168 8.67136 16.8513 7.08954 16.8513ZM7.08954 21.2804C6.20372 21.2804 5.50772 20.5844 5.50772 19.6986C5.50772 18.8128 6.20372 18.1168 7.08954 18.1168C7.97536 18.1168 8.67136 18.8128 8.67136 19.6986C8.67136 20.5844 7.97536 21.2804 7.08954 21.2804Z" fill="#A6EBB8" stroke="#A6EBB8" stroke-width="0.5"/>
                            </svg>                                    
                        </div>
                        <div class="connects-item">
                            <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M29.2738 17.9552V23.2279C29.2738 27.8415 26.6374 29.8188 22.6829 29.8188H9.50107C5.54652 29.8188 2.91016 27.8415 2.91016 23.2279V17.9552C2.91016 14.462 4.42607 12.4848 6.8647 11.7334C7.65561 11.4829 8.53879 11.3643 9.50107 11.3643H22.6829C23.6452 11.3643 24.5283 11.4829 25.3192 11.7334C27.7579 12.4848 29.2738 14.462 29.2738 17.9552Z" stroke="#A6EBB8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M25.3188 10.0455V11.7329C24.5279 11.4824 23.6447 11.3637 22.6824 11.3637H9.50062C8.53835 11.3637 7.65517 11.4824 6.86426 11.7329V10.0455C6.86426 8.59554 8.05062 7.40918 9.50062 7.40918H22.6824C24.1324 7.40918 25.3188 8.59554 25.3188 10.0455Z" stroke="#A6EBB8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.3648 5.44555V7.40962H10.8193V5.44555C10.8193 4.35145 11.7157 3.45508 12.8098 3.45508H19.3743C20.4684 3.45508 21.3648 4.35145 21.3648 5.44555Z" stroke="#A6EBB8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.2293 26.4566C13.1902 26.4566 13.9693 25.6775 13.9693 24.7166C13.9693 23.7556 13.1902 22.9766 12.2293 22.9766C11.2683 22.9766 10.4893 23.7556 10.4893 24.7166C10.4893 25.6775 11.2683 26.4566 12.2293 26.4566Z" stroke="#A6EBB8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.3765 23.5566V16.7417C20.3765 15.2917 19.467 15.0808 18.5443 15.3444L15.0511 16.2934C14.4184 16.4648 13.9834 16.9657 13.9834 17.6907V18.9034V19.7208V24.7166" stroke="#A6EBB8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.6365 25.2964C19.5975 25.2964 20.3765 24.5174 20.3765 23.5564C20.3765 22.5954 19.5975 21.8164 18.6365 21.8164C17.6755 21.8164 16.8965 22.5954 16.8965 23.5564C16.8965 24.5174 17.6755 25.2964 18.6365 25.2964Z" stroke="#A6EBB8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.9834 19.7341L20.3765 17.9941" stroke="#A6EBB8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg> 
                        </div>
                        <div class="connects-item">
                            <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.8699 29.8187H19.7789C26.3698 29.8187 29.0062 27.1823 29.0062 20.5914V12.6824C29.0062 6.09144 26.3698 3.45508 19.7789 3.45508H11.8699C5.27894 3.45508 2.64258 6.09144 2.64258 12.6824V20.5914C2.64258 27.1823 5.27894 29.8187 11.8699 29.8187Z" stroke="#A6EBB8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.64258 17.5593L10.5517 17.533C11.5403 17.533 12.6476 18.2843 13.0167 19.207L14.5194 23.0034C14.8621 23.8602 15.4026 23.8602 15.7453 23.0034L18.7639 15.3448C19.0539 14.6066 19.5944 14.5802 19.9635 15.2789L21.3344 17.8757C21.743 18.6534 22.7976 19.2861 23.6676 19.2861H29.0194" stroke="#A6EBB8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                
                        </div> -->
                    </div>
                    <!-- CONNECT CATEGORIES END -->

                    <!-- MOST POPULAR START -->
                    <div class="most-popular mt-5">
                        <p class="fw-bold">Most Popular</p>
                        <!-- SLIDER START -->
                        <div class="splide" id="slider-1" aria-label="...">
                            <div class="splide__track">
                                <ul class="splide__list" id="popular_articles">
                                    <!-- <li class="splide__slide">
                                        <div class="card text-start border-0 rounded-4 overflow-hidden">
                                            <div class="card-body p-3">
                                                <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/Rectangle 52.png') }}" alt="Title">
                                                <h4 class="card-title">Mobile Airtime</h4>
                                                <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                            </div>
                                            <div class="card-footer border-top bg-white text-center py-2 d-flex justify-content-center gap-2">
                                                <div class="card-icon">
                                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#E9F5EC"/>
                                                    </svg>                                            
                                                </div>
                                                <div class="card-icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                        <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                        <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                        
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card text-start border-0 rounded-4 overflow-hidden">
                                            <div class="card-body p-3">
                                                <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/Rectangle 52.png') }}" alt="Title">
                                                <h4 class="card-title">Mobile Airtime</h4>
                                                 <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                            </div>
                                            <div class="card-footer border-top bg-white text-center py-2 d-flex justify-content-center gap-2">
                                                <div class="card-icon">
                                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#E9F5EC"/>
                                                    </svg>                                            
                                                </div>
                                                <div class="card-icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                        <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                        <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                        
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card text-start border-0 rounded-4 overflow-hidden">
                                            <div class="card-body p-3">
                                                <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/Rectangle 52.png') }}" alt="Title">
                                                <h4 class="card-title">Mobile Airtime</h4>
                                                <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                            </div>
                                            <div class="card-footer border-top bg-white text-center py-2 d-flex justify-content-center gap-2">
                                                <div class="card-icon">
                                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#E9F5EC"/>
                                                    </svg>                                            
                                                </div>
                                                <div class="card-icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                        <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                        <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                        
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card text-start border-0 rounded-4 overflow-hidden">
                                            <div class="card-body p-3">
                                                <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/Rectangle 52.png') }}" alt="Title">
                                                <h4 class="card-title">Mobile Airtime</h4>
                                                <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                            </div>
                                            <div class="card-footer border-top bg-white text-center py-2 d-flex justify-content-center gap-2">
                                                <div class="card-icon">
                                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#E9F5EC"/>
                                                    </svg>                                            
                                                </div>
                                                <div class="card-icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                        <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                        <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                        
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card text-start border-0 rounded-4 overflow-hidden">
                                            <div class="card-body p-3">
                                                <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/Rectangle 52.png') }}" alt="Title">
                                                <h4 class="card-title">Mobile Airtime</h4>
                                                <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                            </div>
                                            <div class="card-footer border-top bg-white text-center py-2 d-flex justify-content-center gap-2">
                                                <div class="card-icon">
                                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#E9F5EC"/>
                                                    </svg>                                            
                                                </div>
                                                <div class="card-icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                        <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                        <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                        
                                                </div>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- SLIDER END -->
                    </div>
                    <!-- MOST POPULAR END -->

                    <!-- OTHERS START -->
                    <div class="others mt-5">
                        <p class="fw-bold">Others</p>
                        <div class="splide" id="slider-2" aria-label="...">
                            <div class="splide__track">
                                <ul class="splide__list" id="other_articles">
                                    <!-- <li class="splide__slide">
                                        <div class="card text-start border-0 rounded-4 overflow-hidden p-2">
                                            <div class="card-image position-relative">
                                                <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/food-2.png') }}" alt="Title">
                                                <div class="position-absolute top-0 end-0 text-end p-2">
                                                    <div class="d-flex justify-content-end gap-2 mb-2">
                                                        <span class="card-icon">
                                                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#EF3C3C"/>
                                                            </svg>                                            
                                                        </span>
                                                        <span class="card-icon">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                                <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                                <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>                                        
                                                        </span>
                                                    </div>
                                                    <h4 class="card-title text-white mb-0 fw-bold">Flat 50% OFF</h4>
                                                    <p class="card-text text-white mb-2">On Food Orders</p>
                                                    <a href="#" class="btn btn-order">ORDER NOW</a>
                                                </div>
                                            </div>
                                            <div class="card-body px-0 py-2">
                                                <h4 class="card-title fw-bold">Mobile Airtime</h4>
                                                <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card text-start border-0 rounded-4 overflow-hidden p-2">
                                            <div class="card-image position-relative">
                                                <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/food-2.png') }}" alt="Title">
                                                <div class="position-absolute top-0 end-0 text-end p-2">
                                                    <div class="d-flex justify-content-end gap-2 mb-2">
                                                        <span class="card-icon">
                                                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#EF3C3C"/>
                                                            </svg>                                            
                                                        </span>
                                                        <span class="card-icon">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                                <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                                <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>                                        
                                                        </span>
                                                    </div>
                                                    <h4 class="card-title text-white mb-0 fw-bold">Flat 50% OFF</h4>
                                                    <p class="card-text text-white mb-2">On Food Orders</p>
                                                    <a href="#" class="btn btn-order">ORDEr NOW</a>
                                                </div>
                                            </div>
                                            <div class="card-body px-0 py-2">
                                                <h4 class="card-title fw-bold">Mobile Airtime</h4>
                                                <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="card text-start border-0 rounded-4 overflow-hidden p-2">
                                            <div class="card-image position-relative">
                                                <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/food-2.png') }}" alt="Title">
                                                <div class="position-absolute top-0 end-0 text-end p-2">
                                                    <div class="d-flex justify-content-end gap-2 mb-2">
                                                        <span class="card-icon">
                                                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#EF3C3C"/>
                                                            </svg>                                            
                                                        </span>
                                                        <span class="card-icon">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                                <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                                <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>                                        
                                                        </span>
                                                    </div>
                                                    <h4 class="card-title text-white mb-0 fw-bold">Flat 50% OFF</h4>
                                                    <p class="card-text text-white mb-2">On Food Orders</p>
                                                    <a href="#" class="btn btn-order">ORDEr NOW</a>
                                                </div>
                                            </div> -->
                                            <!-- <div class="row bg-secondary p-2 m-2 rounded-4 align-items-center">
                                                <div class="col-5">
                                                    <img src="{{ url('/public/users/assets/images/food.png') }}" alt="image" class="img-fluid">
                                                </div>
                                                <div class="col-7 text-end">
                                                    <div class="d-flex justify-content-end gap-2 mb-2">
                                                        <span class="card-icon">
                                                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#EF3C3C"/>
                                                            </svg>                                            
                                                        </span>
                                                        <span class="card-icon">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                                <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                                <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>                                        
                                                        </span>
                                                    </div>
                                                    <h4 class="card-title text-white mb-0 fw-bold">Flat 50% OFF</h4>
                                                    <p class="card-text text-white mb-2">On Food Orders</p>
                                                    <a href="#" class="btn btn-order">ORDEr NOW</a>
                                                </div>
                                            </div> -->
                                            <!-- <div class="card-body px-0 py-2">
                                                <h4 class="card-title fw-bold">Mobile Airtime</h4>
                                                <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                       <!-- <div class="row mt-4">
                            <div class="col-lg-4 col-md-6">
                                <div class="card text-start border-0 rounded-4 overflow-hidden p-2">
                                    <div class="card-image position-relative">
                                        <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/food-2.png') }}" alt="Title">
                                        <div class="position-absolute top-0 end-0 text-end p-2">
                                            <div class="d-flex justify-content-end gap-2 mb-2">
                                                <span class="card-icon">
                                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#EF3C3C"/>
                                                        </svg>                                            
                                                </span>
                                                <span class="card-icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                        <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                        <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                        
                                                </span>
                                            </div>
                                            <h4 class="card-title text-white mb-0 fw-bold">Flat 50% OFF</h4>
                                            <p class="card-text text-white mb-2">On Food Orders</p>
                                            <a href="#" class="btn btn-order">ORDEr NOW</a>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 py-2">
                                        <h4 class="card-title fw-bold">Mobile Airtime</h4>
                                        <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card text-start border-0 rounded-4 overflow-hidden p-2">
                                    <div class="card-image position-relative">
                                        <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/food-2.png') }}" alt="Title">
                                        <div class="position-absolute top-0 end-0 text-end p-2">
                                            <div class="d-flex justify-content-end gap-2 mb-2">
                                                <span class="card-icon">
                                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#EF3C3C"/>
                                                        </svg>                                            
                                                </span>
                                                <span class="card-icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                        <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                        <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                        
                                                </span>
                                            </div>
                                            <h4 class="card-title text-white mb-0 fw-bold">Flat 50% OFF</h4>
                                            <p class="card-text text-white mb-2">On Food Orders</p>
                                            <a href="#" class="btn btn-order">ORDEr NOW</a>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 py-2">
                                        <h4 class="card-title fw-bold">Mobile Airtime</h4>
                                        <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card text-start border-0 rounded-4 overflow-hidden p-2">
                                    <div class="card-image position-relative">
                                        <img class="card-img-top img-fluid" src="{{ url('/public/users/assets/images/food-2.png') }}" alt="Title">
                                        <div class="position-absolute top-0 end-0 text-end p-2">
                                            <div class="d-flex justify-content-end gap-2 mb-2">
                                                <span class="card-icon">
                                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.62 17.71C10.28 17.83 9.72 17.83 9.38 17.71C6.48 16.72 0 12.59 0 5.59C0 2.5 2.49 0 5.56 0C7.38 0 8.99 0.88 10 2.24C11.01 0.88 12.63 0 14.44 0C17.51 0 20 2.5 20 5.59C20 12.59 13.52 16.72 10.62 17.71Z" fill="#EF3C3C"/>
                                                    </svg>                                            
                                                </span>
                                                <span class="card-icon">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.75293 1.875V10.8525C2.75293 11.5875 3.09793 12.285 3.69043 12.7275L7.59792 15.6525C8.43042 16.275 9.57792 16.275 10.4104 15.6525L14.3179 12.7275C14.9104 12.285 15.2554 11.5875 15.2554 10.8525V1.875H2.75293Z" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10"/>
                                                        <path d="M1.5 1.875H16.5" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                                        <path d="M6 6H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6 9.75H12" stroke="#4BD16F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                        
                                                </span>
                                            </div>
                                            <h4 class="card-title text-white mb-0 fw-bold">Flat 50% OFF</h4>
                                            <p class="card-text text-white mb-2">On Food Orders</p>
                                            <a href="#" class="btn btn-order">ORDEr NOW</a>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 py-2">
                                        <h4 class="card-title fw-bold">Mobile Airtime</h4>
                                        <p class="card-text">Get discount form VTU airtime recharge on all networks.</p>
                                    </div>
                                </div> 
                            </div>  
                        </div> -->
                    </div>
                    <!-- OTHERS END -->
                </div>
            </div>
        </div> 
    </div>
    <!-- CONTENT END -->
@endsection          
          

