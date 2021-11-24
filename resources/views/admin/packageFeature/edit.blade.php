@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Package Feature</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('packagecategory.view') }}" class="btn btn-primary">All Packages</a></li>
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
            <form action="{{ route('packagefeature.update',$editData->id) }}" method="POST">
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
                <input type="hidden" name="cat_id" value="{{ $cat_id }}">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Feature Name *</label>
                  <input type="text" class="form-control" name="name" value="{{ $editData->name }}" id="name" placeholder="Enter Feature Name">
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