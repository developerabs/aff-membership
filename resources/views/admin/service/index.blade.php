@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Services</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('services.add') }}" class="btn btn-primary">Add New</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="card">  
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>SL.</th>
          <th>Title</th> 
          <th>Category</th> 
          <th>Price</th> 
          <th>Delivery Time</th> 
          <th>Status</th> 
          <th>Action</th> 
        </tr>
        </thead>
        <tbody>
            @foreach ($allData as $key => $data)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $data->title }}  </td> 
                <td>{{ $data->cat_name }}  </td> 
                <td>{{ $data->price }}$  </td> 
                <td>{{ $data->delivery_days }} days  </td> 
                <td>
                  @if ($data->status == 1)
                    <span style="padding: 2px 4px; color:#fff; background-color:rgb(7, 161, 20) ">Active</span>
                    @else  
                    <span style="padding: 2px 4px; color:#fff; background-color:rgb(228, 206, 13) ">Inactive</span>
                  @endif
                </td> 
                <td>
                    <a href="{{ route('services.edit',$data->id) }}" class="btn btn-info btn-sm">Edit</a>
                    @if ($data->status == 1)
                      <a href="{{ route('services.activeInactive',$data->id) }}" class="btn btn-warning btn-sm">Inactive</a>
                      @else  
                      <a href="{{ route('services.activeInactive',$data->id) }}" class="btn btn-warning btn-sm">Active</a>
                    @endif
                    <a href="{{ route('services.delete',$data->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                </td> 
            </tr>
            @endforeach
       
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection