<footer style="background-color: rgba(26, 25, 25, 0.788);">
    <div class="container mx-auto py-5 px-3">
        <div class="row row-cols-1 row-cols-lg-4 justify-content-between ">
            @php
                    $SiteSetting = App\Models\SiteSetting::find(1);
                @endphp
            <div>
                <a href="{{ route('home') }}" class="text-decoration-none"><img src="{{ asset($SiteSetting->logo) }}" alt="logo"></a>
                <p class="text pt-4 pb-3 text-white">
                    {!! $SiteSetting->about !!}
                </p>
            </div>

            <div>
                <h5 class="h5-text pb-3">Top Category</h5>
                <ul class="list-unstyled">
                    @php
                        $Category = App\Models\Category::orderBy('id','desc')->get();
                    @endphp
                    @foreach ($Category as $item)
                    <li><a href="{{ route('page.categories',['id' => $item->id , 'slug' => $item->slug ]) }}" class="text-link">{{ $item->name }}</a></li>
                    @endforeach  
                </ul>
            </div>
            <div>
                <h5 class="h5-text pb-3">Usefull Link</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('page.blog') }}" class="text-link">Blog</a></li>
                    <li><a href="{{ route('register') }}" class="text-link"> Sign Up</a></li>
                    <li><a href="{{ route('page.allService') }}" class="text-link">All Services</a></li>
                </ul>
            </div>
            <div>
                <h5 class="h5-text pb-3">Information </h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('page.about') }}" class="text-link"> About Us</a></li>
                    <li><a href="{{ route('page.privacyPolicy') }}" class="text-link"> Privacy Policy</a></li>
                    <li><a href="{{ route('page.contact') }}" class="text-link">Contact Us</a></li>
                </ul>
            </div>
            <div class="logo">
                <img src="https://mobileprice.rafinsourcing.com/frontend/assets/front/images/logo.html" alt="">
            </div>
        </div>
    </div>

    <div class="py-3" style="background-color: rgba(51, 50, 50, 0.455);">
        <div class="container mx-auto">
            <div class="text-center d-lg-flex justify-content-between align-items-center">

                <div>
                    <h5 class="text-light ">
                        {{ $SiteSetting->copy }}
                    </h5>
                </div>
                <div class="d-flex gap-2 py-3 justify-content-center">
                    @php
                        $PaymentMethod = App\Models\PaymentMethod::orderBy('id','desc')->get();
                    @endphp
                    @foreach ($PaymentMethod as $item)
                    <a href="#"><img class="mt-2 mt-sm-0"
                        src="{{ asset($item->img) }}"
                        width="60px"></a> 
                    @endforeach 
                </div>
            </div>

        </div>
    </div>
    
    </div>
</footer>