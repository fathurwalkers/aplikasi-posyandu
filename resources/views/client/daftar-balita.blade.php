@extends('layouts.client-layouts')

@section('title', 'Daftar Balita - Dashboard')

@push('css')
    <link rel="stylesheet" href="{{ asset('tampilan') }}/style/daftar.css" />
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

@section('header-content', 'Daftar Balita')

@section('header-content-back')
    <header class="daftar-bahan fixed-top" id="daftar-bahan">
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
                    <p class="title-text text-white fw-bold my-auto py-1 col-11 text-center">Daftar Balita</p>
                </div>
            </div>
        </div>
    </header> --}}
    <!-- end of header -->

    <!-- menu-->
    <section id="daftar" class="daftar">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3">
                    <h5 class="">Daftar Balita</h5>
                </div>
            </div>

            @foreach ($balita as $item)
            <div class="card mt-2">
                <div class="row g-0">
                    <div class="col-3 text-center d-flex justify-content-center p-3 my-auto">
                        <img src="{{ asset('default-img/foto') }}/{{ $item->data_foto }}" alt="icon" class="childIcon" />
                    </div>
                    <div class="col-6 me-auto py-1 font">
                        <div class="card-body text-decoration-none d-flex p-0 py-1 me-auto">
                            <i class="fa fa-user my-auto px-1"></i>
                            <p class="card-text ms-1">{{ $item->data_nama_lengkap }}</p>
                        </div>
                        <div class="card-body text-decoration-none d-flex p-0 me-auto">
                            <i class="fa fa-calendar my-auto px-1"></i>
                            @php
                                $date1 = strtotime($item->data_tanggal_lahir);
                                $date2 = strtotime(now());
                                $totalbulan = 0;
                                while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2) {
                                    $totalbulan++;
                                }
                            @endphp
                            <p class="card-text ms-1">{{ $totalbulan }} Bulan</p>
                        </div>
                        <div class="card-body text-decoration-none d-flex p-0 ms-1">
                            <i class="fa fa-male my-auto"></i>
                            <i class="fa fa-female my-auto"></i>
                            <p class="card-text ms-2">
                                @switch($item->data_jenis_kelamin)
                                    @case("L")
                                        Laki-Laki
                                        @break
                                    @case("P")
                                        Perempuan
                                        @break
                                    @default
                                @endswitch
                            </p>
                        </div>
                    </div>
                    <div class="col-3 px-2 py-2 d-flex flex-column justify-content-between">
                        <button class="btn rounded-3 shadow-none lihat text-white px-2 mb-1" type="submit"
                        onclick="location.href = '{{ route('lihat-profile', $item->id) }}';">Lihat</button>
                        {{-- <a href="{{ route('lihat-profile', $item->id) }}" id="views">Lihat</a> --}}

                        <form action="{{ route('admin-hapus-data-balita', $item->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger rounded-3 shadow-none hapus px-3">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="row mt-3 mb-5">
                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                    {{ $balita->onEachSide(0)->links() }}
                </div>
            </div>

            <a href="{{ route('client-tambah-data') }}" class="card-body tambah img-thumbnail rounded-circle text-white">
                <i class="fa fa-user-plus"></i>
            </a>
        </div>
    </section>
@endsection
