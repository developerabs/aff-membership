@extends('admin.layouts.app')
@section('admin')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>SMTP Settings</h1>
        </div> 
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
    <div class="container-fluid">
      <div class="row"> 
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary"> 
            <!-- form start -->
            <form action="{{ route('smtp.update') }}" method="POST" enctype="multipart/form-data">
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
                      <label for="type">Type *</label>
                      <select name="type" id="type" class="form-control">
                          <option value="" disabled >Select a Type</option>
                          <option value="smtp" {{ ($Smtp->type == 'smtp') ? 'selected':'' }}>SMTP</option> 
                          <option value="sendmail" {{ ($Smtp->type == 'sendmail') ? 'selected':'' }}>Sendmail</option> 
                          <option value="mailgan" {{ ($Smtp->type == 'mailgan') ? 'selected':'' }}>Mailgan</option> 
                      </select>
                    </div> 
                    <div class="form-group">
                        <label for="mail_host">MAIL HOST *</label>
                        <input type="text" class="form-control" name="mail_host" id="mail_host" value="{{ $Smtp->mail_host }}">
                    </div> 
                    <div class="form-group">
                        <label for="mail_port">MAIL PORT *</label>
                        <input type="text" class="form-control" name="mail_port" id="mail_port" value="{{ $Smtp->mail_port }}" >
                    </div> 
                    <div class="form-group">
                        <label for="mail_username">MAIL USERNAME *</label>
                        <input type="text" class="form-control" name="mail_username" id="mail_username" value="{{ $Smtp->mail_username }}" >
                    </div> 
                    <div class="form-group">
                        <label for="mail_pass">MAIL PASSWORD *</label>
                        <input type="text" class="form-control" name="mail_pass" id="mail_pass" value="{{ $Smtp->mail_pass }}">
                    </div> 
                    <div class="form-group">
                        <label for="mail_encription">MAIL ENCRYPTION *</label>
                        <input type="text" class="form-control" name="mail_encription" id="mail_encription" value="{{ $Smtp->mail_encription }}">
                    </div> 
                    <div class="form-group">
                        <label for="from_address">MAIL FROM ADDRESS *</label>
                        <input type="text" class="form-control" name="from_address" id="from_address" value="{{ $Smtp->from_address }}">
                    </div> 
                    <div class="form-group">
                        <label for="from_name">MAIL FROM NAME*</label>
                        <input type="text" class="form-control" name="from_name" id="from_name" value="{{ $Smtp->from_name }}">
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