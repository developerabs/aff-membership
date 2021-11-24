@extends('frontend.layouts.app')
@section('content')

  <!-- Banner-section  -->
  <section class="py-3 bg-light border-bottom ">
    <main class="container mx-auto px-3">
        <div class="d-flex gap-2">
           <div class="d-flex gap-2 align-items-center">
               <p class="p-nav">Home</p>
               <span>
                <i class="fas fa-angle-right text-secondary"></i>
            </span>
           </div>
           <div class="d-flex gap-2 align-items-center">
               <p class="p-nav">Services</p> 
           </div> 
                   
        </div>
        <div class="py-4">
            <p class="title">{{ $serviceData->title }}</p>
            <div class="d-sm-flex gap-3 "> 

                <div class="d-flex gap-1  align-items-center">
                   <div class="d-flex gap-1  align-items-center">
                       <div class="d-flex">
                       <span><i class="fas fa-star fa-sm text-warning"></i></span>
                       <span><i class="fas fa-star fa-sm text-warning"></i></span>
                       <span><i class="fas fa-star fa-sm text-warning"></i></span>
                       <span><i class="fas fa-star fa-sm text-warning"></i></span>
                       <span><i class="fas fa-star fa-sm text-warning"></i></span>
                    </div>
                    <div class="d-flex align-items-center py-2 py-sm-0">
                       <p class="" style="font-size: 16px;">5.00</p>
                       <p>(<span class="text-primary">5 ratings</span>)</p>
  
                    </div>
               </div>
               <div class="d-flex  align-items-center gap-1">
                   <span>
                       <i class="fas fa-shopping-cart text-secondary"></i>  
                                     </span>
                   <p><strong style="font-size:16px">{{ $salesCount }}</strong> sales</p>        
               </div>
            </div>
           </div>
       </div>

            <button class="btn bg-white border ">SEE Details</button>
    </main>
