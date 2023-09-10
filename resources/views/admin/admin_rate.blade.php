@extends('layout.admin.list_master')
@section('content')
<style>
    .btn-light{
      padding-left:10px;
    }
</style>

<!-- Edit Rate -->
<div class="modal fade" id="editRateApiModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        @section('titleBar')
        <span class="ml-2">Admin Rate</span>
        @endsection 
            <div class="modal-header">
                <h5 class="modal-title">Edit Admin Rate</h5>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-form">

                    <div class="row col-md-12"> 
                        <div class="form-group col-md-12">
                            <b>Name</b>
                            <div>
                                <label id="name" class="mt-1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12"> 
                        <div class="form-group col-md-12">
                            <b>Admin Rate</b>
                            <b><input  type="text" name="number" id="admin_rate" class="form-control input" required></b>
                        </div>
                    </div>
                    <input type="hidden" class="input" id="system_currencies_id">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit_rate_api">Edit</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Rate  -->

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles mb-n5">
            <ol class="breadcrumb">
                @section('titleBar')
                <span class="ml-2">Admin Rate</span>
                @endsection
            </ol>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">                            
                        <legend style="float: right;"><a style="float: right;" class="btn btn-primary refresh_rate">Refresh Rate</a></legend>                                
                        <div class="table-responsive">
                            <table id="example" class="table dt-responsive nowrap display min-w850">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Symbol</th>
                                        <th>Admin Rate</th>
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
                    "url":  "/admin/admin_rate_fetch",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    $('tbody').html("");
                    $.each(response.admin_rate, function (key, item) { 

                        var statusHtml = '';
                        if (item.status == "Active") {
                            statusHtml = '<span class="btn m-1 btn-success">Active</span>';
                        } else if (item.status == "Inactive") {
                            statusHtml = '<span class="btn m-1 btn-warning">Inactive</span>';
                        } else {
                            statusHtml = '<span class="btn m-1 btn-danger">Deleted</span>';
                        }

                        var actionHtml = '';
                            
                            actionHtml += '<button class="btn m-1 btn-info edit_rate_api"  value="' + item.system_currencies_id + '">';
                            actionHtml += '<i class="fa fa-edit"></i>';
                            actionHtml += '</button>';

                        $('tbody').append('\
                            <tr class="odd gradeX">\
                            <td>' + (key+1) + '</td>\
                            <td>' + item.name + '</td>\
                            <td>' + item.code + '</td>\
                            <td>' + item.symbol + '</td>\
                            <td>' + item.admin_rate + '</td>\
                            <td>' + statusHtml + '</td>\
                            <td>' + actionHtml + '</td>\
                            </tr>\
                        ');
                    });
                });
            }

            $(document).on("click",'.edit_rate_api', function (e) {
                    e.preventDefault();
                    var system_currencies_id=$(this).val();
                    $('#editRateApiModal').modal('show');
                    var settings = {
                    "url": "/admin/admin_rate_edit/"+system_currencies_id,
                    "method": "GET",
                };

                $.ajax(settings).done(function (response) {
                    if(response.status == "error"){
                        toastr.success(response.message);
                    }else{
                        $('#admin_rate').val(response.data.admin_rate);
                        $('#name').html(response.data.name);
                        $('#system_currencies_id').val(response.data.system_currencies_id);
                    }
                });
            });

            $(document).on("click",'.refresh_rate', function (e) {
                    e.preventDefault();
                    $('.refresh_rate').text('Refreshing ....');
                    var settings = {
                    "url": "/admin/refresh_rate_data",
                    "method": "GET",
                };

                $.ajax(settings).done(function (response) {
                    $('.refresh_rate').text('Refresh Rate');
                    if(response.status == "error"){
                        fetch();
                        toastr.success(response.message);
                    }else{
                        fetch();
                        toastr.success(response.message);
                    }
                });
            });

            $(document).on('click','#edit_rate_api',function(e){
                    e.preventDefault();
                    var settings = {
                    "url":  "/admin/admin_rate_edit_data",
                    "method": "POST",
                    "data": {
                        'system_currencies_id':$("#system_currencies_id").val(),                   
                        'admin_rate':$('#admin_rate').val(),                    
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
        });
    </script>
@endsection