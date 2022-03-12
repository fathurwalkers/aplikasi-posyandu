@extends('layouts.client-layouts')

@section('title', 'Daftar Makanan - Dashboard')

@push('css')
<style>
    html {
        overflow: hidden;
    }

    .daftar-bahan .col-12 {
        background-color: #38b6ff;
    }

    .daftar-bahan .title-text {
        font-size: 20px;
    }

    .daftar-bahan i {
        font-size: 19px;
    }

    .menu .card {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    }

    .menu .card {
        border: 2px solid #38b6ff;
    }
</style>
@endpush

@section('main-content')
    <!-- header -->
    <header class="daftar-bahan fixed-top" id="daftar-bahan">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex mx-auto my-auto py-2 headerTop">
                    <a href="dashboard.html" class="card-title text-white mb-0 py-1 my-auto">
                        <i class="fa fa-arrow-left mb-0"></i>
                    </a>
                    <p class="title-text text-white fw-bold my-auto py-1 col-11 text-center">Daftar Makanan</p>
                </div>
            </div>
        </div>
    </header>
    <!-- end of header -->

    <!-- menu-->

    <section class="menu mt-5 pt-3" id="menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="daftar-bahan.html" class="nav-link px-1 text-dark">
                        <div class="card text-center px-0 py-2 bg-white text-dark">
                            <div class="card-title mb-0 display-6 fw-bold p-2">Informasi Daftar Bahan</div>
                            <div class="card-body py-2 px-1">Melihat kandungan gizi bahan makanan</div>
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a href="info-gizi.html" class="nav-link px-1 text-dark">
                        <div class="card text-center px-0 py-2 text-dark bg-white">
                            <div class="card-title mb-0 display-6 fw-bold p-2">Kebutuhan Gizi</div>
                            <div class="card-body py-3 px-1">Berisi Informasi tentang kebutuhan nutrisi anak sesuai angka kecukupan gizi (AKG)</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
