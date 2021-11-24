@extends('frontend.layouts.app')
@section('content')


<section class="my-5 gradient-custom ">
    <div class="container mx-auto">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card p-4 mx-auto text-center" style="border-radius: 1rem;">
            <div class="card-body">
                <div class="pb-4">
                    <h2 class="orange text-center">Forget Password</h2>
                </div>
                <form method="POST" action="{{ route('password.email') }}">
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
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif 
                    <div class="form-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="Enter Your Email" class="form-control">
                    </div> 
                        <!-- <p class="small mb-3 pb-lg-2 "><a class="-50 text-danger" href="#!">Forgot password?</a></p> -->
        
                        <button class="btn btn-success btn-md px-5 text-white" type="submit">Forget</button>
                        <div>
                            <p class="mb-0 pt-3 text-dark">Do you have an account? 
                                <a href="{{ route('login') }}" class="-50 fw-bold text-decoration-none">Log In</a></p>
                        </div> 
                    
                </form>
  
                        
              </div>
         
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 

@endsection
