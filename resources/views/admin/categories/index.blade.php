@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Categories</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('categories.add') }}" class="btn btn-primary">Add New</a></li>
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
          <th>Category Name</th> 
          <th>Slug</th> 
          <th>Icon</th> 
          <th>Action</th> 
        </tr>
        </thead>
        <tbody>
            @foreach ($allData as $key => $data)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $data->name }}  </td> 
                <td>{{ $data->slug }}  </td> 
                <td>{{ $data->icon }}  </td> 
                <td>
                    <a href="{{ route('categories.edit',$data->id) }}" class="btn btn-info btn-sm">Edit</a>
                    @if ($data->popular == 0)
                    <a href="{{ route('categories.popular',$data->id) }}" class="btn btn-warning btn-sm">Add Popular</a>
                    @else 
                    <a href="{{ route('categories.popular',$data->id) }}" class="btn btn-primary btn-sm">Popular</a> 
                    @endif
                    
                    <a href="{{ route('categories.delete',$data->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                </td> 
            </tr>
            @endforeach
       
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection