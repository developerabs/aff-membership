@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('blog.view') }}" class="btn btn-primary">All Blog</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary"> 
            <!-- form start -->
            <form action="{{ route('blog.update',$editData->id) }}" method="POST" enctype="multipart/form-data">
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
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Title *</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ $editData->title }}" placeholder="Enter Category Name">
                </div> 
                <div class="form-group">
                  <label for="cat_id">Category *</label>
                  <select name="cat_id" id="cat_id" class="form-control">
                    <option value="" disabled>Select a Category</option>
                      @foreach ($Category as $item)
                      <option value="{{ $item->id }}" {{ $item->id == $editData->cat_id ? 'selected' :''}}>{{ $item->name }}</option> 
                      @endforeach
                      
                  </select>
                </div> 
                <div class="form-group">
                  <label for="details">Details *</label>
                  <textarea name="details" id="details" class="form-control" cols="30" rows="10">{{ $editData->details }}</textarea>
                </div>  
                <div class="form-group">
                    <label for="img">Gallery Image *</label>
                    <input type="file" class="form-control" name="img" id="img">
                    <img src="{{ asset($editData->img) }}" class="mt-2" alt="" style="width:120px; height:100px;">
                </div>   
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div> 
          <!-- /.card -->

        </div> 
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection