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

            <!-- Icon Cards-->
            <div class="row">
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
                               href="{{ route('mystore.sync.product') }}">
                                <span class="float-left">Загрузить каталог <i class="fas fa-download"></i></span>
                            </a>
                            <div class="mt-2 progress">
                                <div class="progress-bar" style="width:0%"></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

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