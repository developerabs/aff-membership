@extends('frontend.layouts.app')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<div class="container mx-auto">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="">

            <h1 class="app-page-title">My Account</h1>
            <div class="mt-4"> 
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        {!! $message !!}
                    </div>
                    <?php Session::forget('success');?>
                    @endif 
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        {!! $message !!}
                    </div>
                    <?php Session::forget('error');?>
                    @endif
            </div>
            <div class="row gy-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder mb-2"> 
                                        {{-- <img src="{{ asset(Auth::user()->profile_photo_path) }}" alt="" style="width: 50px; height:50px; border-radius:50%;"> --}}
                                        <img src="{{ asset('upload/profile/149071.png') }}" alt="" style="width: 50px; height:50px; border-radius:50%;">
                                    </div>
                                    <!--//icon-holder-->

                                </div>
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4 w-100"> 
                            <!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Name</strong></div>
                                        <div class="item-data">{{ Auth::user()->name }}</div>
                                    </div>
                                </div>
                                <!--//row-->
                            </div>
                            <!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Email</strong></div>
                                        <div class="item-data">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                                <!--//row-->
                            </div>
                            <!--//item-->
                        </div>
                        <!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a href="{{ route('page.manageProfile') }}" class="btn app-btn-secondary" href="#">Manage Profile</a>
                        </div>
                        <!--//app-card-footer-->

                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-check"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z" />
                                            <path fill-rule="evenodd"
                                                d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        </svg>
                                    </div>
                                    <!--//icon-holder-->

                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Security</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Password</strong></div>
                                        <div class="item-data">••••••••</div>
                                    </div>
                                    <!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="">Change</a>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <!--//item-->
                        </div>
                        <!--//app-card-body-->

                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="#">Manage Security</a>
                        </div>
                        <!--//app-card-footer-->

                    </div>
                    <!--//app-card-->
                </div>
                <div class="col-12 col-lg-12">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z" />
                                        </svg>
                                    </div>
                                    <!--//icon-holder-->

                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">My Orders</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"> 
                                  <a class="nav-link active" style="border: none" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><h5 class="app-card-title" style="border: 1px solid rgb(34, 197, 238); padding:8px">Service Orders</h5></a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><h5 class="app-card-title" style="border: 1px solid rgb(34, 197, 238); padding:8px">Package Orders</h5></a>
                                </li> 
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        @php
                                            $userOrders = DB::table('orders')
                                                    ->join('users', 'users.id', '=', 'orders.customer_id') 
                                                    ->join('services', 'services.id', '=', 'orders.service_id')  
                                                    ->select('orders.*', 'users.name as u_name','services.title')
                                                    ->where('orders.customer_id',Auth::user()->id)
                                                    ->where('orders.orderTypw',0)
                                                    ->orderby('id','desc')
                                                    ->get(); 
                                        @endphp
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Order Id</th>
                                                <th>Service Name</th>
                                                <th>Amount</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            @foreach ($userOrders as $key=> $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->order_id }}</td>
                                                <td>{{ $item->title }}</td>  
                                                
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    @if ($item->status == 2)
                                                        <span style="padding: 2px 4px; color:#fff; background-color:rgb(7, 161, 20) ">Completed</span>
                                                        @elseif($item->status == 1)  
                                                        <span style="padding: 2px 4px; color:#fff; background-color:rgb(208, 211, 13) ">Processing</span>
                                                        @else
                                                        <span style="padding: 2px 4px; color:#fff; background-color:rgb(208, 211, 13) ">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('page.serviceDetails',$item->id) }}" class="btn btn-info btn-sm text-white">Details</a>
                                                    <a href="{{ route('admin.servicePrint',$item->id) }}" class="btn btn-warning btn-sm text-white" target="_blank">Print</a>
                                                </td>
                                            </tr> 
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        @php
                                        $userOrders = DB::table('orders')
                                                ->join('users', 'users.id', '=', 'orders.customer_id') 
                                                ->join('package_categories', 'package_categories.id', '=', 'orders.service_id')  
                                                ->select('orders.*', 'users.name as u_name','package_categories.cat_name')
                                                ->where('orders.customer_id',Auth::user()->id)
                                                ->where('orders.orderTypw',1)
                                                ->orderby('id','desc')
                                                ->get(); 
                                    @endphp
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Order Id</th>
                                                <th>Package Name</th>
                                                <th>Amount</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                                <th>Status</th>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            @foreach ($userOrders as $key=> $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->order_id }}</td>
                                                <td>{{ $item->cat_name }}</td> 
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    @if ($item->status == 2)
                                                        <span style="padding: 2px 4px; color:#fff; background-color:rgb(7, 161, 20) ">Completed</span>
                                                        @elseif($item->status == 1)  
                                                        <span style="padding: 2px 4px; color:#fff; background-color:rgb(208, 211, 13) ">Processing</span>
                                                        @else
                                                        <span style="padding: 2px 4px; color:#fff; background-color:rgb(208, 211, 13) ">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('page.packageDetails',$item->id) }}" class="btn btn-info btn-sm">Details</a>
                                                    <a href="{{ route('admin.packagePrint',$item->id) }}" class="btn btn-warning btn-sm text-white" target="_blank">Print</a>
                                                </td>
                                            </tr> 
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    sdfsfsf
                                </div>
                              </div> 
                            
                           
                            <!--//item-->
                        </div> 
                        <!--//app-card-body-->  

                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                
                {{-- <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                                            <path
                                                d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                                        </svg>
                                    </div>
                                    <!--//icon-holder-->

                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Payment methods</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><i
                                                class="fab fa-cc-visa me-2"></i><strong>Credit/Debit Card </strong>
                                        </div>
                                        <div class="item-data">1234*******5678</div>
                                    </div>
                                    <!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="#">Edit</a>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><i
                                                class="fab fa-paypal me-2"></i><strong>PayPal</strong></div>
                                        <div class="item-data">Secure PayPal Payment</div>
                                    </div>
                                    <!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="#">Connect</a>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <!--//item-->
                        </div>
                        <!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="#">Manage Payment</a>
                        </div>
                        <!--//app-card-footer-->

                    </div>
                    <!--//app-card-->
                </div> --}}
            </div>
            <!--//row-->

        </div>
        <!--//container-fluid-->
    </div>
</div>
<!--//app-content-->
@endsection