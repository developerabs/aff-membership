@extends('frontend.layouts.app')
@section('content')
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="mt-4"> 
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            {!! $message !!}
                        </div>
                        <?php Session::forget('success');?>
                        @endif 
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            {!! $message !!}
                        </div>
                        <?php Session::forget('error');?>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="align-items-center gap-2 my-4 bg-white p-4">
                    <center>
                        <button class="btn btn-success btn-rounded text-white text-center my-4" style="
                        width: 40px;
                        height: 40px;
                        border-radius: 50%;
                        padding: 0;
                        "
                        ><i class="fas fa-check"></i></button>
                    </center>
                    <h2 class="text-center mb-4" style="color: rgb(102, 105, 228)">Order Confirmed</h2>
                    <p class="text-center mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate officia deserunt sint nam animi veritatis numquam nostrum repellendus, enim quas, optio, maiores molestias! Non, placeat! Accusantium, earum! Nemo, deserunt fugit!</p>
                    <center>
                        <a href="{{ route('page.myAccount') }}" class="btn btn-warning text-white mb-4">See Orders</a>
                    </center>
                </div> 
            </div>
        </div>
    </div>
</section>

@endsection