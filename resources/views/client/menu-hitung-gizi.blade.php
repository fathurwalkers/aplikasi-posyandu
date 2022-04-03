@extends('layouts.client-layouts')

@section('title', 'Daftar Anak - Dashboard')

@push('css')
    <link rel="stylesheet" href="{{ asset('tampilan') }}/style/daftar.css" />
    <style>
        html {
            overflow: hidden;
        }

        .hitung-gizi {
            background-color: #38b6ff;
        }

        .hitung-gizi .title-text {
            font-size: 20px;
        }

        .hitung-gizi i {
            font-size: 19px;
        }

        .daftar {
            min-height: 100%;
            padding: 50px 0 70px 0;
        }

        .daftar .card {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.278);
            border-top: transparent;
        }

        .daftar .card .card-title {
            background-color: #38b6ff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            color: white;
        }

        .card .childIcon {
            width: 60px;
            height: 60px;
            /* border: 3px solid black; */
        }
        .profile {
            position: relative;
            z-index: 1 !important;
            min-height: 100%;
            padding: 70px 0 80px 0!important;
        }
    </style>
@endpush

@section('header-content', 'Hitung Gizi')

@section('header-content-back')
<header class="hitung-gizi fixed-top" id="hitung-gizi">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex mx-auto my-auto py-2 headerTop">
                <a href="{{ route('client-home') }}" class="card-title text-white mb-0 py-1 my-auto">
                    <i class="fa fa-arrow-left mb-0"></i>
                </a>
                    <p class="title-text text-white fw-bold my-auto py-1 col-11 text-center">@yield('header-content')</p>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('main-content')
    <!-- header -->
    {{-- <header class="daftar-bahan fixed-top" id="daftar-bahan">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex mx-auto my-auto py-2 headerTop">
                    <a href="dashboard.html" class="card-title text-white mb-0 py-1 my-auto">
                        <i class="fa fa-arrow-left mb-0"></i>
                    </a>
                    <p class="title-text text-white fw-bold my-auto py-1 col-11 text-center">Daftar Anak</p>
                </div>
            </div>
        </div>
    </header> --}}
    <!-- end of header -->

    <section id="daftar" class="daftar mt-3">
        <div class="container">
            <div class="row">
                <div class="col-6 px-1">
                    <a href="berat-badan.html" class="nav-link px-1 text-dark">
                        <!-- card -->
                        <div class="card">
                            <div class="card-title text-center mb-0 pt-1 px-2 bg-success">
                                <h6 style="font-size: 15px">Berat Badan Menurut Umur (BB/U)</h6>
                            </div>
                            <div class="card-body px-1 py-2 text-center">
                                <p class="card-text" style="font-size: 12px">Mengukur Status Gizi anak dengan standar Berat Badan Menurut Umur</p>
                            </div>
                        </div>
                        <!-- akhir dari card -->
                    </a>
                </div>
                <div class="col-6 px-1">
                    <a href="tinggi-badan.html" class="nav-link px-1 text-dark">
                        <!-- card -->
                        <div class="card">
                            <div class="card-title text-center mb-0 pt-1 px-0 bg-warning">
                                <h6 style="font-size: 15px">Tinggi Badan Menurut Umum (TB/U)</h6>
                            </div>
                            <div class="card-body px-1 py-2 text-center">
                                <p class="card-text" style="font-size: 12px">Mengukur Status Gizi anak dengan standar Tinggi Badan Menurut Umur</p>
                            </div>
                        </div>
                        <!-- akhir dari card -->
                    </a>
                </div>
                <div class="col-12 px-1">
                    <a href="beratbadan-tinggibadan.html" class="nav-link px-1 text-dark">
                        <!-- card -->
                        <div class="card">
                            <div class="card-title text-center mb-0 pt-2 px-1 bg-danger">
                                <h6 style="font-size: 15px">Berat Badan Menurut Tinggi Badan (BB/TB)</h6>
                            </div>
                            <div class="card-body px-1 py-2 text-center">
                                <p class="card-text" style="font-size: 12px">Mengukur Status Gizi anak dengan standar Berat Badan Menurut Tinggi Badan</p>
                            </div>
                        </div>
                        <!-- akhir dari card -->
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
