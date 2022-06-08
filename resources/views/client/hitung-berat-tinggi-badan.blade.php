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

@section('header-content', 'Hitung Berat Badan')

@section('header-content-back')
<header class="hitung-gizi fixed-top" id="hitung-gizi">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex mx-auto my-auto py-2 headerTop">
                <a href="{{ route('client-menu-hitung-gizi') }}" class="card-title text-white mb-0 py-1 my-auto">
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

    <section class="profile mt-5" id="profile">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-1">
                    <form action="{{ route('post-hitung-berat-tinggi-badan') }}" method="POST">
                        @csrf
                        <div class="card px-1">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <p class="card-text">{{ $data->data_nama_lengkap }}</p>
                                </div>
                                <div class="card-title d-flex justify-content-between mb-0">
                                    <p class="card-text my-auto" style="font-size: 14px; color: #b4b4b4">Jenis Kelamin</p>
                                    <div class="icon">
                                        <i class="fa fa-male my-auto"></i>
                                        <i class="fa fa-female my-auto"></i>
                                    </div>
                                </div>
                                <div class="card-title">
                                    <p class="card-text">
                                        @switch($data->data_jenis_kelamin)
                                            @case('L')
                                                Laki - Laki
                                                @break
                                            @case('P')
                                                Perempuan
                                                @break
                                        @endswitch
                                    </p>
                                </div>
                                <div class="card-title d-flex justify-content-between mb-0">
                                    <p class="card-text my-auto" style="font-size: 14px; color: #b4b4b4">Tanggal Lahir</p>
                                    <i class="fa fa-birthday-cake my-auto"></i>
                                </div>
                                <div class="card-title">
                                    <p class="card-text">{{ date("d-m-Y", strtotime($data->data_tanggal_lahir)) }}</p>
                                </div>
                                <div class="card-title d-flex justify-content-between mb-0">
                                    <p class="card-text my-auto" style="font-size: 14px; color: #b4b4b4">Umur (Bulan)</p>
                                    <i class="fa fa-calendar-week my-auto"></i>
                                </div>
                                <div class="card-title">
                                    <p class="card-text">{{ $bulan }}</p>
                                </div>
                                <div class="card-title d-flex justify-content-between mb-0">
                                    <p class="card-text my-auto" style="font-size: 14px; color: #b4b4b4">Berat(kg)</p>
                                    <i class="fa fa-weight my-auto"></i>
                                </div>
                                <div class="mb-3 card-title">
                                    <input type="text" class="form-control border-0 border-bottom border-2 rounded-0 shadow-none px-0 input" required name="kg">
                                </div>
                                <div class="card-title d-flex justify-content-between mb-0">
                                    <p class="card-text my-auto" style="font-size: 14px; color: #b4b4b4">Tinggi(Cm)</p>
                                    <i class="fa fa-ruler-vertical my-auto"></i>
                                </div>
                                <div class="mb-0 card-title">
                                    <input type="text" class="form-control border-0 border-bottom border-2 rounded-0 shadow-none px-0 input" required name="cm">
                                </div>
                            </div>
                            {{-- <div class="card-body text-center px-1">
                                <button type="submit" class="btn btn-primary col-12 shadow-none fw-bold py-2 rounded-pill border-0" id="tujuan" style="background-color: #38b6ff;">Hitung Status Gizi Anak</button>
                            </div> --}}
                            <div class="col-12 d-flex justify-content-between mt-1 px-3">
                                <h5>Z-Score</h5>
                                @if ($hasil->hasil_zscore_berat_tinggi == null)
                                    <h5>Belum Melakukan Pengukuran</h5>
                                @else
                                    <h5>{{ $hasil->hasil_zscore_berat_tinggi }}</h5>
                                @endif
                            </div>
                            <div class="col-12 d-flex justify-content-between px-3">
                                <h5>Status Gizi</h5>
                                @switch($hasil->hasil_zscore_berat_tinggi)
                                @case ($hasil->hasil_zscore_berat_tinggi <= -3.0)
                                    <h5>Sangat Kurus</h5>
                                    @break
                                @case ($hasil->hasil_zscore_berat_tinggi >= -3.0 && $hasil->hasil_zscore_berat_tinggi <= -2.0)
                                    <h5>Kurus</h5>
                                    @break
                                @case ($hasil->hasil_zscore_berat_tinggi >= -2.0 && $hasil->hasil_zscore_berat_tinggi <= -1.0)
                                    <h5>Mendekati Kurus</h5>
                                    @break
                                @case ($hasil->hasil_zscore_berat_tinggi >= -1.0 && $hasil->hasil_zscore_berat_tinggi <= 1.0)
                                    <h5>Normal</h5>
                                    @break
                                @case ($hasil->hasil_zscore_berat_tinggi >= 1.0 && $hasil->hasil_zscore_berat_tinggi <= 2.0)
                                    <h5>Mendekati Gemuk</h5>
                                    @break
                                @case ($hasil->hasil_zscore_berat_tinggi >= 2.0 && $hasil->hasil_zscore_berat_tinggi <= 3.0)
                                    <h5>Gemuk</h5>
                                    @break
                                @case ($hasil->hasil_zscore_berat_tinggi >= 3.0)
                                    <h5>Sangat Gemuk</h5>
                                    @break
                                @case (null)
                                    <h5>Belum melakukan Pengukuran</h5>
                                    @break
                                @endswitch
                            </div>
                            <div class="col-12 py-3">
                                <button type="submit" class="btn btn-success text-white rounded-pill fw-bold col-12 py-2">PROSES</button>
                            </div>
                        </div>
                        <!-- akhir dari card -->
                    </form>
                    <!-- card -->
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
