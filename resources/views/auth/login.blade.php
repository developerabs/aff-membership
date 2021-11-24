@extends('frontend.layouts.app')
@section('content')
<section class="container mx-auto">
    <div class=" my-5 py-3">
      <div class="row d-flex gap-0 justify-content-center align-items-center">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
            alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST" action="{{ route('login') }}">
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
            <div class="text-center mb-4">
              <h2 class="lead fw-bold text-primary me-3 text-uppercase">LOg In FOrm</h2>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-4" style="font-size: 14px;">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" id="form3Example3" type="email" name="email" value="{{ old('email') }}" required class="form-control form-control-md"
                placeholder="Enter a valid email address" />
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3" style="font-size: 14px;">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" id="form3Example4" name="password" required class="form-control form-control-md"
                placeholder="Enter password" />
            </div>
  
            <div style="font-size: 12px;" class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              <a href="{{ route('password.request') }}" class="text-danger text-decoration-none">Forgot password?</a>
            </div>
            <button class="mt-4  btn btn-success px-5 text-white" type="submit">Submit</button>
              <p  style="font-size: 12px;" class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}"
                  class="orange text-decoration-none">Register</a></p>
        
  
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection

