<ul class="ht-dropdown mega-child">
    @foreach($children as $child)

        <li class=""><a href="{{ route('shop.catalog', $child->id) }}">
                {{--<span><img src="{{ asset('shop/img/vertical-menu/1.png') }}" alt="menu-icon"></span>--}}
                {{ $child->st_name }}
                @if(count($child->children))
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                    @endif
            </a>

            @if(count($child->children))
                @include('shop.manage-child',['children' => $child->children])
            @endif
        </li>
    @endforeach

</ul>
