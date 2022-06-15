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
            min-height: 1%;
            padding: 70px 0 80px 0 !important;
        }

        .berat-badan {
            background-image: linear-gradient(to left, #90d4fc, #38b6ff);
            z-index: 3;
        }

        .berat-badan .title-text {
            font-size: 20px;
        }

        .berat-badan i {
            font-size: 19px;
        }

        .daftar {
            min-height: 100%;
            padding: 50px 0 70px 0;
        }

        .daftar .card {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.178);
        }

        .card .childIcon {
            width: 60px;
            height: 60px;
            /* border: 3px solid black; */
        }

        .profile .card .card-title .card-text {
            font-size: 17px;
        }

        .backdrop.active {
            display: block;
        }

        .profile i {
            font-size: 20px;
        }

        .table>:not(caption)>*>* {
            border-bottom-width: 1px;
        }

        .card-body:nth-child(odd) {
            margin-left: 5%;
            margin-right: 40px;
        }

        .card-body:nth-child(even) {
            margin-left: 5%;
            margin-right: 30px;
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

    <section class="profile mt-1 mb-0" id="profile">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="">

                        <div class="card px-1 rounded-0 border-0" style="background-image: linear-gradient(to left, #90d4fc, #38b6ff);">
                            <div class="card-body">
                                <div class="card-title text-center text-white fw-bold">
                                    <p class="card-text">{{ $data->data_nama_lengkap }}</p>
                                </div>
                                <div class="card-title d-flex justify-content-between mb-0">
                                    <p class="card-text my-auto" style="font-size: 14px; color: rgba(255, 255, 255, 0.692)">Jenis Kelamin</p>
                                    <div class="icon text-white">
                                        @switch($data->data_jenis_kelamin)
                                            @case('L')
                                                <i class="fa fa-male my-auto"></i>
                                                @break
                                            @case('P')
                                                <i class="fa fa-female my-auto"></i>
                                                @break
                                        @endswitch
                                    </div>
                                </div>
                                <div class="card-title fw-bold text-white">
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
                                    <p class="card-text my-auto" style="font-size: 14px; color: rgba(255, 255, 255, 0.692)">Tanggal Lahir</p>
                                    <i class="fa fa-birthday-cake my-auto text-white"></i>
                                </div>
                                <div class="card-title fw-bold text-white">
                                    <p class="card-text">
                                        {{ date("d-m-Y", strtotime($data->data_tanggal_lahir)) }}
                                    </p>
                                </div>
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

    <section class="hasil" id="hasil">
        <div class="container">
            <div class="row">
                <div class="col-12 py-0 mb-5">
                    <div class="card border-success rounded-0 border-start-0 border-end-0" id="card">
                        <div class="card-title mt-3 mb-0">
                            <h6 style="font-size: 22px;">Berat Badan Menurut Umur</h6>
                        </div>
                        <div class="card-data d-flex flex-row position-relative" id="card-data">

                            <div class="left position-absolute" id="btn-scroll-left" style="left: 0; top: 50%"><button
                                    class="btn bg-primary text-white border border-1 rounded-circle shadow-none"><i
                                        class="fa fa-arrow-left"></i></button></div>
                            <div class="card-text text-center d-flex overflow-scroll px-3" style="width: 100%"
                                id="card-text">
                                <div class="card-body" style="width: 100%;" id="cb">
                                    <div class="row">
                                        <div class="col-12 text-center border border-dark rounded-2">
                                            <table class="table" style="border: 0px solid transparent">
                                                <thead class="border-0">
                                                    <tr class="">
                                                        <th colspan="3" class="my-auto">
                                                            <p class="mb-1 text-success">Gizi Baik</p>
                                                        </th>
                                                        <th colspan="2" class=""><button
                                                                class="btn btn-danger">Hapus</button></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Z Score</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">1.2</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Umur saat perhitungan</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">5 Bulan</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Berat badan</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">28kg</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="width: 100%;" id="cb">
                                    <div class="row">
                                        <div class="col-12 text-center border border-dark rounded-2">
                                            <table class="table" style="border: 0px solid transparent">
                                                <thead class="border-0">
                                                    <tr class="">
                                                        <th colspan="3" class="my-auto">
                                                            <p class="mb-1 text-danger">Gizi Kurang</p>
                                                        </th>
                                                        <th colspan="2" class=""><button
                                                                class="btn btn-danger">Hapus</button></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Z Score</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">0.9</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Umur saat perhitungan</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">9 Bulan</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Berat badan</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">20kg</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="width: 100%;" id="cb">
                                    <div class="row">
                                        <div class="col-12 text-center border border-dark rounded-2">
                                            <table class="table" style="border: 0px solid transparent">
                                                <thead class="border-0">
                                                    <tr class="">
                                                        <th colspan="3" class="my-auto">
                                                            <p class="mb-1 text-warning">Gizi Lebih</p>
                                                        </th>
                                                        <th colspan="2" class=""><button
                                                                class="btn btn-danger">Hapus</button></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Z Score</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">1.9</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Umur saat perhitungan</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">15 Bulan</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Berat badan</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">32kg</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="width: 100%;" id="cb">
                                    <div class="row">
                                        <div class="col-12 text-center border border-dark rounded-2">
                                            <table class="table" style="border: 0px solid transparent">
                                                <thead class="border-0">
                                                    <tr class="">
                                                        <th colspan="3" class="my-auto">
                                                            <p class="mb-1 text-success">Gizi Baik</p>
                                                        </th>
                                                        <th colspan="2" class=""><button
                                                                class="btn btn-danger">Hapus</button></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Z Score</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">1.7</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Umur saat perhitungan</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">19 Bulan</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="text-start mx-1">Berat badan</th>
                                                        <td>:</td>
                                                        <td colspan="4" class="text-end">28kg</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right position-absolute" style="right: 0; top: 50%" id="btn-scroll-right"><button
                                    class="btn bg-primary text-white border border-1 rounded-circle shadow-none"><i
                                        class="fa fa-arrow-right"></i></button></div>
                        </div>
                    </div>
                    <div class="card mt-4 border-warning rounded-0 border-start-0 border-end-0 py-2">
                        <div class="card-title">
                            <h6 style="font-size: 20px;">Tinggi Badan Menurut Umur</h6>
                        </div>
                        <div class="card-text">
                            @if ($hasil_pemeriksaan->hasil_zscore_tinggi == NULL)
                            <h5 class="text-center text-danger">Data Kosong, Lakukan pengukuran terlebih dahulu !!! </h5>
                            @else
                            <h5 class="text-center text-success">Z-Score : {{ $hasil_pemeriksaan->hasil_zscore_tinggi }}</h5>
                            @endif
                        </div>
                    </div>
                    <div class="card mt-4 border-danger rounded-0 border-start-0 border-end-0 py-2 mb-5">
                        <div class="card-title">
                            <h6 style="font-size: 20px;">Berat Badan Menurut Tinggi Badan</h6>
                        </div>
                        <div class="card-text">
                            @if ($hasil_pemeriksaan->hasil_zscore_berat == NULL)
                            <h5 class="text-center text-danger">Data Kosong, Lakukan pengukuran terlebih dahulu !!! </h5>
                            @else
                            <h5 class="text-center text-success">Z-Score : {{ $hasil_pemeriksaan->hasil_zscore_berat }}</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
<script type="text/javascript">
    // Carausol JS

    $('#btn-scroll-right').click(function() {
        event.preventDefault();
        $('#card-text').animate({
                scrollLeft: '+=305px',
            },
            'slow'
        );
    });

    $('#btn-scroll-left').click(function() {
        event.preventDefault();
        $('#card-text').animate({
                scrollLeft: '-=305px',
            },
            'slow'
        );
    });
</script>
@endpush
