<ul class="category-sub">
    @foreach($children as $child)

        <li class="{{ count($child->children) ? 'has-sub' : '' }}">
            <a href="shop.html">

                {{ $child->name }}

            </a>

            @if(count($child->children))
                @include('manage-child',['children' => $child->children])
            @endif
        </li>
    @endforeach

</ul>