@extends('admin.layouts.app')
@section('admin')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Service</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('services.view') }}" class="btn btn-primary">All Services</a></li>
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
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
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
                  <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Category Name">
                </div> 
                <div class="form-group">
                  <label for="cat_id">Category *</label>
                  <select name="cat_id" id="cat_id" class="form-control">
                      <option value="" disabled selected>Select a Category</option>
                      @foreach ($Category as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option> 
                      @endforeach
                      
                  </select>
                </div> 
                <div class="form-group">
                  <label for="details">Details *</label>
                  <textarea name="details" id="details" class="form-control" cols="30" rows="10">{{ old('details') }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="price">Price *</label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Enter Price">
                </div>
                <div class="form-group">
                    <label for="delivery_days">Delivery Time *</label>
                    <input type="number" class="form-control" name="delivery_days" id="delivery_days" value="{{ old('delivery_days') }}" placeholder="Enter Delivery Time">
                </div>
                <div class="form-group">
                    <label for="service_img">Gallery Image *</label>
                    <input type="file" class="form-control" name="service_img" id="service_img">
                </div>
                <div class="form-group">
                  <label for="seo_keywords">SEO Keywords *</label>
                  <input type="text" class="form-control" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keywords') }}" placeholder="Enter Category Name">
                </div> 
                <div class="form-group">
                  <label for="seo_description">SEO Description *</label>
                  <textarea name="seo_description" id="seo_description" class="form-control" value="{{ old('seo_description') }}" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <input type="checkbox" name="status" id="status" value="1" style="height: 25px; width:25px;">
                  <label for="status" style="position: absolute; margin:0px 10px;">Publice The Services</label> 
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