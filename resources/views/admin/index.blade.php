
@extends('admin.layouts.app')
@section('admin')
    

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            @php
                  $newOrder = DB::table('orders')  
                              ->where('status',0) 
                              ->count(); 
              @endphp
            <div class="inner">
              <h3>{{ $newOrder }}</h3> 
              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div> 
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            @php
                  $complitedOrder = DB::table('orders')  
                              ->where('status',2) 
                              ->count(); 
              @endphp
            <div class="inner">
              <h3>{{ $complitedOrder }}</h3>

              <p>Complited Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div> 
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            @php
                  $totalServices = DB::table('services')  
                              ->count(); 
              @endphp
            <div class="inner">
              <h3>{{ $totalServices }}</h3>

              <p>Total Services</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div> 
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            @php
                  $totalUsers = DB::table('users')  
                              ->count(); 
              @endphp
            <div class="inner">
              <h3>{{ $totalUsers }}</h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div> 
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>



  @endsection