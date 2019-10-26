<ul class="ht-dropdown mega-child">
    @foreach($children as $child)

        <li class=""><a href="shop.html">
                {{--<span><img src="{{ asset('shop/img/vertical-menu/1.png') }}" alt="menu-icon"></span>--}}
                {{ $child->name }}
                @if(count($child->children))
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                    @endif
            </a>

            @if(count($child->children))
                @include('manage-child',['children' => $child->children])
            @endif
        </li>
    @endforeach

</ul>
