<!-- Product sidebaer Start Here -->
<div class="product-sidebar-area home-4">
    <div class="container">
        <div class="row">
            <!-- Product sidebar Start -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="side-pro-box">
                        <h3 class="sidebar-title mb-30">Специальное предложение </h3>
                        <!-- Single Product Start -->
                        @foreach($productSpecOffer as $product)
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="product.html">
                                    <img class="primary-img" src="{{ asset("storage/store/" . $product->img_full_name) }}" alt="single-product">
                                    <img class="secondary-img" src="{{ asset("storage/store/" . $product->img_full_name) }}" alt="single-product">
                                </a>
                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <div class="pro-info">
                                    <h4><a href="product.html">{{ $product->st_name }}</a></h4>
                                    <p><span class="price">{{ $product->discount_price }}</span>
                                        <del class="prev-price">{{ $product->st_price }}</del></p>
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
                        <h3 class="sidebar-title mb-30">Часто просматривают</h3>
                        <div class="side-product-active owl-carousel">
                            <!-- Side Item Start -->
                            @foreach($mostViewedChunk as $key => $chunk)

                            <div class="side-pro-item">
                                <!-- Single Product Start -->

                                @foreach($chunk as $product)
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="{{ asset("storage/store/" . $product->img_full_name) }}"
                                                 alt="single-product">
                                            <img class="secondary-img" src="{{ asset("storage/store/" . $product->img_full_name) }}"
                                                 alt="single-product">
                                        </a>
                                        <div class="label-product l_sale">{{ $product->percent }}
                                            <span class="symbol-percent">%</span></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="product.html">{{ $product->sub_name }}</a></h4>
                                        <p><span class="price">{{ $product->discount_price }}</span>
                                            <del class="prev-price">{{ $product->price }}</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                @endforeach

                            </div>

                            @endforeach
                            <!-- Side Item End -->
                        </div>
                    </div>
                    <div class="side-pro-box">
                        <h3 class="sidebar-title mt-30">Hot Brand </h3>
                        <!-- Brand Banner Start -->
                        <div class="brand-banner-sidebar owl-carousel">
                            <div class="single-brand">
                                <a href="#"><img class="img" src="{{ asset('shop/img/brand/1.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/2.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/3.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/1.jpg') }}" alt="brand-image"></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img class="img" src="{{ asset('shop/img/brand/1.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/2.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/3.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/1.jpg') }}" alt="brand-image"></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="{{ asset('shop/img/brand/1.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/2.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/3.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/1.jpg') }}" alt="brand-image"></a>

                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="{{ asset('shop/img/brand/2.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/3.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/4.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/1.jpg') }}" alt="brand-image"></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="{{ asset('shop/img/brand/2.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/3.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/4.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/1.jpg') }}" alt="brand-image"></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="{{ asset('shop/img/brand/2.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/3.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/4.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/1.jpg') }}" alt="brand-image"></a>
                            </div>
                            <div class="single-brand">
                                <a href="#"><img src="{{ asset('shop/img/brand/2.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/3.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/4.jpg') }}" alt="brand-image"></a>
                                <a href="#"><img src="{{ asset('shop/img/brand/1.jpg') }}" alt="brand-image"></a>
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
                                            <img class="primary-img" src="{{ asset("storage/store/" . $product->img_full_name) }}"
                                                 alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal"
                                           title="Quick View"><i class="lnr lnr-magnifier"></i></a>
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
                                    <h3><a href="product.html">{{ $product->st_name }}</a></h3>
                                    <div class="pro-price mtb-20">
                                        <p><span class="price">{{ $product->discount_price }} RUB</span>
                                            <del class="prev-price">{{ $product->price }} RUB</del></p>
                                        <div class="label-product l_sale">{{ $product->percent }}<span class="symbol-percent">%</span></div>
                                    </div>
                                    <p class="mb-30 pro-desc-details">{{ $product->st_description }}</p>
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
                        @foreach($newProductsChunk as $chunk)

                        <div class="double-product">
                            @foreach($chunk as $product)
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="{{ asset("storage/store/" . $product->img_full_name) }}"
                                             alt="single-product">
                                        <img class="secondary-img" src="{{ asset("storage/store/" . $product->img_full_name) }}"
                                             alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal"
                                       title="Quick View"><i class="lnr lnr-magnifier"></i></a>
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
                                            <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i>
                                                <span>Add To Compare</span></a>
                                            <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i>
                                                <span>Add to WishList</span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            @endforeach
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
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
