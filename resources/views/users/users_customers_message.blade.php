@extends('layout.users.master')
@section('content')
    <!-- CONTENT START -->
    <div class="page-content-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid px-4 pb-4">
                <div class="messages-wraper">
                    <div class="row gap-4 gap-lg-0">
                        <div class="col-lg-4">
                            <div class="card border-0 rounded-4 overflow-hidden">
                                <div class="card-body p-0"> 
                                    <input type="hidden" id="selected_other_user_id" value="{{ $user_id }}">
                                    <form action="">
                                        <div class="form-group position-relative p-3 bg-white">
                                            <span class="input-icon">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.0625 2.125C4.78331 2.125 2.125 4.78331 2.125 8.0625C2.125 11.3417 4.78331 14 8.0625 14C11.3417 14 14 11.3417 14 8.0625C14 4.78331 11.3417 2.125 8.0625 2.125ZM0.875 8.0625C0.875 4.09295 4.09295 0.875 8.0625 0.875C12.032 0.875 15.25 4.09295 15.25 8.0625C15.25 12.032 12.032 15.25 8.0625 15.25C4.09295 15.25 0.875 12.032 0.875 8.0625Z" fill="#969D9F"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2611 12.2612C12.5051 12.0171 12.9009 12.0171 13.1449 12.2612L16.9418 16.0581C17.1859 16.3022 17.1859 16.6979 16.9418 16.942C16.6977 17.1861 16.302 17.1861 16.0579 16.942L12.2611 13.1451C12.017 12.901 12.017 12.5053 12.2611 12.2612Z" fill="#969D9F"/>
                                                </svg>
                                            </span>
                                            <input type="text" class="form-control search" placeholder="Search" name="search" id="search">
                                        </div>
                                    </form> 
                                    <!-- ALL CHATS -->
                                    <ul class="list-unstyled msg-tabs" id="all_chats">
                                        <!-- <li class="p-3 d-flex gap-0 msg-tab">
                                            <div class="me-2 d-flex align-items-center flex-grow-1">
                                                <div class="position-relative me-2">
                                                    <img src="{{ url('/public/users/assets/images/Photo.png') }}" class="img-fluid" alt="image">
                                                    <span class="bg-primary online"></span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 text-black">Zack Fox</p>
                                                    <small class="text-black">Thank you...</small>
                                                </div>
                                            </div>
                                            <div class="text-end msg-show "> 
                                                <p class="mb-1">10:49 AM</p> -->
                                                <!-- <p class="rounded-pill bg-secondary d-flex align-items-center w-fit-content px-2 py-1 h-20 mb-0 text-white ms-auto">3 </p> -->
                                        <!-- </li>
                                        <li class="p-3 d-flex gap-0 msg-tab">
                                            <div class="me-2 d-flex align-items-center flex-grow-1">
                                                <div class="position-relative me-2">
                                                    <img src="{{ url('/public/users/assets/images/Photo-1.png') }}" class="img-fluid" alt="image">
                                                    <span class="bg-primary online"></span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 text-black">Zack Fox</p>
                                                    <small class="text-black">Thank you...</small>
                                                </div>
                                            </div>
                                            <div class="text-end msg-show "> 
                                                <p class="mb-1">10:49 AM</p>
                                                <p class="rounded-pill bg-primary d-flex align-items-center w-fit-content px-2 py-1 h-20 mb-0 text-white ms-auto">3</p>
                                        </li>
                                        <li class="p-3 d-flex gap-0 msg-tab">
                                            <div class="me-2 d-flex align-items-center flex-grow-1">
                                                <div class="position-relative me-2">
                                                    <img src="{{ url('/public/users/assets/images/Photo-2.png') }}" class="img-fluid" alt="image"> -->
                                                    <!-- <span class="bg-primary online"></span> -->
                                                <!-- </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 text-black">Zack Fox</p>
                                                    <small class="text-black">Thank you...</small>
                                                </div>
                                            </div>
                                            <div class="text-end msg-show "> 
                                                <p class="mb-1">10:49 AM</p>
                                                <p class="rounded-pill bg-secondary d-flex align-items-center w-fit-content px-2 py-1 h-20 mb-0 text-white ms-auto">100</p>
                                        </li>
                                        <li class="p-3 d-flex gap-0 msg-tab">
                                            <div class="me-2 d-flex align-items-center flex-grow-1">
                                                <div class="position-relative me-2">
                                                    <img src="{{ url('/public/users/assets/images/Photo-3.png') }}" class="img-fluid" alt="image"> -->
                                                    <!-- <span class="bg-primary online"></span> -->
                                                <!-- </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 text-black">Zack Fox</p>
                                                    <small class="text-black">Thank you...</small>
                                                </div>
                                            </div>
                                            <div class="text-end msg-show "> 
                                                <p class="mb-1">10:49 AM</p>
                                                <p class="rounded-full bg-primary d-inline-block p-1 mb-0"></p>
                                        </li> -->
                                    </ul>  
                                    <!-- ALL CHATS -->                                        
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card border-0 rounded-4">
                                <div class="card-body p-4 position-relative">
                                    <!-- ALL MESSAGES -->
                                    <ul class="list-unstyled chat px-2" id="messages">
                                        <!-- OTHER MSG -->
                                        <!-- <li class="chat-list other-msg">
                                            <div class="position-relative me-4">
                                                <img src="{{ url('/public/users/assets/images/Photo-4.png') }}" class="img-fluid" alt="image">
                                                <span class="bg-primary online"></span>
                                            </div>
                                           <div class="flex-grow-1">
                                                <div >
                                                    <p class="msg">Come on, what’s her name?</p>
                                                </div>
                                                <small> 4:38 AM</small>
                                           </div>
                                        </li> -->
                                        <!-- MY MSG -->
                                        <!-- <li class="chat-list my-msg text-end">
                                                <p class="msg  ms-auto text-start">Well, there is this one girl. I’ve had a crush on her ever since I can remember. But I’m pretty sure she didn’t know I was alive until the reaping</p>
                                                <small class="sm-auto"> 4:38 AM</small>
                                        </li> -->
                                        <!-- MSG DAY -->
                                        <!-- <li class="chat-list msg-day text-center">
                                            <span class="bg-secondary rounded-pill text-white px-2 py-1">4 March</span>
                                        </li> -->
                                        <!-- WITH TEXT -->
                                        <!-- <li class="chat-list other-msg">
                                            <div class="position-relative me-4">
                                                <img src="{{ url('/public/users/assets/images/Photo-4.png') }}" class="img-fluid" alt="image">
                                                <span class="bg-primary online"></span>
                                            </div>
                                           <div class="flex-grow-1">
                                                <div >
                                                    <span class="text-success fw-normal">Caesar</span>
                                                    <p class="msg">She has another fellow?</p>
                                                </div>
                                                <small> 4:38 AM</small>
                                           </div>
                                        </li> -->
                                        <!-- ONLINE -->
                                        <!-- <li class="chat-list my-msg text-end">
                                            <p class="msg  ms-auto text-start">I don’t know, but a lot of boys like her<span class="bg-primary online"></span></p>
                                            <small class="sm-auto"> 4:38 AM</small>
                                        </li> -->
                                    </ul>
                                    <!-- ALL MESSAGES -->

                                    <!-- FORM SEND MESSAGE -->
                                    <form action="">
                                        <div class="form-group position-relative">
                                            <!-- message receiver id -->
                                            <input type="hidden" id="msg_receiver_id" value="">
                                            <!-- enter mesage -->
                                            <input type="text" class="form-control msg-write" placeholder="Enter message here" id="entered_message">
                                            <span class="input-icon right" onclick="send_message()">
                                                <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.14158 16.0631L0.0991079 10.0632L8.08475 8.00665L0.0707928 6.06333L0.0283203 0.0634766L19.0845 7.92878L0.14158 16.0631Z" fill="#4BD16F"/>
                                                </svg>                                                            
                                            </span>
                                        </div>
                                    </form>
                                    <!-- FORM SEND MESSAGE -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 d-none d-lg-block">
                            <div class="card border-0 rounded-4">
                                <div class="card-body"> -->
                                    <!-- setting -->
                                    <!-- <div class="setting">
                                        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ url('/public/users/assets/images/Photo-4.png') }}" class="img-fluid me-2" alt="">
                                                <p class="mb-0 text-black">Caesar</p>
                                            </div>
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0669 0.933058C13.311 1.17714 13.311 1.57286 13.0669 1.81694L1.81694 13.0669C1.57286 13.311 1.17714 13.311 0.933058 13.0669C0.688981 12.8229 0.688981 12.4271 0.933058 12.1831L12.1831 0.933058C12.4271 0.688981 12.8229 0.688981 13.0669 0.933058Z" fill="#969D9F"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.933058 0.933058C1.17714 0.688981 1.57286 0.688981 1.81694 0.933058L13.0669 12.1831C13.311 12.4271 13.311 12.8229 13.0669 13.0669C12.8229 13.311 12.4271 13.311 12.1831 13.0669L0.933058 1.81694C0.688981 1.57286 0.688981 1.17714 0.933058 0.933058Z" fill="#969D9F"/>
                                            </svg>
                                        </div>
                                        <div class="border-bottom pb-3 mb-3">
                                            <label for="user-name" class="mb-2 text-primary">User Name</label>
                                            <p class="mb-0 text-black">@Caesar</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                            <p class="mb-0 text-black">Notifications</p>
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class=" pb-3 mb-3">
                                            <a href="#" class="text-black d-block mb-3">Block user</a>
                                            <a href="#" class="text-black d-block mb-3">Clear history</a>
                                            <a href="#" class="text-black d-block mb-3">Delete conversation</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <!-- CONTENT END -->
@endsection 
@section('script') 
    <script type="text/javascript">
        $(document).ready(function() { 
            //update messages
            setInterval(update_messages, 1000);
            //update messages
        });
    </script>
@endsection        