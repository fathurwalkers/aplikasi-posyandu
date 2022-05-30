@extends('layouts.client-layouts')

@section('title', 'Daftar Anak - Dashboard')

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
        .menu-account {
        width: 100%;
        padding: 10px 0 5px 0;
        position: fixed;
        z-index: 5 !important;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.144);
        }

        .profile {
        position: relative;
        z-index: 1 !important;
        min-height: 100%;
        padding: 140px 0 80px 0;
        }

        .profile .card {
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }

        #gambar1 {
        width: 200px;
        height: 200px;
        margin-left: -10px;
        margin-top: -3px;
        }

        .inputImage {
        visibility: hidden;
        color: transparent;
        }

        .profile {
            position: relative;
            z-index: 1 !important;
            min-height: 100%;
            padding: 70px 0 80px 0!important;
        }
    </style>
@endpush

@section('header-content', 'Data Akun')

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
                    <p class="title-text text-white fw-bold my-auto py-1 col-11 text-center">Daftar Anak</p>
                </div>
            </div>
        </div>
    </header> --}}
    <!-- end of header -->

    <!-- menu-->
    <section class="profile" id="profile">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-3">Ubah Data</h5>
                </div>
                <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <form action="{{ route('client-update-data', $data->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card border-1 py-1 bg-transparent">
                            <div class="card-body bg-transparent text-center">
                                <img src="{{ asset('default-img/foto') }}/{{ $data->data_foto }}" class="card-img-top" alt="profile" id="gambar1" />
                                <button class="btn col-12 mt-3 text-white"onclick="document.getElementById('photo').click(); return false" style="background-color: #0099ff;">Ubah Foto Profil</button>
                                <input type="file" onchange="readURL(this);"
                                class="form-control inputImage btn btn-primary text-center px-0" id="photo" accept="image/*"
                                style="color: transparent; display: none" name="data_foto"/>
                            </div>
                            <div class="card-body bg-transparent">
                                <p class="card-text">Nama Lengkap</p>
                                <input type="text" class="form-control" value="{{ $data->data_nama_lengkap }}" name="data_nama_lengkap" />
                            </div>
                            <div class="card-body bg-transparent">
                                <p class="card-text">Nama Orang Tua / Wali</p>
                                <input type="text" class="form-control" value="{{ $data->data_nama_orang_tua }}" name="data_nama_orang_tua" />
                            </div>
                            <div class="card-body bg-transparent">
                                <p class="card-text">Alamat</p>
                                <input type="text" class="form-control" value="{{ $data->data_alamat_lengkap }}" name="data_alamat_lengkap" />
                            </div>
                            <div class="card-body bg-transparent">
                                <p class="card-text">Jenis Kelamin</p>
                                <select id="data_jenis_kelamin" class="form-control" name="data_jenis_kelamin">
                                    <option value="{{ $data->data_jenis_kelamin }}" selected>
                                        @switch($data->data_jenis_kelamin)
                                            @case("L")
                                                Laki - Laki
                                                @break
                                            @case("P")
                                                Perempuan
                                                @break
                                        @endswitch
                                    </option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 mt-4">
                            <button class="btn col-12 py-2 rounded-pill text-white" style="background-color: #0099ff;">Simpan</button>
                        </div>
                    </form>
                    <a href="{{ route('menu-admin') }}" class="btn col-12 py-2 rounded-pill text-white" style="background-color: #0099ff;">Kembali</a>
                </div>
            </div>
        </div>
    </section>
@endsection
