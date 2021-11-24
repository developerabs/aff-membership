@extends('frontend.layouts.app')
@section('content')
    <!-- blog details sec  -->
    <section class="my-5 ">
        <div class="container mx-auto">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12">
                <div class="card">
                    <img src="{{ asset($blogsData->img) }}" width="100%" height="300px">
                    <div class="card-body">
                        <p class="blog-hint">{{ $blogsData->cat_name }}</p>
                        <h4>{{ $blogsData->title }}</h4>
                        <p class="blog-text mb-4">
                            {!! $blogsData->details !!}
                        </p>
                        <br> 
                        <small><strong>Date:</strong>{!! $blogsData->created_at !!}</small>
                    </div>
                </div>
             
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> 

@endsection