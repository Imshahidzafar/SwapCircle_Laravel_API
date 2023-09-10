@extends('layout.admin.list_master')
@section('content')
    <style>
        .btn-light{
          padding-left:10px;
        }
    </style>
    <!-- Add FAQ -->
    <div class="modal fade" id="exampleModalAddFaq">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">Add FAQ</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">Add FAQ</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">

                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Question</b>
                                <b><input  type="text" name="question" class="form-control question input" required></b>
                            </div>
                        </div>
                        
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Answer</b>
                                <b><textarea style="border:1px solid" class="form-control answer input" name="answer" id="anwser" cols="20" rows="5" required></textarea></b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_faq">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add FAQ -->

    <!-- Edit FAQ -->
    <div class="modal fade" id="editfaqModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">Edit FAQ</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">Edit FAQ</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">

                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Question</b>
                                <b><input  type="text" name="question" id="question" class="form-control input" required></b>
                            </div>
                        </div>
                        <input type="hidden" class="input" id="faqs_id">
                        
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Answer</b>
                                <b><textarea style="border:1px solid" id="answer" class="form-control input" name="answer" id="anwser" cols="20" rows="5" required></textarea></b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit_faq">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit FAQ -->

    <!-- View FAQ -->
    <div class="modal fade" id="viewfaqModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">View FAQ</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">View FAQ</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="FaqViewModel">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit FAQ -->

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles mb-n5">
				<ol class="breadcrumb">
                    @section('titleBar')
                    <span class="ml-2">FAQs</span>
                    @endsection
				</ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-12">
                    

                    <div class="card">
                        <div class="card-body">                                    
                        <legend style="float: right;"><a style="float: right;" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalAddFaq"> Add FAQ </a></legend>
                            <div class="table-responsive">
                                <table id="example" class="table dt-responsive nowrap display min-w850">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Question</th>
                                            <th>Answer</th>
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
                        "url": "{{ env('APP_URL') }}" + "admin/users_customers_faqs_fetch",
                        "method": "GET",
                        "timeout": 0,
                    };

                    $.ajax(settings).done(function (response) {
                        $('tbody').html("");
                        $.each(response.faqs, function (key, item) { 
                            var questiontxt= item.question;
                            var question='';
                            if(questiontxt.length > 40){
                                question=questiontxt.substring(0,40) + '.....';
                            }else{
                                question=item.question;
                            }

                            var txt= item.answer;
                            var ans='';
                            if(txt.length > 40){
                                ans=txt.substring(0,40) + '.....';
                            }else{
                                ans=item.answer;
                            }

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
                            
                                actionHtml += '<button class="btn m-1 btn-primary view_faq" value="' + item.faqs_id + '">';
                                actionHtml += '<i class="fa fa-eye"></i>';
                                actionHtml += '</button>';
                                
                                actionHtml += '<button class="btn m-1 btn-info edit_faq"  value="' + item.faqs_id + '">';
                                actionHtml += '<i class="fa fa-edit"></i>';
                                actionHtml += '</button>';
                            if (item.status == "Active") {
                                actionHtml += '<button class="btn m-1 btn-warning update_data" value="' + item.faqs_id + '" data-info="Inactive">';
                                actionHtml += '<i class="fa fa-times"></i>';
                                actionHtml += '</button>';
                                
                            } else if (item.status == "Inactive") {
                                actionHtml += '<button class="btn m-1 btn-success update_data" value="' + item.faqs_id + '" data-info="Active" >';
                                actionHtml += '<i class="fa fa-check"></i>';
                                actionHtml += '</button>';
                            }

                            if (item.status == "Pending" || item.status == "Deleted") {
                                actionHtml += '<button class="btn m-1 btn-warning update_data" value="' + item.faqs_id + '" data-info="Inactive">';
                                actionHtml += '<i class="fa fa-times"></i>';
                                actionHtml += '</button>';
                                actionHtml += '<button class="btn m-1 btn-success update_data" value="' + item.faqs_id + '" data-info="Active">';
                                actionHtml += '<i class="fa fa-check"></i>';
                                actionHtml += '</button>';
                            }

                            if (item.status != "Deleted") {
                                actionHtml += '<button class="btn m-1 btn-danger delete_data" value="' + item.faqs_id + '" data-info="Deleted">';
                                actionHtml += '<i class="fa fa-trash"></i>';
                                actionHtml += '</button>';
                            }

                            $('tbody').append('\
                                <tr class="odd gradeX">\
                                <td>' + (key+1) + '</td>\
                                <td>' + question + '</td>\
                                <td>' + ans + '</td>\
                                <td>' + statusHtml + '</td>\
                                <td>' + actionHtml + '</td>\
                                </tr>\
                            ');
                        });
                });
            }

            $(document).on("click",'.edit_faq', function (e) {
                    e.preventDefault();
                    var faqs_id=$(this).val();
                    $('#editfaqModal').modal('show');
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/users_customers_edit_faq/"+faqs_id,
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    if(response.status == "error"){
                        toastr.success(response.message);
                    }else{
                        $('#question').val(response.data.question);
                        $('#answer').val(response.data.answer);
                        $('#faqs_id').val(response.data.faqs_id);
                    }
                });
            });

            $(document).on("click",'.delete_data', function (e) {
                    e.preventDefault();
                    var faqs_id=$(this).val();;
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/users_customers_delete_faq",
                    "method": "POST",
                    "timeout": 0,
                    "data": {
                        'faqs_id':faqs_id,
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
                    var faqs_id=$(this).val();
                    var status=$(this).data("info");
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/users_customers_update_faq",
                    "method": "POST",
                    "timeout": 0,
                    "data": {
                        'faqs_id':faqs_id,
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


            $(document).on("click",'.view_faq', function (e) {
                    e.preventDefault();
                    var faqs_id=$(this).val();
                    $('#viewfaqModal').modal('show');
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/users_customers_edit_faq/"+faqs_id,
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    $('#FaqViewModel').html("");
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

                            $('#FaqViewModel').append('<div class="profile-info"> \
                            <div class="profile-details">\
                                <div class="profile-name px-2 pt-2">\
                                    <lable>Question:</lable>\
                                    <h5 class="text-primary mb-0">' + response.data.question + '</h5>\
                                    <lable>Answer:</lable>\
                                    <p>' + response.data.answer + '</p></div>\
                                    <lable>Status:</lable>\
                                <div class="dropdown ml-auto mt-1">' + statusHtml + '</div></div></div>');
                    }else{
                        toastr.success(response.message);
                    }
                });
            });
            $(document).on('click','#edit_faq',function(e){
                    e.preventDefault();
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/users_customers_edit_faq_data",
                    "method": "POST",
                    "timeout": 0,
                    "data": {
                        'faqs_id':$("#faqs_id").val(),
                        'question':$('#question').val(),
                        'answer':$('#answer').val(),
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
            $(document).on('click','.add_faq',function(e){
                    e.preventDefault();
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/users_customers_add_faq_data",
                    "method": "POST",
                    "timeout": 0,
                    "data": {
                        'question':$('.question').val(),
                        'answer':$('.answer').val(),
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