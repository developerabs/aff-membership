@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $PackageCategory->cat_name }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('packagefeature.add') }}" class="btn btn-primary">Add New</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<div class="row">
  <div class="col-md-6">
     <!-- general form elements -->
     <div class="card card-primary"> 
      <!-- form start -->
      <form action="{{ route('packagefeature.store') }}" method="POST">
          @csrf
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <input type="hidden" name="cat_id" value="{{ $PackageCategory->id }}">
        <div class="card-body">  
          <div class="form-group">
            <label for="name">Add New Feature *</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Price">
          </div> 
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div> 
  </div>
  <div class="col-md-6">
    <div class="card"> 
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>SL.</th>  
            <th>Feature Name</th>  
            <th>Action</th> 
          </tr>
          </thead>
          <tbody>
              @foreach ($allData as $key => $data)
              <tr>
                  <td>{{ $key+1 }}</td> 
                  <td>{{ $data->name }}  </td>  
                  <td>
                      <a href="{{ route('packagefeature.edit',['cat_id'=>$data->cat_id,'id'=>$data->id]) }}" class="btn btn-info btn-sm">Edit</a> 
                      <a href="{{ route('packagefeature.delete',$data->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                  </td> 
              </tr>
              @endforeach
         
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
@endsection