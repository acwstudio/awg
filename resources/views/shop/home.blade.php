@extends('shop.layouts')

@section('content')

    <!-- Main Header Area Start Here -->
    <header>

        @include('shop.header-top')
        @include('shop.header-middle')
        @include('shop.header-bottom')
        @include('shop.header-mobile-vmenu')

    </header>

    <div class="main-page-banner black-bg2 home-3">

        @include('shop.vertical-menu')

        <!-- Slider Area Start Here -->
            <div class="slider_box">
                <div class="slider-wrapper theme-default">
                    <!-- Slider Background  Image Start-->
                    <div id="slider" class="nivoSlider">
                        <a href="shop.html">
                            <img src="{{ asset('shop/img/slider/7.jpg') }}"
                                 data-thumb="{{ asset('shop/img/slider/7.jpg') }}" alt="" title="#htmlcaption"/>
                        </a>
                        <a href="shop.html">
                            <img src="{{ asset('shop/img/slider/8.jpg') }}"
                                 data-thumb="{{ asset('shop/img/slider/8.jpg') }}" alt="" title="#htmlcaption2"/>
                        </a>
                    </div>
                    <!-- Slider Background  Image Start-->
                </div>
            </div>
            <!-- Slider Area End Here -->
    </div>

    @include('shop.like-product')

    @include('shop.footer')
@endsection