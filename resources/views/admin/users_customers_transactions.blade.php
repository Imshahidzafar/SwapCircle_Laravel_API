@extends('layout.admin.list_master')
@section('content')
    <style>
        .btn-light{
          padding-left:10px;
        }
    </style>
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles mb-n5">
				<ol class="breadcrumb">
                    @section('titleBar')
                    <span class="ml-2">User Customers Transactions</span>
                    @endsection
				</ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-9">
                            <a class="btn <?php if($filter == '') { echo 'btn-primary'; }  else { echo "btn-info"; }?>" href="swap_offers" style="color: white; margin-bottom: 20px;">All</a>
                            <a class="btn <?php if($filter == 'Pending') { echo 'btn-primary'; }  else { echo "btn-info"; }?>" href="swap_offers?filter=Pending" style="color: white; margin-bottom: 20px;">Pending</a>
                            <a class="btn <?php if($filter == 'Approved') { echo 'btn-primary'; }  else { echo "btn-info"; }?>" href="swap_offers?filter=Approved" style="color: white; margin-bottom: 20px;">Approved</a>
                            <a class="btn <?php if($filter == 'Rejected') { echo 'btn-primary'; }  else { echo "btn-info"; }?>" href="swap_offers?filter=Rejected" style="ccolor: white; margin-bottom: 20px;">Rejected</a> 
                        </div>
                        
                       <div class="col-md-3">
    						<div class="widget-stat card bg-success ">
    							<div class="card-body p-2">
    								<div class="media">
    									<span class="mr-1">
    										<i class="flaticon-381-diamond"></i>
    									</span>
    									<div class="media-body text-white text-right">
    										<p class="mb-1">Earning</p>
    										<h3 class="text-white">{{$adminshare->system_currency->code}} {{$adminshare->totalAdminShare}}</h3>
    									</div>
    								</div>
    							</div>
    						</div>
                        </div>
                        <!-- <span style="float: right;"><span style="float: right;" class="btn btn-primary"> Total Admin Share : <strong>{{$adminshare->system_currency->code}} {{$adminshare->totalAdminShare}} </span></span>  -->
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table dt-responsive nowrap display min-w850">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sender</th>
                                            <th>Send Amount</th>
                                            <th>Receiver</th>
                                            <th>Receive Amount</th>
                                            <th>Payment Method</th>
                                            <th>Admin Share</th>
                                            <th>System Country</th>
                                            <th>Base Amount</th> 
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get_data as $key => $data)
                                        <tr class="odd gradeX">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $data->sender->first_name }}</td>
                                            <td>{{ $data->sender_currency->code }} {{ $data->from_amount}}</td>
                                            <td>{{ $data->receiver->first_name}}</td>
                                            <td>{{ $data->receiver_currency->code }} {{ $data->to_amount }}</td>
                                            <td>{{ $data->payment_method->name }}</td>
                                            <td>{{ $data->system_currency->code}} {{ $data->admin_share_amount }} ({{ $data->admin_share }}%)</td>
                                            <td>{{ $data->system_country->name}}</td>
                                            <td>{{ $data->system_currency->code}} {{ $data->base_amount}}</td>
                                            <td>
                                                @if ($data->status=='Pending')
                                                <span class="btn btn-info">Pending</span>
                                                @elseif ($data->status=='Approved')
                                                <span class="btn btn-success">Approved</span>
                                                @elseif ($data->status=='Rejected')
                                                <span class="btn btn-warning">Rejected</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          	</div>
        </div>
    </div>
@endsection