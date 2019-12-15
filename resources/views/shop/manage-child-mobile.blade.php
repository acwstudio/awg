<ul class="category-sub">
    @foreach($children as $child)

        <li class="{{ count($child->children) ? 'has-sub' : '' }}">
            <a href="shop.html">

                {{ $child->st_name }}

            </a>

            @if(count($child->children))
                @include('shop.manage-child-mobile',['children' => $child->children])
            @endif
        </li>
    @endforeach

</ul>
