@extends('frontend.layouts.app')
@section('content')

<section class="container mx-auto my-5">
    <div class="text-center">
        <h1>{{ $HowItWork->title }}</h1>
        <hr class="mx-auto " style="width: 50px;">
    </div>
    <div class="pt-4">
      <p class="faq-text">{!! $HowItWork->details !!}
      </p>
    </div> 

  </section>
@endsection