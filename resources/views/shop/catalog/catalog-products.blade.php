<!-- Product Categorie List Start -->
<div class="col-lg-9 order-1 order-lg-2">
    <!-- Grid & List View Start -->
    <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
        <div class="grid-list-view  mb-sm-15">
            <ul class="nav tabs-area d-flex align-items-center">
                <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
            </ul>
        </div>
        <!-- Toolbar Short Area Start -->
        <div class="main-toolbar-sorter clearfix">
            <div class="toolbar-sorter d-flex align-items-center">
                <label>Sort By:</label>
                <select class="sorter wide">
                    <option value="Position">Relevance</option>
                    <option value="Product Name">Neme, A to Z</option>
                    <option value="Product Name">Neme, Z to A</option>
                    <option value="Price">Price low to heigh</option>
                    <option value="Price" selected>Price heigh to low</option>
                </select>
            </div>
        </div>
        <!-- Toolbar Short Area End -->
        <!-- Toolbar Short Area Start -->
        <div class="main-toolbar-sorter clearfix">
            <div class="toolbar-sorter d-flex align-items-center">
                <label>Show:</label>
                <select class="sorter wide">
                    <option value="12">12</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <!-- Toolbar Short Area End -->
    </div>
    <!-- Grid & List View End -->
    <div class="main-categorie mb-all-40">
        <!-- Grid & List Main Area End -->
        <div class="tab-content fix">
            <div id="grid-view" class="tab-pane fade show active">
                <div class="row">
                    @foreach($products as $product)
                    <!-- Single Product Start -->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="product.html">
                                    <img class="primary-img" src="{{ asset('storage/store/' . $product->img_full_name) }}"
                                         alt="single-product">
                                    <img class="secondary-img" src="{{ asset('storage/store/' . $product->img_full_name) }}"
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
                                    <p><span class="price">{{ $product->st_sale_price }} RUB</span>
                                        {{--<del class="prev-price">$400.50</del>--}}
                                    </p>
                                    {{--<div class="label-product l_sale">30<span class="symbol-percent">%</span></div>--}}
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
                        </div>
                    </div>
                    <!-- Single Product End -->
                    @endforeach
                </div>
                <!-- Row End -->
            </div>
            <!-- #grid view End -->
            <div id="list-view" class="tab-pane fade">
                @foreach($products as $product)
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="row">
                        <!-- Product Image Start -->
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <div class="pro-img">
                                <a href="product.html">
                                    <img class="primary-img" src="{{ asset('storage/store/' . $product->img_full_name) }}"
                                         alt="single-product">
                                    <img class="secondary-img" src="{{ asset('storage/store/' . $product->img_full_name) }}"
                                         alt="single-product">
                                </a>
                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal"
                                   title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                <span class="sticker-new">new</span>
                            </div>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <div class="pro-content hot-product2">
                                <h4><a href="product.html">{{ $product->st_name }}</a></h4>
                                <p><span class="price">{{ $product->st_sale_price }} RUB</span></p>
                                <p>{{ $product->st_description }}</p>
                                <div class="pro-actions">
                                    <div class="actions-primary">
                                        <a href="cart.html" title="" data-original-title="Add to Cart"> + Add To
                                            Cart</a>
                                    </div>
                                    <div class="actions-secondary">
                                        <a href="compare.html" title="" data-original-title="Compare"><i
                                                    class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                        <a href="wishlist.html" title="" data-original-title="WishList"><i
                                                    class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                </div>
                <!-- Single Product End -->
                @endforeach

            </div>
            <!-- #list view End -->
            <div class="pro-pagination">
                <ul class="blog-pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <div class="product-pagination">
                    <span class="grid-item-list">Showing 1 to 12 of 51 (5 Pages)</span>
                </div>
            </div>
            <!-- Product Pagination Info -->
        </div>
        <!-- Grid & List Main Area End -->
    </div>
</div>
<!-- product Categorie List End -->
