@extends('frontend.layouts.app')
@section('content')
    <!-- blog sec  -->
    
    <section class="my-5 container mx-auto ">
        <div class="">
            <h1 class="text-center my-2 text-uppercase fw-bold">Bl<span class="orange">o</span>gs</h1>
        <hr class="mx-auto " style="width: 50px;">
<div class="container py-4">
    <div class="row">
        @foreach ($blogsData as $item)
        <div class="col-lg-4 col-12">
            <div class="card">
                <img src="https://image.freepik.com/free-vector/online-shopping-instagram-posts_23-2148903291.jpg" width="100%">
                <div class="card-body">
                    <p class="blog-hint">{{ $item->cat_name }}</p>
                    <h4>{{ $item->title }}</h4>
                    <div style="height: 88px; overflow:hidden;" >
                        <p class="blog-text">
                            {!! $item->details !!}
                        </p>
                    </div>
                    <a href="{{ route('page.blogDetails',$item->id) }}" class="text-decoration-none">Learn More</a>
                </div> 
            </div>
        </div>   
        @endforeach
        

    </div>
</div>
      </section> 
@endsection