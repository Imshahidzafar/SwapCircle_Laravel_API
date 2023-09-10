@extends('layout.admin.list_master')
@section('content')
    <style>
        .btn-light{
          padding-left:10px;
        }
    </style>
    <!-- Add Connect Article -->
    <div class="modal fade" id="exampleModalAddConnectArticle">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">Add Connect Article</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">Add Connect Article</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">

                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Connect Category</b>
                                <b>
                                    <select class="form-control" id="addconnectCategory">
                                    </select>
                                </b>
                            </div>
                        </div>
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Title</b>
                                <b><input  type="text" name="title" class="form-control title input" required></b>
                                <span class="error_msg" id="title_error"></span>
                            </div>
                        </div>
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Description</b>
                                <b><textarea rows="4" cols="50" name="description" class="form-control description input" ></textarea></b>
                                <span class="error_msg" id="description_error"></span>
                            </div>
                        </div>
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Image</b>
                                <b><input  type="file" name="image" id="image" class="form-control image input" required multiple></b>
                                <span class="error_msg" id="image_error"></span>
                                <textarea rows="10" cols="50" class="input" id="image_string" hidden></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_connect_article">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Connect Article -->

    <!-- Edit Connect Article -->
    <div class="modal fade" id="editConnectArticleModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">Edit Connect Article</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">Edit Connect Article</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <input type="hidden" class="input" id="connect_articles_id">
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Connect Category</b>
                                <b>
                                    <select class="form-control" id="editconnectCategory">
                                    </select>
                                </b>
                            </div>
                        </div>
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Title</b>
                                <b><input  type="text" name="title" id="title" class="form-control title input" required></b>
                                <span class="error_msg" id="title_error"></span>
                            </div>
                        </div>
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Description</b>
                                <b><textarea rows="4" cols="50" id="description"  name="description" class="form-control description input" ></textarea></b>
                                <span class="error_msg" id="description_error"></span>
                            </div>
                        </div>
                        <div class="row col-md-12"> 
                            <div class="form-group col-md-12">
                                <b>Image</b>
                                <b><input  type="file" name="image" id="edit_image" class="form-control image input" required multiple></b>
                                <span class="error_msg" id="image_error"></span>
                                <textarea rows="10" cols="50" class="input" id="edit_image_string" hidden></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <b>Old Image</b>
                                <div class="image-box text-center mx-auto">
                                    <img src="" class="img-fluid" id="image_preview" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit_connect_article">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Connect Article -->

    <!-- View Connect Article -->
    <div class="modal fade" id="viewConnectArticleModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            @section('titleBar')
            <span class="ml-2">View Connect Article</span>
            @endsection 
                <div class="modal-header">
                    <h5 class="modal-title">View Connect Article</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div id="ConnectArticleViewModal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Connect Article -->

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles mb-n5">
				<ol class="breadcrumb">
                    @section('titleBar')
                    <span class="ml-2">Connect Articles</span>
                    @endsection
				</ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-12">
                    

                    <div class="card">
                        <div class="card-body">                                    
                        <legend style="float: right;"><a style="float: right;" class="btn btn-primary" id="add_connect_article"  data-toggle="modal" data-target="#exampleModalAddConnectArticle"> Add Connect Article </a></legend>
                            <div class="table-responsive">
                                <table id="example" class="table dt-responsive nowrap display min-w850">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
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

            document.querySelector("#image").addEventListener("change", function() {
                previewImage(this,"#image_string");
            });
            document.querySelector("#edit_image").addEventListener("change", function() {
                previewImage(this,"#edit_image_string");
            });
            
            fetch();
            function fetch() {
                var getsettings = {
                    "url": "{{ env('APP_URL') }}" + "admin/connect_categories_fetch",
                    "method": "GET",
                    "timeout": 0,
                };
                $.ajax(getsettings).done(function(response) {
                    $('#addconnectCategory').html("");            
                    $.each(response.connectCategories, function (key, item) {
                        $("#addconnectCategory").append('<option value="'+item.connect_categories_id+'">'+item.name+'</option>');
                    });
                    var selectElement = document.getElementById('addconnectCategory');
                    var bootstrapSelect = $(selectElement).data('selectpicker');
                    if (bootstrapSelect !== undefined) {
                       bootstrapSelect.destroy();
                    }
                });
                $.ajax(getsettings).done(function(response) {
                    var connect=$('#editconnectCategory');
                    connect.html("");            
                    $.each(response.connectCategories, function (key, item) {
                        connect.append('<option value="'+item.connect_categories_id+'">'+item.name+'</option>');
                    });
                    var selectElement = document.getElementById('editconnectCategory');
                    var bootstrapSelect = $(selectElement).data('selectpicker');
                    if (bootstrapSelect !== undefined) {
                       bootstrapSelect.destroy();
                    }
                });
                var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/connect_articles_fetch",
                    "method": "GET",
                    "timeout": 0,
                };
                
                $.ajax(settings).done(function (response) {
                                $('tbody').html("");
                                $.each(response.connectArticles, function (key, item) { 
                                    var titletxt= item.title;
                                    var title='';
                                    if(titletxt.length > 40){
                                        title=titletxt.substring(0,40) + '.....';
                                    }else{
                                        title=item.title;
                                    }

                                    var descriptiontxt= item.description;
                                    var description='';
                                    if(descriptiontxt.length > 40){
                                        description=descriptiontxt.substring(0,40) + '.....';
                                    }else{
                                        description=item.description;
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
                                    
                                        actionHtml += '<button class="btn m-1 btn-primary view_connect_article" value="' + item.connect_articles_id + '">';
                                        actionHtml += '<i class="fa fa-eye"></i>';
                                        actionHtml += '</button>';
                                        
                                        actionHtml += '<button class="btn m-1 btn-info edit_connect_article"  value="' + item.connect_articles_id + '">';
                                        actionHtml += '<i class="fa fa-edit"></i>';
                                        actionHtml += '</button>';
                                    if (item.status == "Active") {
                                        actionHtml += '<button class="btn m-1 btn-warning update_data" value="' + item.connect_articles_id + '" data-info="Inactive">';
                                        actionHtml += '<i class="fa fa-times"></i>';
                                        actionHtml += '</button>';
                                        
                                    } else if (item.status == "Inactive") {
                                        actionHtml += '<button class="btn m-1 btn-success update_data" value="' + item.connect_articles_id + '" data-info="Active" >';
                                        actionHtml += '<i class="fa fa-check"></i>';
                                        actionHtml += '</button>';
                                    }

                                    if (item.status == "Pending" || item.status == "Deleted") {
                                        actionHtml += '<button class="btn m-1 btn-warning update_data" value="' + item.connect_articles_id + '" data-info="Inactive">';
                                        actionHtml += '<i class="fa fa-times"></i>';
                                        actionHtml += '</button>';
                                        actionHtml += '<button class="btn m-1 btn-success update_data" value="' + item.connect_articles_id + '" data-info="Active">';
                                        actionHtml += '<i class="fa fa-check"></i>';
                                        actionHtml += '</button>';
                                    }

                                    if (item.status != "Deleted") {
                                        actionHtml += '<button class="btn m-1 btn-danger delete_data" value="' + item.connect_articles_id + '" data-info="Deleted">';
                                        actionHtml += '<i class="fa fa-trash"></i>';
                                        actionHtml += '</button>';
                                    }
                                    var profile_image = "{{ url('/public') }}" + "/" +item.image;
                                    $('tbody').append('\
                                        <tr class="odd gradeX">\
                                        <td>' + (key+1) + '</td>\
                                        <td>' + title + '</td>\
                                        <td>' + description + '</td>\
                                        <td><img src="'+profile_image+'" class="img-fluid" alt="" srcset="" width="55px" height="50px"></td>\
                                        <td>' + statusHtml + '</td>\
                                        <td>' + actionHtml + '</td>\
                                        </tr>\
                                    ');
                                    });
                });
            }

            $(document).on("click",'.edit_connect_article', function (e) {
                e.preventDefault();
                var connect_articles_id=$(this).val();
                $('#editConnectArticleModal').modal('show');
                
                var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/connect_article_edit/"+connect_articles_id,
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    var profile_image = "{{ url('/public') }}" + "/" +response.data.image;
                    if(response.status == "error"){
                        toastr.success(response.message);
                    }else{
                        $('#title').val(response.data.title);
                        $('#description').val(response.data.description);
                        $('#connect_articles_id').val(response.data.connect_articles_id);
                        $('#image_preview').attr('src', profile_image);
                    }
                });
            });

            $(document).on("click",'.delete_data', function (e) {
                    e.preventDefault();
                    var connect_articles_id=$(this).val();;
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/connect_article_delete",
                    "method": "POST",
                    "timeout": 0,
                    "data": {
                        'connect_articles_id':connect_articles_id,
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
                    var connect_articles_id=$(this).val();
                    var status=$(this).data("info");
                    var settings = {
                    "url": "{{ env('APP_URL') }}" + "admin/connect_article_update",
                    "method": "POST",
                    "timeout": 0,
                    "data": {
                        'connect_articles_id':connect_articles_id,
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


            $(document).on("click",'.view_connect_article', function (e) {
                e.preventDefault();
                var connect_articles_id=$(this).val();
                $('#viewConnectArticleModal').modal('show');
                var settings = {
                "url": "{{ env('APP_URL') }}" + "admin/connect_article_edit/"+connect_articles_id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                        $('#ConnectArticleViewModal').html("");
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
                                var profile_image = "{{ url('/public') }}" + "/" +response.data.image
                                $('#ConnectArticleViewModal').append('<div class="modal-body"> \
                                        <lable><h5>Title:</h5></lable>\
                                        <h5 class="text-primary mb-0">'+ response.data.title +'</h5>\
                                        <lable><h5>Description:</h5></lable>\
                                            <p class="modal-description" style="word-wrap: break-word;">' + response.data.description +'</p>\
                                        <lable><h5>Image:</h5></lable>\
                                        <img src="'+profile_image+'" class="img-fluid my-2"  width="250px" height="250px" id="image_preview" alt="">\
                                        <div><lable><h5>Status:</h5></lable>\
                                    <span class="dropdown ml-auto mt-1">' + statusHtml + '</span></div></div>');
                        }else{
                            toastr.success(response.message);
                        }
                    });
            });
            $(document).on('click','#edit_connect_article',function(e){
                e.preventDefault();
                var settings = {
                "url": "{{ env('APP_URL') }}" + "admin/connect_article_edit_data",
                "method": "POST",
                "timeout": 0,
                "data": {
                    'connect_articles_id':$("#connect_articles_id").val(),
                    'title':$('#title').val(),                    
                    'description':$('#description').val(),                    
                    'connect_categories_id':$('#editconnectCategory').val(),                   
                    'image':$('#edit_image_string').val(),
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

        $(document).on('click','.add_connect_article',function(e){
                e.preventDefault();
                var settings = {
                "url": "{{ env('APP_URL') }}" + "admin/connect_article_add_data",
                "method": "POST",
                "timeout": 0,
                "data": {
                    'title':$('.title').val(),
                    'description':$('.description').val(),
                    'connect_categories_id':$('#addconnectCategory').val(),
                    'image':$('#image_string').val(),
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