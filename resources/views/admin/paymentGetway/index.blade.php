@extends('admin.layouts.app')
@section('admin')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Payment Getways</h1>
        </div> 
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary"> 
            <!-- form start -->
            <form action="{{ route('paypalGetway.update') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="client_id">Paypal Client ID *</label>
                        <input type="text" class="form-control" name="client_id" id="client_id" value="{{ $PaypalGetway->client_id }}" placeholder="Enter Paypal Client ID">
                    </div> 
                    <div class="form-group">
                        <label for="client_secret">Paypal Client Secret *</label>
                        <input type="text" class="form-control" name="client_secret" id="client_secret" value="{{ $PaypalGetway->client_secret }}" placeholder="Enter Paypal Client Secret">
                    </div> 
                 </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div> 
          <!-- /.card -->

        </div> 
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary"> 
            <!-- form start -->
            <form action="{{ route('strypeGetway.update') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="stripe_key">STRIPE KEY *</label>
                        <input type="text" class="form-control" name="stripe_key" id="stripe_key" value="{{ $StripeGetway->stripe_key }}" placeholder="Enter STRIPE KEY">
                    </div> 
                    <div class="form-group">
                        <label for="stripe_secrite">STRIPE SECRET *</label>
                        <input type="text" class="form-control" name="stripe_secrite" id="stripe_secrite" value="{{ $StripeGetway->stripe_secrite }}" placeholder="Enter STRIPE SECRET">
                    </div> 
                 </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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