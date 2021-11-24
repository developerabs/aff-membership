@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Orders</h1>
        </div>
        <div class="col-sm-6"> 
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="ml-4">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Service Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Package Orders</a>
      </li> 
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="card">  
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL.</th>
                <th>Order Id</th> 
                <th>Service Name</th> 
                <th>Customer Name</th>  
                <th>Amount</th>  
                <th>Status</th>  
                <th>Action</th> 
              </tr>
              </thead>
              <tbody>
                  @foreach ($serviceData as $key => $data)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $data->order_id }}  </td> 
                      <td>{{ $data->title }}  </td> 
                      <td>{{ $data->u_name }}  </td>  
                      <td>{{ $data->amount }}$  </td>  
                      <td>
                        @if ($data->status == 2)
                          <span style="padding: 2px 4px; color:#fff; background-color:rgb(7, 161, 20) ">Completed</span>
                          @elseif($data->status == 1)  
                          <span style="padding: 2px 4px; color:#fff; background-color:rgb(208, 211, 13) ">Processing</span>
                          @else
                          <span style="padding: 2px 4px; color:#fff; background-color:rgb(208, 211, 13) ">New</span>
                        @endif
                      </td> 
                      <td> 
                        <a href="{{ route('admin.serviceDetails',$data->id) }}" class="btn btn-primary btn-sm">Details</a>
                        <a href="{{ route('admin.servicePrint',$data->id) }}" class="btn btn-info btn-sm" target="_blank">Print</a>
                          @if ($data->status == 2)
                            <a href="{{ route('orders.activeInactive',$data->id) }}" class="btn btn-success btn-sm text-white">Completed</a>
                            @elseif($data->status == 1)
                            <a href="{{ route('orders.activeInactive',$data->id) }}" class="btn btn-warning btn-sm text-white">Complite Now</a>
                            @else  
                            <a href="{{ route('orders.activeInactive',$data->id) }}" class="btn btn-warning btn-sm text-white">Add To Processing</a>
                          @endif
                          <a href="{{ route('orders.delete',$data->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                      </td> 
                  </tr>
                  @endforeach
             
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card">  
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL.</th>
                <th>Order Id</th> 
                <th>Service Name</th> 
                <th>Customer Name</th>  
                <th>Amount</th>  
                <th>Status</th>  
                <th>Action</th> 
              </tr>
              </thead>
              <tbody>
                  @foreach ($packageData as $key => $data)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $data->order_id }}</td>
                      <td>{{ $data->cat_name }}</td>
                      <td>{{ $data->u_name }}  </td>   
                      <td>{{ $data->amount }}$</td> 
                      <td>
                        @if ($data->status == 2)
                          <span style="padding: 2px 4px; color:#fff; background-color:rgb(7, 161, 20) ">Completed</span>
                          @elseif($data->status == 1)  
                          <span style="padding: 2px 4px; color:#fff; background-color:rgb(208, 211, 13) ">Processing</span>
                          @else
                          <span style="padding: 2px 4px; color:#fff; background-color:rgb(208, 211, 13) ">New</span>
                        @endif
                      </td> 
                      <td> 
                        <a href="{{ route('admin.packageDetails',$data->id) }}" class="btn btn-primary btn-sm">Details</a>
                        <a href="{{ route('admin.packagePrint',$data->id) }}" class="btn btn-info btn-sm" target="_blank">Print</a>
                          @if ($data->status == 2)
                            <a href="{{ route('orders.activeInactive',$data->id) }}" class="btn btn-success btn-sm text-white">Completed</a>
                            @elseif($data->status == 1)
                            <a href="{{ route('orders.activeInactive',$data->id) }}" class="btn btn-warning btn-sm text-white">Complite Now</a>
                            @else  
                            <a href="{{ route('orders.activeInactive',$data->id) }}" class="btn btn-warning btn-sm text-white">Add To Processing</a>
                          @endif
                          <a href="{{ route('orders.delete',$data->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                      </td> 
                  </tr>
                  @endforeach
             
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div> 
    </div>
  </section>
 
@endsection