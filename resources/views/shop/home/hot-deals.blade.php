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
