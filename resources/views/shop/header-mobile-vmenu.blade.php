<!-- Mobile Vertical Menu Start Here -->
<div class="container d-block d-lg-none">
    <div class="vertical-menu mt-30">
        <span class="categorie-title mobile-categorei-menu">Каталог товаров </span>
        <nav>
            <div id="cate-mobile-toggle"
                 class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                <ul>
                    @foreach($topLevelCategories as $category)
                    <li class="{{ $category->children->count() > 0 ? 'has-sub' : '' }}">
                        <a href="#">{{ $category->name }} </a>

                    @if($category->children->count() > 0)
                        @include('shop.manage-child-mobile',['children' => $category->children])
                    @endif

                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- category-menu-end -->
        </nav>
    </div>
</div>
<!-- Mobile Vertical Menu Start End -->