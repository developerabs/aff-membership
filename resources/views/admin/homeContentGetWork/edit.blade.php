@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Get Work</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('homeContentGetWork.view') }}" class="btn btn-primary">All Get Work</a></li>
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
            <form action="{{ route('homeContentGetWork.update',$editData->id) }}" method="POST">
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
                  <input type="text" class="form-control" name="title" id="title" value="{{ $editData->title }}" placeholder="Enter Title Name">
                </div> 
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="icon">Icon *</label>
                  <input type="text" class="form-control" name="icon" id="icon" value="{{ $editData->icon }}" placeholder="Enter Icon Name">
                </div> 
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Details *</label> 
                  <textarea name="details" id="details" class="form-control" cols="30" rows="10">{{ $editData->details }}</textarea>
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