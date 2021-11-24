@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Web Site Settings</h1>
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
            <form action="{{ route('sitesettings.update') }}" method="POST" enctype="multipart/form-data">
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
                  <label for="site_name">Site Name*</label>
                  <input type="text" class="form-control" name="site_name" id="site_name" value="{{ $allData->site_name }}" placeholder="Enter Site Name">
                </div>   
                <div class="form-group">
                  <label for="title">Site Title*</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ $allData->title }}" placeholder="Enter Site Name">
                </div>   
                <div class="form-group">
                    <label for="logo">Logo *</label>
                    <input type="file" class="form-control" name="logo" id="logo">
                </div> 
                <img src="{{ asset($allData->logo) }}" alt="" style="width:140px; height:100px">
                <div class="form-group">
                    <label for="about">Footer About *</label>
                    <textarea name="about" id="about" class="form-control" cols="30" rows="10">{{ $allData->about }}</textarea>
                </div>  
                <div class="form-group">
                  <label for="title_2">Copy Right*</label>
                  <input type="text" class="form-control" name="copy" id="copy" value="{{ $allData->copy }}" placeholder="Enter Copy Right">
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