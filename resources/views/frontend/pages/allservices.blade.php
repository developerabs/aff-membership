@extends('frontend.layouts.app')
@section('content')
<main class="container py-4 mx-auto px-3">
    <div class="d-flex gap-2">
      <div class="d-flex gap-2 align-items-center">
        <p class="uppercaser p-nav">Home</p>
        <span>
          <i class="fas fa-angle-right text-secondary"></i>
        </span>
      </div>
      <div class="d-flex gap-2 align-items-center">
        <p class="uppercase p-nav">All Services</p>
      </div> 
    </div>
    <div class="pt-4">
      <p class="title">All Services</p> 
    </div>
  </main>
 
  <section class="container mx-auto py-4">
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-sm-flex gap-2">
        <p>{{ $servicesCount }}</p> 
        <span class="service font-14">service available</span>
      </div> 
    </div>
  </section>

  <!-- item  setion-->
  <section class="container mx-auto pb-4">
    <div class="row">
      @foreach ($servicesData as $item) 
      <div class="col-md-4 mb-4">
        <div class="category_items">
          <a href="{{ route('page.service',['id' => $item->id , 'slug' => $item->slug ]) }}">
            <img alt="" class="" src="{{ asset($item->service_img) }}" style="width: 100%; height:200px;">
        </a>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="px-3 pb-3 "> 
              <a href="{{ route('page.service',['id' => $item->id , 'slug' => $item->slug ]) }}" class="text-decoration-none text-dark">
                  <p class="font-14 fw-bolder  mt-4">{{ $item->title }}</p>
              </a>
              
              <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                <div class="d-flex gap-1  align-items-center py-3">
                  <span><i class="fa fa-star fa-sm tomato"></i></span>
                  <div class="d-flex">
                  </div>
                  <p class="tomato">5.0</p>
                  @php
                      $reviewCount = DB::table('reviews') 
                                        ->where('service_id',$item->id) 
                                        ->count();
                  @endphp
                  <p>(<span class="text-primary">{{ $reviewCount }}</span>)</p>
                </div>
                <div>
                  <p class="text-uppercase text-secondary fw-bold font-14">Starting at <span
                      style="font-size: 20px;">${{ $item->price }}</span></p>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
      @endforeach
    </div> 
  </section> 
@endsection