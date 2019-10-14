@extends('shop.layouts')

@section('content')
    <div class="main-page-banner black-bg2 home-3">

        @include('shop.vertical-menu')
        {{--@include('shop.slider-area')--}}
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

    <h1>Home page</h1>

@endsection