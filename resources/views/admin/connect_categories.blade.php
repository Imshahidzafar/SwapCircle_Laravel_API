@extends('layout.admin.list_master')
@section('content')
    <style>
        .btn-light{
          padding-left:10px;
        }
    </style>
    <!-- Add Connect Category -->
    <div class="modal fade" id="exampleModalAddConnectCategory">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">Add Connect Category</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">Add Connect Category</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">

                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Name</b>
                                <b><input  type="text" name="catname" class="form-control catname input" required></b>
                                <span class="error_msg" id="name_error"></span>
                            </div>
                        </div>
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Icon</b>
                                <b><input  type="file" name="icon" id="icon" class="form-control icon input" required multiple></b>
                                <span class="error_msg" id="icon_error"></span>
                                <textarea rows="10" cols="50" class="input" id="icon_string" hidden></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_connect_category">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Connect Category -->

    <!-- Edit Connect Category -->
    <div class="modal fade" id="editConnectCateyModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">Edit Connect Category</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">Edit Connect Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">

                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Name</b>
                                <b><input  type="text" name="name" id="name" class="form-control input" required></b>
                            </div>
                        </div>
                        <input type="hidden" class="input" id="connect_categories_id">
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Icon</b>
                                <b><input  type="file" name="icon" id="edit_icon" class="form-control icon input" required multiple></b>
                                <textarea rows="10" cols="50" class="input" id="edit_icon_string" hidden></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <b>Old Icon</b>
                                <div class="image-box text-center mx-auto">
                                    <img src="" class="img-fluid" id="icon_preview" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit_connect_category">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Connect Category -->

    <!-- View Connect Category -->
    <div class="modal fade" id="viewConnectCategoryModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">View Connect Category</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">View Connect Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div id="ConnectCategoryViewModal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Connect Category -->

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles mb-n5">
				<ol class="breadcrumb">
                    @section('titleBar')
                    <span class="ml-2">Connect Categories</span>
                    @endsection
				</ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-12">
                    

                    <div class="card">
                        <div class="card-body">                                    
                        <legend style="float: right;"><a style="float: right;" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalAddConnectCategory"> Add Connect Category </a></legend>
                            <div class="table-responsive">
                                <table id="example" class="table dt-responsive nowrap display min-w850">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Icon</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          	</div>
        </div>
    </div>
    <script src="{{ url('/public/users/assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ url('/public/users/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('/public/users/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('/public/users/assets/js/jquery.ui.min.js') }}"></script>
    <script src="{{ url('/public/users/assets/js/jquery.additional.methods.js') }}"></script>
    <script>
        $(document).ready(function(){
            // --------------- IMAGE PREVIEW & BSASE64 STRING --------------- //
            function previewImage (image,string) {
                var fileImage = image.files[0];
                var reader = new FileReader();

                reader.addEventListener("load", function() {

                    document.querySelector(string).value = reader.result.toString().replace(/^data:(.*,)?/, "");
                }, false);

                if (fileImage) {
                    reader.readAsDataURL(fileImage);
                }
            }

            document.querySelector("#icon").addEventListener("change", function() {
                previewImage(this,"#icon_string");
            });
            document.querySelector("#edit_icon").addEventListener("change", function() {
                previewImage(this,"#edit_icon_string");
            });
            fetch();
            function fetch() {
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/connect_categories_fetch",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                                $('tbody').html("");
                                $.each(response.connectCategories, function (key, item) { 
    
                                    var statusHtml = '';
                                    if (item.status == "Pending") {
                                        statusHtml = '<span class="btn m-1 btn-info">Pending</span>';
                                    } else if (item.status == "Active") {
                                        statusHtml = '<span class="btn m-1 btn-success">Active</span>';
                                    } else if (item.status == "Inactive") {
                                        statusHtml = '<span class="btn m-1 btn-warning">Inactive</span>';
                                    } else {
                                        statusHtml = '<span class="btn m-1 btn-danger">Deleted</span>';
                                    }

                                    var actionHtml = '';
                                    
                                        actionHtml += '<button class="btn m-1 btn-primary view_connect_category" value="' + item.connect_categories_id + '">';
                                        actionHtml += '<i class="fa fa-eye"></i>';
                                        actionHtml += '</button>';
                                        
                                        actionHtml += '<button class="btn m-1 btn-info edit_connect_category"  value="' + item.connect_categories_id + '">';
                                        actionHtml += '<i class="fa fa-edit"></i>';
                                        actionHtml += '</button>';
                                    if (item.status == "Active") {
                                        actionHtml += '<button class="btn m-1 btn-warning update_data" value="' + item.connect_categories_id + '" data-info="Inactive">';
                                        actionHtml += '<i class="fa fa-times"></i>';
                                        actionHtml += '</button>';
                                        
                                    } else if (item.status == "Inactive") {
                                        actionHtml += '<button class="btn m-1 btn-success update_data" value="' + item.connect_categories_id + '" data-info="Active" >';
                                        actionHtml += '<i class="fa fa-check"></i>';
                                        actionHtml += '</button>';
                                    }

                                    if (item.status == "Pending" || item.status == "Deleted") {
                                        actionHtml += '<button class="btn m-1 btn-warning update_data" value="' + item.connect_categories_id + '" data-info="Inactive">';
                                        actionHtml += '<i class="fa fa-times"></i>';
                                        actionHtml += '</button>';
                                        actionHtml += '<button class="btn m-1 btn-success update_data" value="' + item.connect_categories_id + '" data-info="Active">';
                                        actionHtml += '<i class="fa fa-check"></i>';
                                        actionHtml += '</button>';
                                    }

                                    if (item.status != "Deleted") {
                                        actionHtml += '<button class="btn m-1 btn-danger delete_data" value="' + item.connect_categories_id + '" data-info="Deleted">';
                                        actionHtml += '<i class="fa fa-trash"></i>';
                                        actionHtml += '</button>';
                                    }
                                    var profile_image = "{{ url('/public') }}" + "/" +item.icon;
                                    $('tbody').append('\
                                        <tr class="odd gradeX">\
                                        <td>' + (key+1) + '</td>\
                                        <td>' + item.name + '</td>\
                                        <td><img src="'+profile_image+'" class="img-fluid" alt="" srcset="" width="50px" height="50px"></td>\
                                        <td>' + statusHtml + '</td>\
                                        <td>' + actionHtml + '</td>\
                                        </tr>\
                                    ');
                                    });
                });
            }

            $(document).on("click",'.edit_connect_category', function (e) {
                e.preventDefault();
                var connect_categories_id=$(this).val();
                $('#editConnectCateyModal').modal('show');
                var settings = {
                "url": "{{ env('APP_URL') }}" + "admin/connect_category_edit/"+connect_categories_id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                        var profile_image = "{{ url('/public') }}" + "/" +response.data.icon;
                        if(response.status == "error"){
                            toastr.success(response.message);
                        }else{
                            $('#name').val(response.data.name);
                            $('#connect_categories_id').val(response.data.connect_categories_id);
                            $('#icon_preview').attr('src', profile_image);
                        }
                    });
            });

            $(document).on("click",'.delete_data', function (e) {
                    e.preventDefault();
                    var connect_categories_id=$(this).val();;
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/connect_category_delete",
                    "method": "POST",
                    "timeout": 0,
                    "data": {
                        'connect_categories_id':connect_categories_id,
                    },
                };
                $.ajax(settings).done(function (response) {
                    if(response.status == "success"){ 
                        fetch();
                        toastr.success(response.message);
                    }else{
                        toastr.success(response.message);
                    }
                });
            });

            $(document).on("click",'.update_data', function (e) {
                    e.preventDefault();
                    var connect_categories_id=$(this).val();
                    var status=$(this).data("info");
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/connect_category_update",
                    "method": "POST",
                    "timeout": 0,
                    "data": {
                        'connect_categories_id':connect_categories_id,
                        'status':status,
                    },
                };
                $.ajax(settings).done(function (response) {
                    if(response.status == "success"){ 
                        fetch();
                        toastr.success(response.message);
                    }else{
                        toastr.success(response.message);
                    }
                });
            });


            $(document).on("click",'.view_connect_category', function (e) {
                e.preventDefault();
                var connect_categories_id=$(this).val();
                $('#viewConnectCategoryModal').modal('show');
                var settings = {
                "url": "{{ env('APP_URL') }}" + "admin/connect_category_edit/"+connect_categories_id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                        $('#ConnectCategoryViewModal').html("");
                        if(response.status == "success"){
                                var statusHtml = '';
                                if (response.data.status == "Pending") {
                                    statusHtml = '<span class="btn m-1 btn-info">Pending</span>';
                                } else if (response.data.status == "Active") {
                                    statusHtml = '<span class="btn m-1 btn-success">Active</span>';
                                } else if (response.data.status == "Inactive") {
                                    statusHtml = '<span class="btn m-1 btn-warning">Inactive</span>';
                                } else {
                                    statusHtml = '<span class="btn m-1 btn-danger">Deleted</span>';
                                }
                                var profile_image = "{{ url('/public') }}" + "/" +response.data.icon
                                $('#ConnectCategoryViewModal').append('<div class="modal-body"> \
                                        <lable><h5>Name:</h5></lable>\
                                        <h5 class="text-primary mb-0">' + response.data.name + '</h5>\
                                        <lable><h5>Image:</h5></lable>\
                                        <div class="image-box text-center mx-auto">\
                                            <img src="'+profile_image+'" class="img-fluid" width="250px" height="250px" id="icon_preview" alt="">\
                                            </div>\
                                            <lable><h5>Status:</h5></lable>\
									<div class="dropdown ml-auto mt-1">' + statusHtml + '</div></div>');
                        }else{
                            toastr.success(response.message);
                        }
                    });
            });
            $(document).on('click','#edit_connect_category',function(e){
                e.preventDefault();
                var settings = {
                "url": "{{ env('APP_URL') }}" + "admin/connect_category_edit_data",
                "method": "POST",
                "timeout": 0,
                "data": {
                    'connect_categories_id':$("#connect_categories_id").val(),
                    'name':$('#name').val(),                    
                    'icon_image':$('#edit_icon_string').val(),
                },
             };

            $.ajax(settings).done(function (response) {
                        if (response.status == "success") {
                            toastr.success(response.message);
                            fetch();
                            $('.modal-backdrop').remove();
                            $('body').removeClass('modal-open');
                            $('.modal').removeClass('show');
                        } else {
                            toastr.error(response.message);
                            fetch();
                            $('.modal-backdrop').remove();
                            $('body').removeClass('modal-open');
                            $('.modal').removeClass('show');
                        }
            });
        });
        $(document).on('click','.add_connect_category',function(e){
                e.preventDefault();
                var settings = {
                "url": "{{ env('APP_URL') }}" + "admin/connect_category_add_data",
                "method": "POST",
                "timeout": 0,
                "data": {
                    'name':$('.catname').val(),
                    'icon_image':$('#icon_string').val(),
                },
            };

            $.ajax(settings).done(function (response) {
                if (response.status == "success") {
                    toastr.success(response.message);
                    fetch();
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open');
                    $('.modal').removeClass('show');
                    $( ".input" ).each(function() {
                        $(this).val("");
                    });
                } else {
                    toastr.error(response.message);
                    fetch();
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open');
                    $('.modal').removeClass('show');
                    $( ".input" ).each(function() {
                        $(this).val("");
                    });
                }
            });
        });


        });
    </script>
@endsection