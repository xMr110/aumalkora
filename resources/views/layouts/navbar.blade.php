<nav>
    <div class="nav-wrapper">
        <a href="/" class="brand-logo">
            @if(isset($settings->logo) && $settings->logo !="")
                <img src="{{url('/storage/'.$settings->logo)}}" width="200"></a>
        @endif
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/speech">CEO's speech</a></li>
            <li><a href="/categories">Products</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">contact us</a></li>
            {{--<li><a class="modal-trigger" href='#cart_modal'><i class="material-icons" >shopping_cart</i></a></li>--}}
            <li><a href="#"><img src="{{asset('frontend/imgs/syria.svg')}}" class="img-responsive" width="35" style="padding-top: 10px;"></a></li>
            <li><a href="#"><img src="{{asset('frontend/imgs/turkey.svg')}}" class="img-responsive" width="35" style="padding-top: 10px;"></a></li>
            <li><a href="#"><img src="{{asset('frontend/imgs/united-kingdom.svg')}}" class="img-responsive" width="35" style="padding-top: 10px;"></a></li>
            <!-- Dropdown Structure -->
        </ul>
        <a href="#" data-activates="slide-out" class="right button-collapse"><i class="material-icons">menu</i></a>
        <ul id="slide-out" class="side-nav">
            <a href="/" class="brand-logo">
                @if(isset($settings->logo) && $settings->logo !="")
                    <img src="{{url('/storage/'.$settings->logo)}}" width="200"></a>
            @endif>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/speech">CEO's speech</a></li>
            <li><a href="/categories">Products</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">contact us</a></li>
            {{--<li><a class="modal-trigger" href='#cart_modal' data-activates='dropdown-cart-mobile'><i class="material-icons" >shopping_cart</i></a></li>--}}
            <li><a href="#"><img src="{{asset('frontend/imgs/syria.svg')}}" class="img-responsive" width="35" style="padding-top: 10px;"></a></li>
            <li><a href="#"><img src="{{asset('frontend/imgs/turkey.svg')}}" class="img-responsive" width="35" style="padding-top: 10px;"></a></li>
            <li><a href="#"><img src="{{asset('frontend/imgs/united-kingdom.svg')}}" class="img-responsive" width="35" style="padding-top: 10px;"></a></li>
            <!-- Dropdown Structure -->
        </ul>
    </div>
</nav>

