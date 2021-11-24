@extends('admin.layouts.app')
@section('admin')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('orders.view') }}" class="btn btn-primary">Back</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="" style="margin-bottom: 200px; margin-top:0px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @php
                    $serviceOrdersDetails = DB::table('orders')
                            ->join('users', 'users.id', '=', 'orders.customer_id') 
                            ->join('package_categories', 'package_categories.id', '=', 'orders.service_id')  
                            ->select('orders.*', 'users.name as u_name','users.email','package_categories.cat_name')
                            ->where('orders.customer_id',Auth::user()->id)
                            ->where('orders.id',$orderId)
                            ->orderby('id','desc')
                            ->first(); 
                @endphp
                <div class="service-order-details py-4">  
                    <div class="row my-4">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class=" mt-4">
                                        <h2>{{ $serviceOrdersDetails->cat_name }}</h2> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class=" my-4">
                                        <div class="" style="margin-left: 20px">
                                            <h5 class="text-primary"> {{ $serviceOrdersDetails->u_name }}</h5>
                                            <hr>
                                            <p class="mt-2"><strong>Email:</strong> {{ $serviceOrdersDetails->email }}</p>
                                            <p class="mt-2"><strong>Order Id:</strong> {{ $serviceOrdersDetails->order_id }}</p>
                                            <p class="mt-2"><strong>Payment Method:</strong> {{ $serviceOrdersDetails->paymentType }}</p>
                                            @if ( $serviceOrdersDetails->orderTypw == 0)
                                            <p class="mt-2"><strong>Payment Id:</strong> {{ $serviceOrdersDetails->paypal_payment_id }}</p>
                                            @endif
                                            <p class="mt-2"><strong>Amount:</strong> ${{ $serviceOrdersDetails->amount }}</p>
                                            <p class="mt-2"><strong>Status:</strong> 
                                                @if ($serviceOrdersDetails->status == 2)
                                                    <span style="padding: 2px 4px; color:#fff; background-color:rgb(7, 161, 20) ">Completed</span>
                                                    @elseif($serviceOrdersDetails->status == 1)  
                                                    <span style="padding: 2px 4px; color:#fff; background-color:rgb(208, 211, 13) ">Processing</span>
                                                    @else
                                                    <span style="padding: 2px 4px; color:#fff; background-color:rgb(208, 211, 13) ">Pending</span>
                                                @endif
                                            </p>
                                            <p class="mt-2"><strong>Order Id:</strong> {{ $serviceOrdersDetails->order_id }}</p>
                                            <p class="mt-2"><strong>Order Date:</strong> {{ $serviceOrdersDetails->created_at }}</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection