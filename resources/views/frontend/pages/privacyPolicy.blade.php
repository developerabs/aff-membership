@extends('frontend.layouts.app')
@section('content')
<section class="container mx-auto my-5 px-lg-5 text-center">
    <div class="text-center">
        <h2 class="text-primary">{{ $PrivacyPolicy->title }}</h2>
        <hr class="mx-auto " style="width: 50px;">
    </div>
    <div class="policy-section">
      <div class="pt-4 "> 
        <p class="faq-text">{!! $PrivacyPolicy->details !!}
        </p>
      </div> 
    
</div>

  </section>

  @endsection
