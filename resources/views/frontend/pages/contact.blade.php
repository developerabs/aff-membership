@extends('frontend.layouts.app')
@section('content')
        <!-- contact form sec  -->
        <section class="my-5 ">
            <div class="container mx-auto">
              <div class="row d-flex justify-content-center  ">
                <div class="col-md-6">
                  <div class="card p-4 mx-auto text-center" style="border-radius: 1rem;">
                    <div class="card-body">
                        <div class="pb-4">
                            <h2 class="orange text-center">Contact Us</h2>
                        </div>
                    <div class="form-group mb-3">
                        <input type="text" name="uname" placeholder="Username" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <input type="email" name="Email" placeholder="Enter Your Email" class="form-control">
                      </div>
                      <textarea class="form-control" rows="5" id="comment" name="text"
                      placeholder="Enter Your Messege"></textarea>

                        <button class="mt-3 btn btn-success btn-md px-5 text-uppercase text-white" type="submit">send</button>
                    </div>
          
                                
                      </div>
                 
                  </div>
                  <div class="col-md-6">
                    <div class="card p-4 mx-auto">
                      <div class="card-body">
                        <h4 class="text-success">Contact Information</h4>
                        <p class="mt-4"><strong>Address:</strong> Dhaka, Bangladesh</p> 
                        <p class="mt-2"><strong>Email:</strong> demo@gmail.com</p> 
                        <p class="mt-2"><strong>Phone Number:</strong> 0842442410541</p> 
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </section> 
@endsection