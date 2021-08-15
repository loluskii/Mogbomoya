<style>
    a{
        text-decoration: none;
        color:white;
    }
/* 
    a:hover{
        font-size: 17px;
        color: white;
        text-decoration: none;

    } */
</style>
<footer>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                <ul style="list-style-type: none">
                    <li class="top my-3">
                        The Mogbomoya App
                    </li>
                    {{-- <li class="my-3">Pricing</li> --}}
                    <li class="my-3"><a href="{{route('faq')}}">FAQ</a></li>
                    {{-- <li class="my-3"><a href="{{route('site-map')}}">Site Map</a></li> --}}
                </ul>
            </div>
            {{-- <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12">
                <ul style="list-style-type: none">
                    <li class="top my-3">
                        Find Events
                    </li>
                    <li class="my-3">Online Webinars</li>
                    <li class="my-3">Online Classes</li>
                    <li class="my-3">Virtual Conferences</li>
                    <li class="my-3">Festival and Concerts</li>
                </ul>
            </div> --}}
            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                <ul style="list-style-type: none">
                    <li class="top my-3">
                        Legal
                    </li>
                    {{-- <li class="my-3">Community Guidelines</li> --}}
                    <li class="my-3"><a href="{{route('tandc')}}">Terms of Use</a></li>
                    <li class="my-3"><a href="{{route('privacy')}}">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
                <ul style="list-style-type: none">
                    <li class="top my-3">
                        Get the App
                    </li>
                    <li class="my-3">
                        <img src="{{asset('images/footer/app-store.svg')}}" alt="" srcset="">
                    </li>
                    <li class="my-3">
                        <img src="{{asset('images/footer/google-play.svg')}}" alt="" srcset="">
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
    <hr>
        <div class="container">
            <div class="row mx-4 py-2 justify-content-between">
                <p>© 2021 Mógbòmoyá. All rights reserved</p>
                <p>
                    <span><img src="{{asset('images/footer/twitter.svg')}}" alt="" srcset=""></span>
                    <span><img src="{{asset('images/footer/instagram.svg')}}" alt="" srcset=""></span>
                    <span><img src="{{asset('images/footer/facebook.svg')}}" alt="" srcset=""></span>
                    <span><img src="{{asset('images/footer/youtube.svg')}}" alt="" srcset=""></span>
                </p>
            </div>
        </div>
</footer>