@extends('frontend.layouts.app')
@section('content')
     <!-- start - banner section -->
     <section class="bg-white mb-5">
        <div class="container mx-auto  py-5 ">
            <div class="row align-items-center">
                <div class="col-lg-12 px-5 px-lg-3 px-xl-4 mt-5 mt-lg-0">
                    <h1 class="text-uppercase text-lg-start text-center orange mb-3 fw-bold">
                        {{ $AboutPage->title }}</h1>
                    <div class="py-2">
                        <p class="">
                          {!! $AboutPage->details !!}
                        </p>
                    </div>
                </div>
              
            </div>
        </div>
    </section> 
@endsection