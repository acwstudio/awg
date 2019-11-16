@extends('admin.layouts')

@section('content')

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>
            <div class="row mb-2">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Заполнение данными со склада</h5>
                </div>
            </div>
            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div id="amt-category-items" class="card o-hidden h-100">
                        <div class="card-header text-white bg-dark">
                            <div class="mr-5">
                                <span><i class="fas fa-fw fa-list"></i></span><span> Кол-во категорий</span>
                            </div>
                        </div>
                        <div class="card-body bg-light">
                            <div class="text-center mr-5"><h1>{{ $amtCategories }}</h1></div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-outline-info text-outline-info clearfix"
                               href="{{ route('mystore.ini_category') }}">
                                <span class="float-left">Загрузить категории <i class="fas fa-download"></i></span>
                            </a>
                            <div class="mt-2 progress">
                                <div class="progress-bar" style="width:0%"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div id="amt-catalog-items" class="card o-hidden h-100">
                        <div class="card-header text-white bg-dark">
                            <div class="mr-5">
                                <span><i class="fas fa-fw fa-list"></i></span><span> Кол-во позиций в каталоге</span>
                            </div>
                        </div>
                        <div class="card-body bg-light">
                            <div class="text-center mr-5"><h1>{{ $amtPositions }}</h1></div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-outline-info text-outline-info clearfix"
                               href="{{ route('mystore.ini_product') }}">
                                <span class="float-left">Загрузить каталог <i class="fas fa-download"></i></span>
                            </a>
                            <div class="mt-2 progress">
                                <div class="progress-bar" style="width:0%"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div id="amt-image-items" class="card o-hidden h-100">
                        <div class="card-header text-white bg-dark">
                            <div class="mr-5">
                                <span><i class="fas fa-fw fa-list"></i></span><span> Кол-во изображений</span>
                            </div>
                        </div>
                        <div class="card-body bg-light">
                            <div class="text-center mr-5"><h1>{{ $amtImages }}</h1></div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-outline-info text-outline-info clearfix"
                               href="{{ route('mystore.ini_product_image') }}">
                                <span class="float-left">Загрузить изображения <i class="fas fa-download"></i></span>
                            </a>
                            <div class="mt-2 progress">
                                <div class="progress-bar" style="width:0%"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div id="wh-products" class="card o-hidden h-100">
                        <div class="card-header text-white bg-dark">
                            <div class="mr-5">
                                <span><i class="fas fa-fw fa-check"></i></span><span> Веб хуки товаров</span>
                            </div>
                        </div>
                        <div class="card-body bg-light">
                            <div class=""><h2 class="text-justify">CREATE PUT DELETE</h2></div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-outline-info text-outline-info clearfix"
                               href="{{ route('mystore.webhook.create') }}">
                                <span class="float-left">Создать веб хуки <i class="fas fa-download"></i></span>
                            </a>
                            <div class="mt-2 progress">
                                <div class="progress-bar" style="width:0%"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{--<div class="row">--}}
                {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
                    {{--<div id="wh-products" class="card o-hidden h-100">--}}
                        {{--<div class="card-header text-white bg-dark">--}}
                            {{--<div class="mr-5">--}}
                                {{--<span><i class="fas fa-fw fa-check"></i></span><span> Веб хуки товаров</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="card-body bg-light">--}}
                            {{--<div class=""><h2 class="text-justify">CREATE PUT DELETE</h2></div>--}}
                        {{--</div>--}}
                        {{--<div class="card-footer">--}}
                            {{--<a class="btn btn-outline-info text-outline-info clearfix"--}}
                               {{--href="{{ route('mystore.webhook.create') }}">--}}
                                {{--<span class="float-left">Создать веб хуки <i class="fas fa-download"></i></span>--}}
                            {{--</a>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@endsection