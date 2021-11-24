<section class="header">
    <header class="border-bottom" style="background-color: rgb(255, 255, 255);">
        <div class=" px-3 container mx-auto d-flex justify-content-between align-items-center py-2 ">
            <div>
                @php
                    $SiteSetting = App\Models\SiteSetting::find(1);
                @endphp
                <a href="{{ route('home') }}" class="text-decoration-none"><img src="{{ asset($SiteSetting->logo) }}" alt="logo"></a>
            </div>
            <div class="d-flex gap-4 align-items-center">
                <div class=" d-md-block d-none">
                    <a href="{{ route('page.howItWork') }}" class="header-link mx-3">How it works</a>
                    <a href="{{ route('page.faq') }}" class="header-link">FAQ</a>
                </div>
                <div class="d-flex align-items-center gap-3">
                    @if (Auth::user())
                    <a href="{{ route('page.myAccount') }}" class="btn bg-warning header-link text-white">My Account</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn bg-success header-link text-white">Logout</button>
                    </form> 
                    @else
                    <a href="{{ route('login') }}" class="header-link"><button class="btn bg-warning text-white">Log In</button></a> 
                    <a href="{{ route('register') }}"> <button class="btn bg-success text-white">Sign Up</button></a>
                    @endif  
                    </a>
                </div>
            </div>
        </div>
        </div>
    </header>

    <div class=" border-bottom" style="background-color: rgb(235, 232, 232);">
        <div class="container mx-auto py-1">
            <nav class="navbar navbar-expand-lg navbar-light ">

                <div class="navbar-light d-block d-lg-none bg-light btn">
                    <button class=" border-0" class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <nav class="">
                            <div class="">
                                <ul class="item navbar-nav me-auto mb-2 mb-lg-0">
                                    @php
                                        $Category = App\Models\Category::orderBy('id','desc')->get();
                                    @endphp
                                    @foreach ($Category as $item)
                                    <li class="nav-item ">
                                        <a class="nav-link active" href="{{ route('page.categories',['id' => $item->id , 'slug' => $item->slug ]) }}">{{ $item->name }} </a>
                                    </li> 
                                    @endforeach 
                                </ul>

                            </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                    <ul class=" navbar-nav mr-auto mt-2 mt-lg-0 pl-0 ">
                        @foreach ($Category as $item)
                        <li><a href="{{ route('page.categories',['id' => $item->id , 'slug' => $item->slug ]) }}" class="nav-link"> {{ $item->name }}</a></li>  
                        @endforeach 
                    </ul>

                </div>
            </nav>
        </div>
    </div>
</section>