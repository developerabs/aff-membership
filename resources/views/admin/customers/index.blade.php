@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Customers</h1>
        </div>
        <div class="col-sm-6"> 
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
          <th>Name</th> 
          <th>Email</th>  
          <th>Action</th> 
        </tr>
        </thead>
        <tbody>
            @foreach ($allData as $key => $data)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $data->name }}  </td> 
                <td>{{ $data->email }}  </td>  
                <td> 
                @if ($data->status == 0)
                   <a href="{{ route('customers.suspendUnsuspend',$data->id) }}" class="btn btn-danger btn-sm text-white">Suspend</a> 
                   @else 
                   <a href="{{ route('customers.suspendUnsuspend',$data->id) }}" class="btn btn-warning btn-sm text-white">Unsuspend</a>
                @endif
                    
                </td> 
            </tr>
            @endforeach
       
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection