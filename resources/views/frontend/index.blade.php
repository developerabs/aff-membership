@extends('frontend.layouts.app')
@section('content')
    

  <!-- start - banner section -->
  <section class="bg-white mb-5">
    <div class="container mx-auto  py-5 ">
        <div class="row align-items-center">
            <div class="col-lg-6 banner-left ">
                <h1 class="text-capitalize text-dark mb-3 fw-bold">{{ $HomeContentBanner->title_1 }}</h1>
                <div class="py-2">
                    <h2 class="text-capitalize mb-2  tomato-color">{{ $HomeContentBanner->title_2 }}</h2>
                    <p class="h6-text">
                        {!! $HomeContentBanner->details !!}
                    </p>
                </div>

                <a href="{{ route('page.allService') }}"> <button class="btn btn-warning text-white ml-5 mt-3 text-uppercase">Browse
                        Service</button></a>
            </div>
            <div class="col-lg-6 py-2 ">
                <img src="{{ asset($HomeContentBanner->img) }}"
                    width="80%" height="500px" style="background-size:cover ;">
            </div>
        </div>
    </div>
</section>

<!-- start get work section  -->
<section class="bg-white mb-5">
    <div class="container mx-auto py-5 px-3">

        <div class="py-2">
            <h3 class="text-dark text-center ">It's Easy to Get Work Done on BOOSTBO</h3>
            <hr class=" mx-auto" style="width: 40px;">
        </div>

        <div class=" mx-auto text-center py-3 d-table">
            @foreach ($HomeContentGetWork as $item)
            <div class="d-block d-lg-table-cell px-2">
                <div class="pt-3">
                    <span class="border border-2 rounded-circle p-3 align-items-center">
                        <i class="{{ $item->icon }} text-primary"></i>
                    </span>
                    <br>
                    <br>
                    <h5 class="py-2">{{ $item->title }}</h5>
                    <p class="text mx-auto">{!! $item->details !!}</p>
                </div>

            </div> 
            @endforeach
            
        </div>
    </div>
</section>

<!-- Categories -->

<section class="bg-white mb-5">
    <div class="container mx-auto text-center py-5">
        <div class="py-2 ">
            <h2 class="">Popular Categories</h2>
            <hr class=" mx-auto" style="width: 40px;">
        </div>
        <div class="row row-cols-lg-3 row-cols-2 g-2 pt-2">
            @foreach ($categoryData as $item) 
            <div class="col">
                <a href="{{ route('page.categories',['id' => $item->id , 'slug' => $item->slug ]) }}" class=" header-link">
                    <div class="card py-4 align-items-center">
                        <div class="py-3 text-center ">
                            <span class=" rounded-circle p-2 purple align-items-center">
                                <i class="{{ $item->icon }} text-white"></i>
                            </span>
                            <br>
                            <h6 class="pt-4">{{ $item->name }}</h6>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <a href="{{ route('page.allService') }}" class="">
            <button class="btn btn-primary text-white mx-auto my-4">See All Services</button>
        </a>

    </div>
</section>

<!-- SERVICES SECTION -->
<section class="mb-5 bg-white">
    <div class="container mx-auto py-5">


        <div id="mycarouselService" class="carousel carousel-dark slide" data-bs-touch="false" data-bs-interval="false">
            <!----slide Indicators----->
            <!----slide Indicators End----->
            <div class="carousel-inner" role="listbox">

                
                <!----- carousel-item2----->

                <div class="carousel-item active">

                   <div class="d-flex p-2 gap-3">
                        @foreach ($PackageCategory as $packageitem)
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class=" pt-4 card text-center">
                                <a href="#" class="text-decoration-none">
                                    <h3 class="text-h3 ">{{ $packageitem->cat_name }}</h3> 
                                    <div class="bg-tomato mt-3">
                                        <h2 class="text-white text-center py-3">${{ $packageitem->price }}</h2>
                                    </div>
                                    @php
                                        $packagesFeatures = DB::table('package_features') 
                                                                ->where('cat_id',$packageitem->id)
                                                                ->get(); 
                                    @endphp
                                    @foreach ($packagesFeatures as $item)
                                    <div class=" d-flex gap-1 align-items-baseline px-4 border-bottom">
                                        <i class="far fa-star text-warning"></i>
                                        <p class="  pt-3 service-text">{{ $item->name }}</p>
                                    </div> 
                                    @endforeach
                                    

                                    <div class="btn-group my-3 px-xl-5 px-lg-4 px-md-4 px-sm-4 px-1" role="group"
                                        aria-label="btngroup">
                                        <a href="{{ route('page.packageOrder',$packageitem->id) }}" class="btn btn-secondary"><i
                                                class="fas fa-shopping-cart mt-1"></i></a>
                                        <a href="{{ route('page.packageOrder',$packageitem->id) }}" class="btn btn-danger order-text text-white">Order Now</a>
                                    </div>
                                </a>

                            </div>
                        </div> 
                        @endforeach
                        
                        
                    </div>
                </div>
              
            </div>
            <!-------prev & next icon------>
            <button class="carousel-control-prev" type="button" data-bs-target="#mycarouselService" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mycarouselService" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <!-------prev & next icon End------>
            <br>
        </div>
    </div>
</section>

<!-- MONEY PROTECTION SEC -->
<section class=" py-5">
    <div class="container mx-auto">
        <div class="row gap-5 align-items-center ">
            <div class="col-lg-3 bg-white">
                <img src="{{ asset($MoneyProtectionContent->img) }}"
                    width="300px">
            </div>
            <div class="col-lg-8">
                <h5 class="text-uppercase">{{ $MoneyProtectionContent->title_1 }}</h5>
                <h1>{{ $MoneyProtectionContent->title_2 }} </h1>
                <h6 class="pt-5">{!! $MoneyProtectionContent->details !!}</h6>
            </div>
        </div>
        <div class="text-center pt-5 mx-auto">
            <a href="{{ route('login') }}" target="_blank">
                <button class="btn bg-warning text-white text-uppercase">
                    Get started</button></a>
        </div> 

</section>


<!-- JOIN FOR FREE -->
<section style="background-color: rgb(255, 153, 0);">
    <div class="container mx-auto py-5 text-center text-white">
        <h3>{{ $FindYourTarget->title }}</h3>
        <p class="mx-auto">{!! $FindYourTarget->details !!}</p>
        <a href="{{ route('login') }}">
            <button class="btn bg-white text-warning text-uppercase mt-4">
                JOIN FOR FREE</button></a> 

    </div>
    <div>

    </div>
</section>


@endsection