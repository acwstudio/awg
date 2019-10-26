<div class="container">
    <div class="row">
        <!-- Vertical Menu Start Here -->
        <div class="col-xl-3 col-lg-4 d-none d-lg-block">
            <div class="vertical-menu mb-all-30">
                <nav>
                    <ul class="vertical-menu-list">
                        @foreach($topLevelCategories as $category)
                            <li class="">
                                <a href="shop.html">
                                        {{--<span><img src="{{ asset('shop/img/vertical-menu/1.png') }}" alt="menu-icon"></span>--}}
                                    {{ $category->name }}
                                    @if($category->children->count() > 0)
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    @endif
                                </a>
                                @if($category->children->count() > 0)
                                    @include('manage-child',['children' => $category->children])
                                @endif
                            </li>
                        @endforeach
                        <!-- More Categoies End -->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Vertical Menu End Here -->
    </div>
    <!-- Row End -->
</div>