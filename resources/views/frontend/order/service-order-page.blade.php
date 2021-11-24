@extends('frontend.layouts.app')
@section('content')
<form action="{{ route('paypal') }}" method="POST">
    @csrf
<section class="">
    <header class=" container mx-auto py-4">

        <div class=" d-lg-block d-none">
            <div class="d-flex align-items-center gap-2">
                <div class="d-flex align-items-center gap-1">
                    <span class="bg-success p-1 rounded-circle">
                        <i class="fas fa-check fa-xs text-white"></i>
                    </span>
                    <span class="text-success text">Order</span>
                </div>  
            </div>
        </div>
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
    </header>

</section>

<!-- main section  -->

<section class="container mx-auto mb-5">
    <div class="row px-2 px-md-0 ">
        <div class="col-lg-8 bg-white align-self-start ">
            
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 
                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                {{-- hidden inputes --}}
                <input type="hidden" class="form-control" name="amount" value="{{ $ServiceData->price }}">
                <input type="hidden" class="form-control" name="service_id" value="{{ $ServiceData->id }}">
                <input type="hidden" name="orderTypw" value="service">
                <div class="border">
                    <div class="pt-3 pb-1 px-3 border-bottom" style="background-color: rgb(247, 245, 245);">
                        <h6>Select method for the remainining payment</h6>
                    </div>
                    <div class="p-3 border-bottom">
                        <div class="d-md-flex gap-5 align-items-center">
                            <div>
                                <div class="d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="radio" name="paymentType" id="exampleRadios1"
                                value="stripe">
                                    <label class="form-check-label " for="exampleRadios1" style="margin-top:7px">
                                        <span class=" fst-italic" style="color: rgb(19, 19, 85); ">Card Payment</span>
                                    </label>
                                </div>                              
                            </div>
                            
                            <div class=" mt-3 mt-lg-0">
                                <a href="#"><img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx9oKESmeHNvFl3r8QxDkqOV_C57UI7sCkE-rIWMLuSbtsvQaOoUNYeS_GhAwQ8qQKfYA&usqp=CAU"
                                        width="40px"></a>
                                <a href="#"><img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx9oKESmeHNvFl3r8QxDkqOV_C57UI7sCkE-rIWMLuSbtsvQaOoUNYeS_GhAwQ8qQKfYA&usqp=CAU"
                                        width="40px"></a>
                                <a href="#"><img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx9oKESmeHNvFl3r8QxDkqOV_C57UI7sCkE-rIWMLuSbtsvQaOoUNYeS_GhAwQ8qQKfYA&usqp=CAU"
                                        width="40px"></a>
                                <a href="#"><img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx9oKESmeHNvFl3r8QxDkqOV_C57UI7sCkE-rIWMLuSbtsvQaOoUNYeS_GhAwQ8qQKfYA&usqp=CAU"
                                        width="40px"></a>
                                <!-- <a href="#"><img src="https://www.thecitybank.com/newsevent/1598523651.jpg" width="40px"></a> -->
                            </div>
                        </div>
                    </div>
    
                    <div class="p-5 border-bottom" style="background-color: rgb(247, 245, 245);"> 
                        <div class='form-row row mb-4'>
                            <div class='col-xs-12 form-group required'>
                                <label class='form-label'>Name on Card</label> <input
                                    class='form-control' name="card_name" size='4' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row mb-4'>
                            <div class='col-xs-12 form-group  required'>
                                <label class='form-label'>Card Number</label> <input
                                    autocomplete='off' name="card_number" class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row mb-4'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='form-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' name="cvc" placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='form-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' name="exp_month" placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='form-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' name="exp_year" placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
    
                    </div>
                    
                    <div class="p-3 ">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentType" id="exampleRadios2"
                                value="paypal">
                            <label class="form-check-label fw-bold" for="exampleRadios2" style="font-size: 16px;">
                                <span class=" fst-italic" style="color: rgb(19, 19, 85);">Pay</span><span
                                    class=" fst-italic" style="color: rgb(0, 107, 139);">Pal</span>
                            </label>
                        </div>                             
                    </div>
                </div>
            
        </div>

        <!-- left side -->

        <div class="col-lg-4 mt-lg-0 mt-3">
            <div class="border rounded-2" style="background-color: rgb(247, 245, 245);">
                <div class=" pt-3 ">
                    <div class="px-3">
                        <div class="d-flex justify-content-start gap-2">
                            <div class="">
                                <img src="{{ asset($ServiceData->service_img) }}"
                                    width="120px">
                            </div>
                            <div class="mt-2">
                                <h6>{{ $ServiceData->title }}</h6>
                            </div>
                        </div>
                        <hr> 
                    </div>

                    <div class="">
                        <div class="px-3 d-flex gap-2 align-items-center bg-white py-2 border-bottom">
                            <a href="#" class="a-link"><span>Enter Promo Code</span></a>
                            <span><i class="fas fa-question-circle"></i></span>
                        </div> 
                            <div class="px-3 pt-3 bg-white">
                                <div class="align-items-center">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="fw-bold" style="font-size: 16px;">Total</p>
                                        <p class="fw-bold" style="font-size: 16px;">${{ $ServiceData->price }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <p class="" style="font-size: 16px;">Total Deliver Time</p>
                                        <p class="" style="font-size: 16px;">{{ $ServiceData->delivery_days }} days</p>
                                    </div>
                                    <div class="d-grid mt-2">
                                        <div>
                                            <button type="submit" class="btn bg-dark text-white w-100">Confirm & Pay</button>
                                        </div>
                                        <div
                                            class=" d-flex gap-2 align-items-center bg-white py-3 justify-content-center">
                                            <span><i class="fas fa-lock"></i></span>
                                            <div class="">SSL Secure Payment</div>
                                        </div>
                                    </div>
    
                                </div>
                            </div> 
                    </div>
                </div>
            </div>
            <div class="my-5">
                <div class="px-2">
                    <div class="d-flex justify-content-start gap-2">
                        <div class="">
                            <img src="https://image.freepik.com/free-vector/lock-shield-cyber-security-technology-blue-tone_53876-119533.jpg"
                                height="80px" width="90px">
                        </div>
                        <div>
                            <p><span style="font-size: 16px;"><strong>100% </strong> Payment Protection</span><br>
                                <span style="font-size: 12px;">project done with your 100% satisfication<br>
                                    <span>of 100% refund guarntee</span></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" p-3" style="background-color:  rgb(247, 245, 245);">
                <div class="d-flex justify-content-between">
                    <div class="text-center">
                        <div class="mb-2"><i class="fas fa-shield-alt fa-3x text-secondary"></i></div>
                        <span style="font-size: 16px;">Secure<br><span>Checkout</span></span>
                    </div>
                    <div class="text-center">
                        <div class="mb-2"><i class="fas fa-shield-alt fa-3x text-secondary"></i></div>
                        <span style="font-size: 16px;">Secure<br><span>Checkout</span></span>
                    </div>
                    <div class="text-center">
                        <div class="mb-2"><i class="fas fa-lock fa-3x text-secondary"></i></div>
                        <span style="font-size: 16px;">Secure<br><span>Checkout</span></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>
</form>
@endsection