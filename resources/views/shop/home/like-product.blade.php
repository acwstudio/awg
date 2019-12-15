<!-- Like Products Area Start Here -->
<div class="like-product ptb-95 ptb-sm-55 off-white-bg">
    <div class="container">
        <div class="like-product-area">
            <h2 class="section-ttitle2 mb-30">2019 Trending Products </h2>
            <!-- Like Product Activation Start Here -->
            <div class="like-pro-active owl-carousel">
            @foreach($productsTrend as $product)
                <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="{{ route('shop.product', $product->id) }}">
                                <img class="primary-img"
                                     src="{{ asset("storage/store/" . $product->img_full_name) }}"
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
                                <h4><a href="product.html">{{ $product->st_name }}</a></h4>
                                <p><span class="price">{{ $product->st_sale_price }} RUB</span></p>
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="compare.html" title="Compare">
                                        <i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                    <a href="wishlist.html" title="WishList">
                                        <i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->

                @endforeach
            </div>
            <!-- Like Product Activation End Here -->
        </div>
        <!-- main-product-tab-area-->
    </div>
    <!-- Container End -->
</div>
<!-- Like Products Area End Here -->
