@extends('frontend.layouts.app')
@section('content')

     <!-- faq section  -->
     <section class="container mx-auto py-5">
        <div class="pb-4">
            <h4 class="text-center ">{{ $FaqPage->title }}</h4>
            <hr class="mx-auto " style="width: 50px;">
        </div>
        <div class="accordion" id="accordionExample">
            
            <p>{!! $FaqPage->details !!}</p>
          </div>

   </section>
@endsection