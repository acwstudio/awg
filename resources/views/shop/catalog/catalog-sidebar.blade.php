<!-- Sidebar Shopping Option Start -->
<div class="col-lg-3 order-2 order-lg-1">
    <div class="sidebar">
        <!-- Sidebar Electronics Categorie Start -->
        <div class="mb-40">
            <h3 class="sidebar-title">{{ $category->name }}</h3>
            <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                <ul>
                    <li class="has-sub"><a href="#">Camera</a>
                        <ul class="category-sub">
                            <li><a href="shop.html">Cords and Cables</a></li>
                            <li><a href="shop.html">gps accessories</a></li>
                            <li><a href="shop.html">Microphones</a></li>
                            <li><a href="shop.html">Wireless Transmitters</a></li>
                        </ul>
                        <!-- category submenu end-->
                    </li>
                    <li class="has-sub"><a href="#">gamepad</a>
                        <ul class="category-sub">
                            <li><a href="shop.html">cube lifestyle hd</a></li>
                            <li><a href="shop.html">gopro hero4</a></li>
                            <li><a href="shop.html">bhandycam cx405ags</a></li>
                            <li><a href="shop.html">vixia hf r600</a></li>
                        </ul>
                        <!-- category submenu end-->
                    </li>
                    <li class="has-sub"><a href="#">Digital Cameras</a>
                        <ul class="category-sub">
                            <li><a href="shop.html">Gold eye</a></li>
                            <li><a href="shop.html">Questek</a></li>
                            <li><a href="shop.html">Snm</a></li>
                            <li><a href="shop.html">vantech</a></li>
                        </ul>
                        <!-- category submenu end-->
                    </li>
                    <li class="has-sub"><a href="#">Virtual Reality</a>
                        <ul class="category-sub">
                            <li><a href="shop.html">Samsung</a></li>
                            <li><a href="shop.html">Toshiba</a></li>
                            <li><a href="shop.html">Transcend</a></li>
                            <li><a href="shop.html">Sandisk</a></li>
                        </ul>
                        <!-- category submenu end-->
                    </li>
                </ul>
            </div>
            <!-- category-menu-end -->
        </div>
        <!-- Sidebar Electronics Categorie End -->
        <!-- Price Filter Options Start -->
        <div class="search-filter mb-40">
            <h3 class="sidebar-title">filter by price</h3>
            <form action="#" class="sidbar-style">
                <div id="slider-range"></div>
                <input type="text" id="amount" class="amount-range" readonly>
            </form>
        </div>
        <!-- Price Filter Options End -->
        <!-- Sidebar Categorie Start -->
        <div class="sidebar-categorie mb-40">
            <h3 class="sidebar-title">categories</h3>
            <ul class="sidbar-style">
                <li class="form-check">
                    <input class="form-check-input" value="#" id="camera" type="checkbox">
                    <label class="form-check-label" for="camera">Cameras (8)</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input" value="#" id="GamePad" type="checkbox">
                    <label class="form-check-label" for="GamePad">GamePad (8)</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input" value="#" id="Digital" type="checkbox">
                    <label class="form-check-label" for="Digital">Digital Cameras (8)</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input" value="#" id="Virtual" type="checkbox">
                    <label class="form-check-label" for="Virtual"> Virtual Reality (8) </label>
                </li>
            </ul>
        </div>
        <!-- Sidebar Categorie Start -->
        <!-- Product Size Start -->
        <div class="size mb-40">
            <h3 class="sidebar-title">size</h3>
            <ul class="size-list sidbar-style">
                <li class="form-check">
                    <input class="form-check-input" value="" id="small" type="checkbox">
                    <label class="form-check-label" for="small">S (6)</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input" value="" id="medium" type="checkbox">
                    <label class="form-check-label" for="medium">M (9)</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input" value="" id="large" type="checkbox">
                    <label class="form-check-label" for="large">L (8)</label>
                </li>
            </ul>
        </div>
        <!-- Product Size End -->
        <!-- Product Color Start -->
        <div class="color mb-40">
            <h3 class="sidebar-title">color</h3>
            <ul class="color-option sidbar-style">
                <li>
                    <span class="white"></span>
                    <a href="#">white (4)</a>
                </li>
                <li>
                    <span class="orange"></span>
                    <a href="#">Orange (2)</a>
                </li>
                <li>
                    <span class="blue"></span>
                    <a href="#">Blue (6)</a>
                </li>
                <li>
                    <span class="yellow"></span>
                    <a href="#">Yellow (8)</a>
                </li>
            </ul>
        </div>
        <!-- Product Color End -->
        <!-- Product Top Start -->
        <div class="top-new mb-40">
            <h3 class="sidebar-title">Топ новинки</h3>
            <div class="side-product-active owl-carousel">
                <!-- Side Item Start -->
                @foreach($mostViewedChunk as $key => $chunk)
                <div class="side-pro-item">
                @foreach($chunk as $product)
                    <!-- Single Product Start -->
                    <div class="single-product single-product-sidebar">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="product.html">
                                <img class="primary-img" src="{{ asset("storage/" . $product->img_full_name) }}"
                                     alt="single-product">
                                <img class="secondary-img" src="{{ asset("storage/" . $product->img_full_name) }}"
                                     alt="single-product">
                            </a>
                            <div class="label-product l_sale">{{ $product->percent }}<span class="symbol-percent">%</span></div>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="product.html">{{ $product->sub_name }}</a></h4>
                            <p><span class="price">{{ $product->discount_price }}</span>
                                <del class="prev-price">{{ $product->price }}</del>
                            </p>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    @endforeach
                    <!-- Single Product End -->
                </div>
                <!-- Side Item End -->
                @endforeach
            </div>
        </div>
        <!-- Product Top End -->
        <!-- Single Banner Start -->
        <div class="col-img">
            <a href="shop.html"><img src="{{ asset('shop/img/banner/banner-sidebar.jpg') }}" alt="slider-banner"></a>
        </div>
        <!-- Single Banner End -->
    </div>
</div>
<!-- Sidebar Shopping Option End -->