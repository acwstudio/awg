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
                                <del class="prev-price">{{ $product->st_sale_price }}</del></p>
                        </div>
                        <!-- Product Content End -->
                    </div>
                @endforeach

            </div>

    @endforeach
    <!-- Side Item End -->
    </div>
</div>