</section>
 
 <!-- details - section  -->
  <section class="container mx-auto pb-4">
   <div class="row px-2 px-md-0 gap-5 align-items-baseline justify-content-between">
       <div class="col-lg-7 bg-white align-self-start ">
          <div>
              <div class="bg-cover">
                  <img src="{{ asset($serviceData->service_img) }}" width="100%">
              </div>
              <div class="py-4 px-2">
                  <p>Read Article</p>
                    {{-- service details  --}} 
                    {!! $serviceData->details !!}
              </div>
                   
              <!-- start review sec -->
              <div class="p-2 review-sec">
                 <p style="font-size: 20px;">Reviews ({{ $reviewCount }})</p>
                 @foreach ($serviceReviewData as $item) 
                 <div class="d-flex gap-2 pt-3 ">
                     <div class="" >
                       <div>
                           <p class="pb-2 px-1" style="border-right: dotted;">Happy Client</p>
                         
                           <div style="border-right: dashed;" >
                             <img class="" src="{{ $item->profile_photo_path }}" alt="Oval-19" width="60px" >
                         </div>
                       </div> 

                     </div>

                     <div class="flex-grow-1">
                       <div class="card p-2 mt-4">
                           <div class="d-flex gap-2 justify-content-between align-items-baseline">
                             <div>
                                 <p class="pb-2"><strong>{{ $item->u_name }}</strong> </p>
                                 <p style="font-size: 12px;">{{ $item->details }}</p>    
                               </div>
                               <div class="d-flex"> 
                                   @for ($i = 0; $i < $item->rate; $i++)
                                   <span><i class="fas fa-star fa-sm text-warning"></i></span>
                                   @endfor 
                              </div>    
                           </div>
                         </div> 
                     </div>

                 </div>
                 @endforeach
              </div>
          </div>
       </div>
       
       <!-- left side  -->
       <div class="col-lg-4 mt-5">
           <div class="">
               <div class="card px-3 py-4 text-center">
                   <div class="">
                       <h2>{{ $serviceData->price }}$</h2>
                       <p style="font-size: 16px; font-weight: 500;">Delivery Time- {{ $serviceData->delivery_days }} days</p>
                   </div>
                   <hr>
                   <div class="">
                       <a href="{{ route('page.serviceOrder',$serviceData->id) }}"><button class="mb-2 btn w-100 rounded-pill bg-success text-white">BUY NOW</button></a>
                       <br>
                       {{-- <a href="#"> <button class="btn w-100 rounded-pill btn-outline-success bg-white text-success ">Messege Us</button></a> --}}
                   </div>

               </div>
               <div class="my-5">
                   <div class="px-2">
                       <div class="d-flex justify-content-start gap-2">
                           <div class="">
                               <img src="https://image.freepik.com/free-vector/lock-shield-cyber-security-technology-blue-tone_53876-119533.jpg" height="80px" width="90px">
                           </div>
                           <div>
                               <p><span style="font-size: 16px;"><strong>100% </strong>  Payment Protection</span><br> 
                                   <span style="font-size: 12px;">project done with your 100% satisfication<br>
                                       <span>of 100% refund guarntee</span></span>
                               </p>
                           </div>
                       </div>
                   </div>
               </div>

               <div class=" p-3" style="background-color:  rgb(247, 245, 245);">
                   <div class="d-flex justify-content-between">
                       @foreach ($ServicePageSideIcon as $item)
                       <div class="text-center">
                            <div class="mb-2" ><i class="{{ $item->icon }} fa-3x text-secondary"></i></div>
                            <span style="font-size: 16px;">{{ $item->title }}</span>
                        </div> 
                       @endforeach
                       
                   </div>
               </div>
           </div>

           <div class="p-3 mt-5 mb-2"style="background-color:  rgb(247, 245, 245);">
               <h6 class="text-center">Automatic Instagram Likes</h6>
               <div class="py-3 ">
               <div class="pb-1 d-flex gap-2 align-items-baseline ">
                   <i class="fas fa-check fa-sm text-success"></i>
                 <p class="" style="font-size: 14px;">Automatic Likes On Unlimited Post Per Day</p>
               </div>
               <div class="pb-1 d-flex gap-2 align-items-baseline ">
                   <i class="fas fa-check fa-sm text-success"></i>
                 <p class="   " style="font-size: 14px;">Free Automatic Post On All News Vibes</p>
               </div>
               <div class="pb-1 d-flex gap-2 align-items-baseline ">
                   <i class="fas fa-check fa-sm text-success"></i>
                 <p class="" style="font-size: 14px;">Fast Plan Activation Within 24 Hours</p>
               </div>
               <div class="pb-1 d-flex gap-2 align-items-baseline ">
                   <i class="fas fa-check fa-sm text-success"></i>
                 <p class="" style="font-size: 14px;">We NEVER Ask For Your Password</p>
               </div>
               <div class="pb-1 d-flex gap-2 align-items-baseline">
                   <i class="fas fa-check fa-sm text-success"></i>
                 <p class="" style="font-size: 14px;">100% Money Back Gauranted</p>
               </div>
               <div class="pb-1 d-flex gap-2 align-items-baseline">
                   <i class="fas fa-check fa-sm text-success"></i>
                 <p class="" style="font-size: 14px;">No Contracts Cancel At Anytime</p>
               </div>
               <br>
           </div>
           </div>
           </div>

       </div>
   </div>

</div>
</section>

  <section class="my-4">
      <div class=" bg-light">
       <div class="mx-auto  container py-3 px-4">
           <a href="#" class="text-decoration-none" style="color: rgb(8, 187, 88);">        
               <h4 class="text-uppercase">Packages</h4>
           </a>
       </div>      
            </div>


        <!-- SERVICES SECTION -->
   <section class="mb-5 bg-white">
       <div class="container mx-auto">


           <div id="mycarouselService" class="carousel carousel-dark slide" data-bs-touch="false" data-bs-interval="false">
               <!----slide Indicators----->
               <!----slide Indicators End----->
               <div class="carousel-inner" role="listbox">

                   <div class="carousel-item active">
                    <div class="d-flex p-2 gap-3">
                        @foreach ($PackageCategory as $packageitem )
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
                   <!----- carousel-item2----->
 
                 
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



@endsection