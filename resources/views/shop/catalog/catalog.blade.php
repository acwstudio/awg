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

    </div>

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li class="active"><a href="#">Каталог</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>

    <!-- Shop Page Start -->
    <div class="main-shop-page pt-100 pb-100 ptb-sm-60">

        <div class="container">
            <!-- Row End -->
            <div class="row">

                @include('shop.catalog.catalog-sidebar')
                @include('shop.catalog.catalog-products')

            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Shop Page End -->

    @include('shop.support')

    @include('shop.footer')

@endsection