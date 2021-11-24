@extends('frontend.layouts.app')
@section('content')
<section class="my-5 gradient-custom ">
    <div class="container mx-auto">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card p-4 mx-auto text-center" style="border-radius: 1rem;">
            <div class="card-body">
                <div class="pb-4">
                    <h2 class="orange text-center">Update Profile</h2>
                </div>
                <form method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
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
                    <div class="form-group mb-3">
                        <input type="text" name="name" value="{{ Auth::user()->name }}"  required placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" value="{{ Auth::user()->email }}" required placeholder="Enter Your Email" class="form-control" readonly>
                    </div>  
                        <!-- <p class="small mb-3 pb-lg-2 "><a class="-50 text-danger" href="#!">Forgot password?</a></p> -->
        
                        <button class="btn btn-success btn-md px-5 text-white" type="submit">Update</button>
                         
                    
                </form>
  
                        
              </div>
         
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
@endsection