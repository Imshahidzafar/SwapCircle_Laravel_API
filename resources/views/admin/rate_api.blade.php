@extends('layout.admin.list_master')
@section('content')
    <style>
        .btn-light{
          padding-left:10px;
        }
    </style>
    <!-- Add Rate Api -->
    <div class="modal fade" id="exampleModalAddRateApi">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">Add Rate Api</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">Add Rate Api</h5>
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
                                <b>URL</b>
                                <b><input  type="text" name="url" class="form-control url input" required></b>
                                <span class="error_msg" id="url_error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_rate_api">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Rate Api -->

    <!-- Edit Rate Api -->
    <div class="modal fade" id="editRateApiModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">Edit Rate Api</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">Edit Rate Api</h5>
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
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>URL</b>
                                <b><input  type="text" name="url" id="url" class="form-control input" required></b>
                            </div>
                        </div>
                        <input type="hidden" class="input" id="rate_api_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit_rate_api">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Rate Api -->

    <!-- View Rate Api -->
    <div class="modal fade" id="viewRateApiModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">View Rate Api</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">View Rate Api</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div id="RateApiViewModal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Rate Api -->

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles mb-n5">
				<ol class="breadcrumb">
                    @section('titleBar')
                    <span class="ml-2">Rate Api</span>
                    @endsection
				</ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-12">
                    

                    <div class="card">
                        <div class="card-body">                                    
                        <legend style="float: right;"><a style="float: right;" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalAddRateApi"> Add Rate Api </a></legend>
                            <div class="table-responsive">
                                <table id="example" class="table dt-responsive nowrap display min-w850">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>URL</th>
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
            fetch();
            function fetch() {
                    var settings = {
                    "url":  "/admin/rate_api_fetch",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                                $('tbody').html("");
                                $.each(response.rate_api, function (key, item) { 
    
                                    var statusHtml = '';
                                   if (item.status == "Active") {
                                        statusHtml = '<span class="btn m-1 btn-success">Active</span>';
                                    } else if (item.status == "Inactive") {
                                        statusHtml = '<span class="btn m-1 btn-warning">Inactive</span>';
                                    } else {
                                        statusHtml = '<span class="btn m-1 btn-danger">Deleted</span>';
                                    }

                                    var actionHtml = '';
                                    
                                        actionHtml += '<button class="btn m-1 btn-primary view_rate_api" value="' + item.rate_api_id + '">';
                                        actionHtml += '<i class="fa fa-eye"></i>';
                                        actionHtml += '</button>';
                                        
                                        actionHtml += '<button class="btn m-1 btn-info edit_rate_api"  value="' + item.rate_api_id + '">';
                                        actionHtml += '<i class="fa fa-edit"></i>';
                                        actionHtml += '</button>';
                                    if (item.status == "Active") {
                                        actionHtml += '<button class="btn m-1 btn-warning update_data" value="' + item.rate_api_id + '" data-info="Inactive">';
                                        actionHtml += '<i class="fa fa-times"></i>';
                                        actionHtml += '</button>';
                                        
                                    } else if (item.status == "Inactive") {
                                        actionHtml += '<button class="btn m-1 btn-success update_data" value="' + item.rate_api_id + '" data-info="Active" >';
                                        actionHtml += '<i class="fa fa-check"></i>';
                                        actionHtml += '</button>';
                                    }

                                    if (item.status == "Pending" || item.status == "Deleted") {
                                        actionHtml += '<button class="btn m-1 btn-warning update_data" value="' + item.rate_api_id + '" data-info="Inactive">';
                                        actionHtml += '<i class="fa fa-times"></i>';
                                        actionHtml += '</button>';
                                        actionHtml += '<button class="btn m-1 btn-success update_data" value="' + item.rate_api_id + '" data-info="Active">';
                                        actionHtml += '<i class="fa fa-check"></i>';
                                        actionHtml += '</button>';
                                    }

                                    if (item.status != "Deleted") {
                                        actionHtml += '<button class="btn m-1 btn-danger delete_data" value="' + item.rate_api_id + '" data-info="Deleted">';
                                        actionHtml += '<i class="fa fa-trash"></i>';
                                        actionHtml += '</button>';
                                    }
                                    $('tbody').append('\
                                        <tr class="odd gradeX">\
                                        <td>' + (key+1) + '</td>\
                                        <td>' + item.name + '</td>\
                                        <td>' + item.url + '</td>\
                                        <td>' + statusHtml + '</td>\
                                        <td>' + actionHtml + '</td>\
                                        </tr>\
                                    ');
                                    });
                });
            }

            $(document).on("click",'.edit_rate_api', function (e) {
                e.preventDefault();
                var rate_api_id=$(this).val();
                $('#editRateApiModal').modal('show');
                var settings = {
                "url": "/admin/rate_api_edit/"+rate_api_id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                        if(response.status == "error"){
                            toastr.success(response.message);
                        }else{
                            $('#name').val(response.data.name);
                            $('#url').val(response.data.url);
                            $('#rate_api_id').val(response.data.rate_api_id);
                        }
                    });
            });

            $(document).on("click",'.delete_data', function (e) {
                    e.preventDefault();
                    var rate_api_id=$(this).val();;
                    var settings = {
                    "url": "/admin/rate_api_delete",
                    "method": "POST",
                    "timeout": 0,
                    "data": {
                        'rate_api_id':rate_api_id,
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
                    var rate_api_id=$(this).val();
                    var status=$(this).data("info");
                    var settings = {
                    "url":"/admin/rate_api_update",
                    "method": "POST",
                    "timeout": 0,
                    "data": {
                        'rate_api_id':rate_api_id,
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


            $(document).on("click",'.view_rate_api', function (e) {
                e.preventDefault();
                var rate_api_id=$(this).val();
                $('#viewRateApiModal').modal('show');
                var settings = {
                "url":  "/admin/rate_api_edit/"+rate_api_id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                        $('#RateApiViewModal').html("");
                        if(response.status == "success"){
                                var statusHtml = '';
                                if (response.data.status == "Active") {
                                    statusHtml = '<span class="btn m-1 btn-success">Active</span>';
                                } else if (response.data.status == "Inactive") {
                                    statusHtml = '<span class="btn m-1 btn-warning">Inactive</span>';
                                } else {
                                    statusHtml = '<span class="btn m-1 btn-danger">Deleted</span>';
                                }
                                var profile_image = "{{ url('/public') }}" + "/" +response.data.icon
                                $('#RateApiViewModal').append('<div class="modal-body"> \
                                        <lable><h5>Name:</h5></lable>\
                                        <h5 class="text-primary mb-0">' + response.data.name + '</h5>\
                                        <lable><h5>URL:</h5></lable>\
                                        <h5 class="text-primary mb-0">' + response.data.url + '</h5>\
                                            <lable><h5>Status:</h5></lable>\
									<div class="dropdown ml-auto mt-1">' + statusHtml + '</div></div>');
                        }else{
                            toastr.success(response.message);
                        }
                    });
            });
            $(document).on('click','#edit_rate_api',function(e){
                e.preventDefault();
                var settings = {
                "url":  "/admin/rate_api_edit_data",
                "method": "POST",
                "timeout": 0,
                "data": {
                    'rate_api_id':$("#rate_api_id").val(),
                    'name':$('#name').val(),                    
                    'url':$('#url').val(),                    
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
        $(document).on('click','.add_rate_api',function(e){
                e.preventDefault();
                var settings = {
                "url":"/admin/rate_api_add_data",
                "method": "POST",
                "timeout": 0,
                "data": {
                    'name':$('.catname').val(),
                    'url':$('.url').val(),
                },
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
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