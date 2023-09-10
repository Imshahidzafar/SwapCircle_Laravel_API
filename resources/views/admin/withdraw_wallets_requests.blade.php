@extends('layout.admin.list_master')
@section('content')
<style>
    .btn-light{
      padding-left:10px;
    }
    .space {
     margin-left: 5px; 
    }
</style>
<!-- View User -->

<div class="col-xl-12">
    <div class="card">
        <div class="card-body p-0">
            <!-- Modal -->
            <div class="modal fade" id="viewWithdrawWalletRequestModal">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h2>Withdraw Wallet Request Detail</h2>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <br>
                            <div class="row">
                                <div class="col-3 user">
                                    <b>User: </b>
                                    <br> 
                                    <label id="user"></label>
                                </div>
                                <div class="col-3 wallet">
                                    <b>Wallet: </b>
                                    <br> 
                                    <label id="wallet"></label>
                                </div>
                                <div class=" col-3 amount">
                                    <b>Amount: </b>
                                    <br> 
                                    <label id="amount"></label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-3 description">                               
                                    <b>Description: </b>
                                    <br> 
                                    <label id="description"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 image">
                                    <b>image:</b>  
                              
                                    <br>
                                    <br>

                                        <img src="" style="height: 290px; width: 55%; border:rounded;" class="rounded" id="image">
                                </div>  
                            </div>
                                <br>
                            <div class="row pb-4">
                                <div class="col-sm-3 date_added">                           
                                    <b>Date Added:</b>
                                    <br>
                                    <label id="date_added"></label>                            
                                </div>                                
                                <br>
                                <div class="col-3 status">
                                    <b>Status:</b>
                                    <br>
                                    <label id="status"></label>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
<!-- View User -->

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles mb-n5">
            <ol class="breadcrumb">
                @section('titleBar')
                <span class="ml-2">Withdraw Wallets Requests</span>
                @endsection
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <span id="filter_d"></span>    
                <br>

                <div class="card">
                    <div class="card-body">             
                        <div class="table-responsive">
                            <table id="example" class="table dt-responsive nowrap display min-w850">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Wallet</th>
                                        <th>Amount</th>
                                        <th>Description</th>
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

                                    {{-- <td><img src="'+profile_image+'" width="80px" height="80px"><span class="space">\
                                        '+ item.first_name + '</span>\
                                        <span class="space">'+ item.last_name + '</span></td>\  --}}
