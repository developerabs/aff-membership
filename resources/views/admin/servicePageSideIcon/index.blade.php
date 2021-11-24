@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Service Page Side Icons</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('servicesPageSideIcon.add') }}" class="btn btn-primary">Add New</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="card"> 
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>SL.</th>
          <th>Title</th>  
          <th>Icon</th> 
          <th>Action</th> 
        </tr>
        </thead>
        <tbody>
            @foreach ($allData as $key => $data)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $data->title }}  </td>  
                <td>{{ $data->icon }}  </td> 
                <td>
                    <a href=" }" class="btn btn-info btn-sm">Edit</a> 
                    <a href="{{ route('servicesPageSideIcon.delete',$data->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                </td> 
            </tr>
            @endforeach
       
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection