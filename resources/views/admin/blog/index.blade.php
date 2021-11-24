@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Blogs</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('blog.add') }}" class="btn btn-primary">Add New</a></li>
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
          <th>Image</th> 
          <th>Action</th> 
        </tr>
        </thead>
        <tbody>
            @foreach ($allData as $key => $data)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $data->title }}  </td> 
                <td>{{ $data->cat_name }}  </td> 
                <td><img src="{{ asset($data->img) }}" alt="" style="width:120px; height:100px;">  </td>   
                <td>
                    <a href="{{ route('blog.edit',$data->id) }}" class="btn btn-info btn-sm">Edit</a> 
                    <a href="{{ route('blog.delete',$data->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                </td> 
            </tr>
            @endforeach
       
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection