@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Home Banner Content</h1>
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
            <form action="{{ route('homeContentBanner.update') }}" method="POST" enctype="multipart/form-data">
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
                  <label for="title_1">Title One*</label>
                  <input type="text" class="form-control" name="title_1" id="title_1" value="{{ $allData->title_1 }}" placeholder="Enter Title">
                </div>  
                <div class="form-group">
                  <label for="title_2">Title Two*</label>
                  <input type="text" class="form-control" name="title_2" id="title_2" value="{{ $allData->title_2 }}" placeholder="Enter Title">
                </div>  
                <div class="form-group">
                  <label for="details">Details *</label>
                  <textarea name="details" id="details" class="form-control" cols="30" rows="10">{{ $allData->details }}</textarea>
                </div>  
                <div class="form-group">
                    <label for="img">Gallery Image *</label>
                    <input type="file" class="form-control" name="img" id="img">
                </div> 
                <img src="{{ asset($allData->img) }}" alt="" style="width:120px; height:100px">
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