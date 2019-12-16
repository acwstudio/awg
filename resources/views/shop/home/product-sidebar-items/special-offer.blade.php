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
                        <del class="prev-price">{{ $product->st_sale_price }}</del></p>
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
