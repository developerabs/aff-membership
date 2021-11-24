@extends('frontend.layouts.app')
@section('content')
<section class="container mx-auto my-5">
    <form class="row d-flex justify-content-center align-items-center g-3">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="pb-3 text-center">
                <h2 class="text-primary text-center">Check Out Page</h2>
                <hr class="mx-auto" style="width: 50px;">
            </div>

        <div class="">
            <label for="inputName4" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputName4">
          </div>
          <br>
          <div class="pb-3">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
          </div>
            <div class="pb-3">
          <label for="inputPhone4" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="inputPhone4">
        </div>
        <div class="">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control pb-5" id="inputAddress" placeholder="House: , Road: , Area ...">
        </div>
        <div class="d-flex gap-3 py-3">
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-5">
          <label for="inputState" class="form-label">State</label>
          <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
    </div>
    <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <div class="pt-4 text-center">
          <button type="submit" class="text-confirm btn btn-success px-5">Confirm</button>
        </div>
    </div>
</form>

</section>
@endsection