<script src="{{ url('/public/users/assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ url('/public/users/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('/public/users/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ url('/public/users/assets/js/jquery.ui.min.js') }}"></script>
<script src="{{ url('/public/users/assets/js/jquery.additional.methods.js') }}"></script>
<script>
    $(document).ready(function(){
        var filter = '';
            fetch();
        $(document).on('click', '#filter_data', function() {
            var filter = '';
            fetch(filter);
        });

        $(document).on('click', '#filter_data_Accepted', function() {
            var filter = 'Accepted';
            fetch(filter);
        });

        $(document).on('click', '#filter_data_Rejected', function() {
            var filter = 'Rejected';
            fetch(filter);
        });

        $(document).on('click', '#filter_data_Pending', function() {
            var filter = 'Pending';
            fetch(filter);
        });

        $(document).on('click', '#filter_data_Deleted', function() {
            var filter = 'Deleted';
            fetch(filter);
        });
        function fetch(filter) {

            var settings = {
                "url":  "/admin/withdraw_wallets_requests_fetch",
                "method": "GET",
                "data": {
                    'filter':filter,
                },
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
                            $('tbody').html("");
                            $('#filter_d').html("");
                            var filter = response.filter;                                    // Update the filter buttons
                            var filterButtons = '<button id="filter_data"class="btn ' + (filter === '' ? 'btn-primary' : 'btn-info') + '" style="color: white; margin-bottom:20px;">All</button>' +
                            '<button id="filter_data_Pending" class="btn ' + (filter === 'Pending' ? 'btn-primary' : 'btn-info') + '" style="color: white; margin-bottom:20px; margin-left:1px;">Pending</button>' +
                            '<button id="filter_data_Accepted" class="btn ' + (filter === 'Accepted' ? 'btn-primary' : 'btn-info') + '" style="color: white; margin-bottom:20px; margin-left:1px;">Accepted</button>' +
                            '<button id="filter_data_Rejected" class="btn ' + (filter === 'Rejected' ? 'btn-primary' : 'btn-info') + '" style="color: white; margin-bottom:20px; margin-left:1px;">Rejected</button>' +
                            '<button id="filter_data_Deleted" class="btn ' + (filter === 'Deleted' ? 'btn-primary' : 'btn-info') + '" style="color: white; margin-bottom:20px; margin-left:1px;">Deleted</button>';

                                
                            $('#filter_d').append(filterButtons);
                            $.each(response.WithdrawWallets, function (key, item) { 

                                var statusHtml = '';
                                if (item.status == "Pending") {
                                    statusHtml = '<span class="btn m-1 btn-info">Pending</span>';
                                } else if (item.status == "Accepted") {
                                    statusHtml = '<span class="btn m-1 btn-success">Accepted</span>';
                                } else if (item.status == "Rejected") {
                                    statusHtml = '<span class="btn m-1 btn-warning">Rejected</span>';
                                } else {
                                    statusHtml = '<span class="btn m-1 btn-warning">Deleted</span>';
                                }

                                var actionHtml = '';
                                
                                    actionHtml += '<button class="btn m-1 btn-primary view_withdraw_wallets_request" value="' + item.withdraw_wallets_requests_id + '">';
                                    actionHtml += '<i class="fa fa-eye"></i>';
                                    actionHtml += '</button>';
                                    
                                if (item.status == "Pending") {
                                    actionHtml += '<button class="btn m-1 btn-warning update_data" value="' + item.withdraw_wallets_requests_id + '" data-info="Accepted">';
                                    actionHtml += '<i class="fa fa-check"></i>';
                                    actionHtml += '</button>';
                                    
                                    actionHtml += '<button class="btn m-1 btn-success update_data" value="' + item.withdraw_wallets_requests_id + '" data-info="Rejected">';
                                    actionHtml += '<i class="fa fa-times"></i>';
                                    actionHtml += '</button>';
                                }

                                if (item.status != "Deleted") {
                                    actionHtml += '<button class="btn m-1 btn-danger delete_data" value="' + item.withdraw_wallets_requests_id + '" data-info="Deleted">';
                                    actionHtml += '<i class="fa fa-trash"></i>';
                                    actionHtml += '</button>';
                                }
                                $('tbody').append('\
                                    <tr class="odd gradeX">\
                                        <td>' + (key + 1) + '</td>\
                                        <td>' + item.users_customer.first_name +' ' +item.users_customer.last_name +'</td>\
                                        <td>' + item.system_currency.code + ' (' + item.system_currency.symbol + ')</td>\
                                        <td>' + item.amount + '</td>\
                                        <td>' + item.description + '</td>\
                                        <td>' + statusHtml + '</td>\
                                        <td>' + actionHtml + '</td>\
                                    </tr>\
                                ');
                            });
            });
        }
        $(document).on("click",'.delete_data', function (e) {
                e.preventDefault();
                var withdraw_wallets_requests_id=$(this).val();;
                var settings = {
                "url":"/admin/withdraw_wallets_requests_delete",
                "method": "POST",
                "data": {
                    'withdraw_wallets_requests_id':withdraw_wallets_requests_id,
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
                var withdraw_wallets_requests_id=$(this).val();
                var status=$(this).data("info");
                var settings = {
                "url": "/admin/withdraw_wallets_requests_update",
                "method": "POST",
                "data": {
                    'withdraw_wallets_requests_id':withdraw_wallets_requests_id,
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


        $(document).on("click",'.view_withdraw_wallets_request', function (e) {
            e.preventDefault();
            var withdraw_wallets_requests_id=$(this).val();
            $('#viewWithdrawWalletRequestModal').modal('show');
            var settings = {
                "url":  "/admin/withdraw_wallets_requests_edit/"+withdraw_wallets_requests_id,
                "method": "GET",
            };
            $.ajax(settings).done(function (response) {
                    $('#UsersCustomersViewModal').html("");
                    if ($('.image').hasClass('d-none')) {
                        $('.image').removeClass('d-none');
                    } 
                    if(response.status == "success"){
                        $('#user').html(response.data.users_customer.first_name + ' ' +  response.data.users_customer.last_name);
                        $('#wallet').html(response.data.system_currency.code + ' ' +  response.data.system_currency.symbol);
                        $('#amount').html(response.data.amount);
                        $('#description').html(response.data.description);
                        if (!response.data.image) {
                            $('.image').addClass("d-none");
                        }else{
                            $('#image').attr("src", "{{ url('/public') }}" + "/"+response.data.image);
                        }

                        $('#date_added').html(response.data.date_added);
                        $('#status').html(response.data.status);

                    }else{
                        toastr.success(response.message);
                    }
            });
        });


    });
</script>
@endsection