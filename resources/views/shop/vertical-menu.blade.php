<div class="container">
    <div class="row">
        <!-- Vertical Menu Start Here -->
        <div class="col-xl-3 col-lg-4 d-none d-lg-block">
            <div class="vertical-menu mb-all-30">
                <nav>
                    <ul class="vertical-menu-list">
                        @foreach($topLevelCategories as $category)
                            @if($loop->index < 10)
                            <li class="">
                                <a href="{{ route('shop.catalog', $category->id) }}">
                                    {{ Str::limit($category->st_name, 25) }}
                                    @if($category->children->count() > 0)
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    @endif
                                </a>
                                @if($category->children->count() > 0)
                                    @include('shop.manage-child',['children' => $category->children])
                                @endif
                            </li>
                            @endif
                        @endforeach
                        <!-- More Categoies Start -->
                            <li id="cate-toggle" class="category-menu v-cat-menu">
                                <ul>
                                    <li class="has-sub">
                                        <a href="#">More Categories</a>
                                        <ul class="category-sub">
                                            @foreach($topLevelCategories as $category)
                                                @if($loop->index > 9)
                                                    <li class="">
                                                        <a href="{{ route('shop.catalog', $category->id) }}">
                                                            {{ Str::limit($category->st_name, 25) }}
                                                            @if($category->children->count() > 0)
                                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                            @endif
                                                        </a>
                                                        @if($category->children->count() > 0)
                                                            @include('shop.manage-child',['children' => $category->children])
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- More Categoies End -->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Vertical Menu End Here -->
    </div>
    <!-- Row End -->
</div>
