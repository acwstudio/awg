<!-- Product sidebaer Start Here -->
<div class="product-sidebar-area home-4">
    <div class="container">
        <div class="row">
            <!-- Product sidebar Start -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="side-pro-box">
                        <h3 class="sidebar-title mb-30">Special Offer </h3>
                        <!-- Single Product Start -->
                        @foreach($productSpecOffer as $product)
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="product.html">
                                    <img class="primary-img" src="{{ asset("storage/" . $product->img_full_name) }}" alt="single-product">
                                    <img class="secondary-img" src="{{ asset("storage/" . $product->img_full_name) }}" alt="single-product">
                                </a>
                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <div class="pro-info">
                                    <h4><a href="product.html">{{ $product->name }}</a></h4>
                                    <p><span class="price">{{ $product->discount_price }}</span>
                                        <del class="prev-price">{{ $product->price }}</del></p>
                                    <div class="label-product l_sale">{{ $product->percent }}<span class="symbol-percent">%</span></div>
                                </div>
                                <div class="pro-actions">
                                    <div class="actions-primary">
                                        <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                    </div>
                                    <div class="actions-secondary">
                                        <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                        <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                            <span class="sticker-new">new</span>
                        </div>
                        @endforeach
                        <!-- Single Product End -->
                    </div>
                    <div class="side-pro-box mt-30">
                        <h3 class="sidebar-title mb-30">Most viewed</h3>
                        <div class="side-product-active owl-carousel">
                            <!-- Side Item Start -->
                            <div class="side-pro-item">
                                <!-- Single Product Start -->

                                @foreach($mostViewed as $product)
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="{{ asset("storage/" . $product->img_full_name) }}" alt="single-product">
                                            <img class="secondary-img" src="{{ asset("storage/" . $product->img_full_name) }}" alt="single-product">
                                        </a>
                                        <div class="label-product l_sale">{{ $product->percent }}<span class="symbol-percent">%</span></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">{{ $product->sub_name }}</a></h4>
                                        <p><span class="price">{{ $product->discount_price }}</span><del class="prev-price">{{ $product->price }}</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                @endforeach

                            </div>
                            <!-- Side Item End -->
                            <!-- Side Item Start -->
                            <div class="side-pro-item">
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/41.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/42.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                        <p><span class="price">$80.45</span><del class="prev-price">$100.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/36.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/35.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/33.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/34.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Lamp Proin Work  Silver </a></h4>
                                        <p><span class="price">$120.45</span><del class="prev-price">130.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/31.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/32.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                        <p><span class="price">$140.45</span><del class="prev-price">$150.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Side Item End -->
                            <!-- Side Item Start -->
                            <div class="side-pro-item">
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/15.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/16.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Lamp Work Silver Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/17.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/18.jpg" alt="single-product">
                                        </a>
                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Silver Work Lamp  Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/23.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/24.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Proin Work Lamp Silver </a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/25.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/26.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- Side Item End -->
                        </div>
                    </div>
                    <div class="side-pro-box">
                        <h3 class="sidebar-title mt-30">Hot Brand </h3>
                        <!-- Brand Banner Start -->
                        <div class="brand-banner-sidebar owl-carousel">
                            <div class="single-brand">
                                <a href="#"><img class="img" src="img/brand/1.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/1.jpg" alt="brand-image"></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img class="img" src="img/brand/1.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/1.jpg" alt="brand-image"></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="img/brand/1.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/1.jpg" alt="brand-image"></a>

                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/4.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/1.jpg" alt="brand-image"></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/4.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/1.jpg" alt="brand-image"></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/4.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/1.jpg" alt="brand-image"></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/4.jpg" alt="brand-image"></a>
                                <a href="#"><img src="img/brand/1.jpg" alt="brand-image"></a>
                            </div>
                        </div>
                        <!-- Brand Banner End -->
                    </div>
                </div>
            </div>
            <!-- Product sidebar End -->
            <!-- Product List Start -->
            <div class="col-lg-9 mt-sm-60">
                <div class="all-border">
                    <!-- Product Title Start -->
                    <div class="post-title pb-30">
                        <h2>hot deals</h2>
                    </div>
                    <!-- Product Title End -->
                    <!-- Hot Deal Product Activation Start -->
                    <div class="hot-deal-active3 owl-carousel">
                        @foreach($productsHot as $product)
                        <div class="row">
                            <!-- Main Thumbnail Image Start -->
                            <div class="col-lg-6 mb-all-40 hot-product3 ">
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="{{ asset("storage/" . $product->img_full_name) }}"
                                                 alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                    </div>
                                    <!-- Product Image End -->
                                    <span class="sticker-new">new</span>
                                </div>
                            </div>
                            <!-- Main Thumbnail Image End -->
                            <!-- Thumbnail Description Start -->
                            <div class="col-lg-6 hot-product2">
                                <div class="thubnail-desc fix">
                                    <div class="countdown" data-countdown="2025/03/01"></div>
                                    <h3><a href="product.html">{{ $product->name }}</a></h3>
                                    <div class="pro-price mtb-20">
                                        <p><span class="price">{{ $product->discount_price }} RUB</span>
                                            <del class="prev-price">{{ $product->price }} RUB</del></p>
                                        <div class="label-product l_sale">{{ $product->percent }}<span class="symbol-percent">%</span></div>
                                    </div>
                                    <p class="mb-30 pro-desc-details">{{ $product->description }}</p>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Thumbnail Description End -->
                        </div>
                        @endforeach
                    </div>
                    <!-- Hot Deal Product Active End -->
                </div>
                <!-- main-product-tab-area-->
                <div class="main-product-tab-area mt-100 mt-sm-60">
                    <div class="section-ttitle mb-25">
                        <h2>Новые поступления</h2>
                    </div>
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="electronics-pro-active owl-carousel">
                        <!-- Double Product Start -->
                        @foreach($newProducts as $product)
                            @if($loop->even)
                        <div class="double-product">
                            @endIf
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="{{ asset("storage/" . $product->img_full_name) }}" alt="single-product">
                                        <img class="secondary-img" src="{{ asset("storage/" . $product->img_full_name) }}" alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">Utensils and Knives Block</a></h4>
                                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            {{--<div class="single-product">--}}
                                {{--<!-- Product Image Start -->--}}
                                {{--<div class="pro-img">--}}
                                    {{--<a href="product.html">--}}
                                        {{--<img class="primary-img" src="img/products/40.jpg" alt="single-product">--}}
                                        {{--<img class="secondary-img" src="img/products/41.jpg" alt="single-product">--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>--}}
                                {{--</div>--}}
                                {{--<!-- Product Image End -->--}}
                                {{--<!-- Product Content Start -->--}}
                                {{--<div class="pro-content">--}}
                                    {{--<div class="pro-info">--}}
                                        {{--<h4><a href="product.html">Terra Xpress HE Cooking </a></h4>--}}
                                        {{--<p><span class="price">$84.45</span><del class="prev-price">$300.50</del></p>--}}
                                        {{--<div class="label-product l_sale">25<span class="symbol-percent">%</span></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="pro-actions">--}}
                                        {{--<div class="actions-primary">--}}
                                            {{--<a href="cart.html" title="Add to Cart"> + Add To Cart</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="actions-secondary">--}}
                                            {{--<a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>--}}
                                            {{--<a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- Product Content End -->--}}
                                {{--<span class="sticker-new">new</span>--}}
                            {{--</div>--}}
                            <!-- Single Product End -->
                            @if($loop->even)
                        </div>
                        @endIf
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        {{--<div class="double-product">--}}
                            {{--<!-- Single Product Start -->--}}
                            {{--<div class="single-product">--}}
                                {{--<!-- Product Image Start -->--}}
                                {{--<div class="pro-img">--}}
                                    {{--<a href="product.html">--}}
                                        {{--<img class="primary-img" src="img/products/39.jpg" alt="single-product">--}}
                                        {{--<img class="secondary-img" src="img/products/38.jpg" alt="single-product">--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>--}}
                                {{--</div>--}}
                                {{--<!-- Product Image End -->--}}
                                {{--<!-- Product Content Start -->--}}
                                {{--<div class="pro-content">--}}
                                    {{--<div class="pro-info">--}}
                                        {{--<h4><a href="product.html">Robert Welch Knife Block</a></h4>--}}
                                        {{--<p><span class="price">$100.45</span><del class="prev-price">$150.50</del></p>--}}
                                        {{--<div class="label-product l_sale">30<span class="symbol-percent">%</span></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="pro-actions">--}}
                                        {{--<div class="actions-primary">--}}
                                            {{--<a href="cart.html" title="Add to Cart"> + Add To Cart</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="actions-secondary">--}}
                                            {{--<a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>--}}
                                            {{--<a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- Product Content End -->--}}
                                {{--<span class="sticker-new">new</span>--}}
                            {{--</div>--}}
                            {{--<!-- Single Product End -->--}}
                            {{--<!-- Single Product Start -->--}}
                            {{--<div class="single-product">--}}
                                {{--<!-- Product Image Start -->--}}
                                {{--<div class="pro-img">--}}
                                    {{--<a href="product.html">--}}
                                        {{--<img class="primary-img" src="img/products/36.jpg" alt="single-product">--}}
                                        {{--<img class="secondary-img" src="img/products/37.jpg" alt="single-product">--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>--}}
                                {{--</div>--}}
                                {{--<!-- Product Image End -->--}}
                                {{--<!-- Product Content Start -->--}}
                                {{--<div class="pro-content">--}}
                                    {{--<div class="pro-info">--}}
                                        {{--<h4><a href="product.html">Poly and Bark Vortex Side</a></h4>--}}
                                        {{--<p><span class="price">$90.50</span><del class="prev-price">$120.50</del></p>--}}
                                        {{--<div class="label-product l_sale">15<span class="symbol-percent">%</span></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="pro-actions">--}}
                                        {{--<div class="actions-primary">--}}
                                            {{--<a href="cart.html" title="Add to Cart"> + Add To Cart</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="actions-secondary">--}}
                                            {{--<a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>--}}
                                            {{--<a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- Product Content End -->--}}
                                {{--<span class="sticker-new">new</span>--}}
                            {{--</div>--}}
                            {{--<!-- Single Product End -->--}}
                        {{--</div>--}}
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        {{--<div class="double-product">--}}
                            {{--<!-- Single Product Start -->--}}
                            {{--<div class="single-product">--}}
                                {{--<!-- Product Image Start -->--}}
                                {{--<div class="pro-img">--}}
                                    {{--<a href="product.html">--}}
                                        {{--<img class="primary-img" src="img/products/35.jpg" alt="single-product">--}}
                                        {{--<img class="secondary-img" src="img/products/36.jpg" alt="single-product">--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>--}}
                                {{--</div>--}}
                                {{--<!-- Product Image End -->--}}
                                {{--<!-- Product Content Start -->--}}
                                {{--<div class="pro-content">--}}
                                    {{--<div class="pro-info">--}}
                                        {{--<h4><a href="product.html">Bark and  Vortex Side</a></h4>--}}
                                        {{--<p><span class="price">$69.20</span><del class="prev-price">$145.50</del></p>--}}
                                        {{--<div class="label-product l_sale">20<span class="symbol-percent">%</span></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="pro-actions">--}}
                                        {{--<div class="actions-primary">--}}
                                            {{--<a href="cart.html" title="Add to Cart"> + Add To Cart</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="actions-secondary">--}}
                                            {{--<a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>--}}
                                            {{--<a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- Product Content End -->--}}
                                {{--<span class="sticker-new">new</span>--}}
                            {{--</div>--}}
                            {{--<!-- Single Product End -->--}}
                            {{--<!-- Single Product Start -->--}}
                            {{--<div class="single-product">--}}
                                {{--<!-- Product Image Start -->--}}
                                {{--<div class="pro-img">--}}
                                    {{--<a href="product.html">--}}
                                        {{--<img class="primary-img" src="img/products/34.jpg" alt="single-product">--}}
                                        {{--<img class="secondary-img" src="img/products/35.jpg" alt="single-product">--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>--}}
                                {{--</div>--}}
                                {{--<!-- Product Image End -->--}}
                                {{--<!-- Product Content Start -->--}}
                                {{--<div class="pro-content">--}}
                                    {{--<div class="pro-info">--}}
                                        {{--<h4><a href="product.html">Compary and Bark Vortex Shewe</a></h4>--}}
                                        {{--<p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>--}}
                                        {{--<div class="label-product l_sale">20<span class="symbol-percent">%</span></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="pro-actions">--}}
                                        {{--<div class="actions-primary">--}}
                                            {{--<a href="cart.html" title="Add to Cart"> + Add To Cart</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="actions-secondary">--}}
                                            {{--<a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>--}}
                                            {{--<a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- Product Content End -->--}}
                                {{--<span class="sticker-new">new</span>--}}
                            {{--</div>--}}
                            {{--<!-- Single Product End -->--}}
                        {{--</div>--}}
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        {{--<div class="double-product">--}}
                            {{--<!-- Single Product Start -->--}}
                            {{--<div class="single-product">--}}
                                {{--<!-- Product Image Start -->--}}
                                {{--<div class="pro-img">--}}
                                    {{--<a href="product.html">--}}
                                        {{--<img class="primary-img" src="img/products/32.jpg" alt="single-product">--}}
                                        {{--<img class="secondary-img" src="img/products/33.jpg" alt="single-product">--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>--}}
                                {{--</div>--}}
                                {{--<!-- Product Image End -->--}}
                                {{--<!-- Product Content Start -->--}}
                                {{--<div class="pro-content">--}}
                                    {{--<div class="pro-info">--}}
                                        {{--<h4><a href="product.html">kallery kids  weare</a></h4>--}}
                                        {{--<p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>--}}
                                        {{--<div class="label-product l_sale">20<span class="symbol-percent">%</span></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="pro-actions">--}}
                                        {{--<div class="actions-primary">--}}
                                            {{--<a href="cart.html" title="Add to Cart"> + Add To Cart</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="actions-secondary">--}}
                                            {{--<a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>--}}
                                            {{--<a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- Product Content End -->--}}
                                {{--<span class="sticker-new">new</span>--}}
                            {{--</div>--}}
                            {{--<!-- Single Product End -->--}}
                            {{--<!-- Single Product Start -->--}}
                            {{--<div class="single-product">--}}
                                {{--<!-- Product Image Start -->--}}
                                {{--<div class="pro-img">--}}
                                    {{--<a href="product.html">--}}
                                        {{--<img class="primary-img" src="img/products/1.jpg" alt="single-product">--}}
                                        {{--<img class="secondary-img" src="img/products/7.jpg" alt="single-product">--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>--}}
                                {{--</div>--}}
                                {{--<!-- Product Image End -->--}}
                                {{--<!-- Product Content Start -->--}}
                                {{--<div class="pro-content">--}}
                                    {{--<div class="pro-info">--}}
                                        {{--<h4><a href="product.html">Poly and Bark Vortex Side</a></h4>--}}
                                        {{--<p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>--}}
                                        {{--<div class="label-product l_sale">20<span class="symbol-percent">%</span></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="pro-actions">--}}
                                        {{--<div class="actions-primary">--}}
                                            {{--<a href="cart.html" title="Add to Cart"> + Add To Cart</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="actions-secondary">--}}
                                            {{--<a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>--}}
                                            {{--<a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- Product Content End -->--}}
                                {{--<span class="sticker-new">new</span>--}}
                            {{--</div>--}}
                            {{--<!-- Single Product End -->--}}
                        {{--</div>--}}
                        @endforeach
                        <!-- Double Product End -->
                    </div>
                    <!-- Arrivals Product Activation End Here -->
                </div>
                <!-- main-product-tab-area-->
            </div>
            <!-- Product List End -->
        </div>
    </div>
</div>
<!-- Product sidebaer End Here -->