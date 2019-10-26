<!-- Header Top Start Here -->
<div class="header-top-area home-4">
    <div class="container">

        <!-- Header Top Start -->
        <div class="header-top">
            <ul>
                <li><a href="#">Free Shipping on order over $99</a></li>
                <li><a href="#">Shopping Cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>
            </ul>
            <ul>
                <li><span>Language</span> <a href="#">English<i class="lnr lnr-chevron-down"></i></a>
                    <!-- Dropdown Start -->
                    <ul class="ht-dropdown">
                        <li>
                            <a href="#"><img src="{{ asset('shop/img/header/1.jpg') }}" alt="language-selector">English</a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('shop/img/header/2.jpg') }}" alt="language-selector">Francis</a>
                        </li>
                    </ul>
                    <!-- Dropdown End -->
                </li>
                <li><span>Currency</span><a href="#"> USD $ <i class="lnr lnr-chevron-down"></i></a>
                    <!-- Dropdown Start -->
                    <ul class="ht-dropdown">
                        <li><a href="#">&#36; USD</a></li>
                        <li><a href="#"> € Euro</a></li>
                        <li><a href="#">&#163; Pound Sterling</a></li>
                    </ul>
                    <!-- Dropdown End -->
                </li>
                <li><a href="#">My Account<i class="lnr lnr-chevron-down"></i></a>
                    <!-- Dropdown Start -->
                    <ul class="ht-dropdown">
                        @guest('customer')
                            <li><a href="{{ route('customer.login') }}">Login</a></li>
                            <li><a href="{{ route('customer.register') }}">Register</a></li>
                        @else
                            <li><a href="{{ route('customer') }}">{{ $user->first_name }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('customer.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>

                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                    <!-- Dropdown End -->
                </li>
            </ul>
        </div>
        <!-- Header Top End -->
    </div>
    <!-- Container End -->
</div>
<!-- Header Top End Here -->