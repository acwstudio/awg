<!-- Header Bottom Start Here -->
<div class="header-bottom  header-sticky black-bg2 home-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                <span class="categorie-title">Shop by Categories</span>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12 ">
                <nav class="d-none d-lg-block">
                    <ul class="header-bottom-list d-flex">
                        <li class="active"><a href="{{ route('shop') }}">home</a></li>
                        <li><a href="shop.html">shop<i class="fa fa-angle-down"></i></a>
                            <!-- Home Version Dropdown Start -->
                            <ul class="ht-dropdown dropdown-style-two">
                                <li><a href="product.html">product details</a></li>
                                <li><a href="compare.html">compare</a></li>
                                <li><a href="cart.html">cart</a></li>
                                <li><a href="checkout.html">checkout</a></li>
                                <li><a href="wishlist.html">wishlist</a></li>
                            </ul>
                            <!-- Home Version Dropdown End -->
                        </li>
                        <li><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                            <!-- Home Version Dropdown Start -->
                            <ul class="ht-dropdown dropdown-style-two">
                                <li><a href="single-blog.html">blog details</a></li>
                            </ul>
                            <!-- Home Version Dropdown End -->
                        </li>
                        <li><a href="#">pages<i class="fa fa-angle-down"></i></a>
                            <!-- Home Version Dropdown Start -->
                            <ul class="ht-dropdown dropdown-style-two">
                                <li><a href="contact.html">contact us</a></li>
                                <li><a href="register.html">register</a></li>
                                <li><a href="login.html">sign in</a></li>
                                <li><a href="forgot-password.html">forgot password</a></li>
                                <li><a href="404.html">404</a></li>
                            </ul>
                            <!-- Home Version Dropdown End -->
                        </li>
                        <li><a href="about.html">About us</a></li>
                        <li><a href="contact.html">contact us</a></li>
                    </ul>
                </nav>
                <div class="mobile-menu d-block d-lg-none">
                    <nav>
                        <ul>
                            <li><a href="{{ route('shop') }}">home</a></li>
                            <li><a href="shop.html">shop</a>
                                <!-- Mobile Menu Dropdown Start -->
                                <ul>
                                    <li><a href="product.html">product details</a></li>
                                    <li><a href="compare.html">compare</a></li>
                                    <li><a href="cart.html">cart</a></li>
                                    <li><a href="checkout.html">checkout</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                </ul>
                                <!-- Mobile Menu Dropdown End -->
                            </li>
                            <li><a href="blog.html">Blog</a>
                                <!-- Mobile Menu Dropdown Start -->
                                <ul>
                                    <li><a href="single-blog.html">blog details</a></li>
                                </ul>
                                <!-- Mobile Menu Dropdown End -->
                            </li>
                            <li><a href="#">pages</a>
                                <!-- Mobile Menu Dropdown Start -->
                                <ul>
                                    <li><a href="{{ route('customer.register') }}">register</a></li>
                                    <li><a href="{{ route('customer.login') }}">sign in</a></li>
                                    <li><a href="{{ route('customer.password.request') }}">forgot password</a></li>
                                    <li><a href="404.html">404</a></li>
                                </ul>
                                <!-- Mobile Menu Dropdown End -->
                            </li>
                            <li><a href="about.html">about us</a></li>
                            <li><a href="contact.html">contact us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Header Bottom End Here -->