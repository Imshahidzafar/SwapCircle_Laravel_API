@extends('layout.users.master')
@section('content')
    <!-- CONTENT START -->
    <div class="page-content-wrapper">
        <div class="page-content-tab">
            <div class="container-fluid px-4 pb-4">
                <div class="profile-faq">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="{{ url('/users/profile') }}" class="text-primary">Profile</a></li>
                            <li class="mx-3">
                                <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.21749 3.11406C5.22417 4.12074 5.25773 5.73205 4.31816 6.77904L4.21749 6.88529L1.47119 9.47108C1.21084 9.73143 0.788734 9.73143 0.528385 9.47108C0.288062 9.23076 0.269576 8.8526 0.472926 8.59107L0.528385 8.52827L3.27468 5.94248C3.76797 5.44919 3.79393 4.66553 3.35257 4.14168L3.27468 4.05687L0.528385 1.47108C0.268035 1.21073 0.268035 0.78862 0.528385 0.52827C0.768707 0.287947 1.14686 0.269461 1.40839 0.472811L1.47119 0.52827L4.21749 3.11406Z" fill="#21333B"/>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">FAQ</a></li> 
                        </ol>
                    </nav>
                </div>
                <div class="row mt-5">
                    <div class="cal-12">
                        <!-- FAQ START -->
                        <div class="accordion" id="accordionExample">
                            <!-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Fusce volutpat lectus et nisl consecte?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien diam, euismod et pretium id, volutpat et tortor. In vulputate lorem quis dui vestibulum, vitae imperdiet diam bibendum. Maecenas scelerisque orci a dolor vestibulum sagittis. Etiam quis finibus arcu, vel efficitur diam. Curabitur felis eros, vestibulum sed nisi eu, sodales aliquet lacus. Mauris lacinia quam quis feugiat laoreet. Etiam lobortis aliquet euismod. Nunc dictum, sapien at egestas rutrum, dui dui fringilla erat, a commodo augue augue vel magna. Sed tincidunt ante turpis, rhoncus commodo risus fringilla vel. Maecenas lacinia nisl a sem ornare pharetra. Donec imperdiet justo et elementum iaculis.Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien diam, euismod et pretium id, volutpat et tortor. In vulputate lorem quis dui vestibulum, vitae imperdiet diam bibendum. Maecenas scelerisque orci a dolor vestibulum sagittis. Etiam quis finibus arcu, vel efficitur diam. Curabitur felis eros, vestibulum sed nisi eu, sodales aliquet lacus. Mauris lacinia quam quis feugiat laoreet. Etiam lobortis aliquet euismod. Nunc dictum, sapien at egestas rutrum, dui dui fringilla erat, a commodo augue augue vel magna. Sed tincidunt ante turpis, rhoncus commodo risus fringilla vel. Maecenas lacinia nisl a sem ornare pharetra. Donec imperdiet justo et elementum iaculis. 
                                        <br/><br/>
                                        Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien diam, euismod et pretium id, volutpat et tortor. In vulputate lorem quis dui vestibulum, vitae imperdiet diam bibendum. Maecenas scelerisque orci a dolor vestibulum sagittis. Etiam quis finibus arcu, vel efficitur diam. Curabitur felis eros, vestibulum sed nisi eu, sodales aliquet lacus. Mauris lacinia quam quis feugiat laoreet. Etiam lobortis aliquet euismod. Nunc dictum, sapien at egestas rutrum, dui dui fringilla erat, a commodo augue augue vel magna. Sed tincidunt ante turpis, rhoncus commodo risus fringilla vel. Maecenas lacinia nisl a sem ornare pharetra. Donec imperdiet justo et elementum iaculis.                                        
                                    </div>
                                </div>
                            </div> 
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button bg-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Fusce volutpat lectus et nisl consecte?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien .Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien.Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien. Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien.........                                        
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button bg-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Fusce volutpat lectus et nisl consecte?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body pt-0">
                                        Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien .Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien.Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien. Fusce volutpat lectus et nisl consectetur finibus. In vitae scelerisque augue, in varius eros. Nunc sapien.........                                        
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- FAQ END -->
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
            </div>
        </div> 
    </div>
    <!-- CONTENT END -->
@endsection