@extends('layouts.client-layouts')

@section('title', 'Beranda - Dashboard')

@section('main-content')
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid p-0">
            <button class="navbar-toggler border-0 shadow-none col-12 d-flex" type="button">
                <span class="navbar-toggler-icon" id="tujuan"></span>
                <p class="nabvar-brand me-auto my-auto fw-bold text-white ms-4 col-8">Cek Gizi Online</p>
            </button>
        </div>
    </nav>
    <!-- end of header -->

    <!-- sidebar nav -->
    <x-client-sidebar />
    <!-- end of sidebar nav -->

    <!-- konten menu -->
    <section id="content" class="content py-5 d-flex justify-content-center align-items-center" style="min-height: 100%">
        <div class="container">

            <a href="{{ route('client-daftar-anak') }}"
                class="card mb-3 text-decoration-none status-gizi text-white p-0">
                <div class="row g-0">
                    <div class="col-8">
                        <div class="card-body px-1">
                            <h5 class="card-title p-0 m-0">Daftar Anak</h5>
                            {{-- <p class="card-text p-0 m-0">Daftar Menu untuk administrator</p> --}}
                        </div>
                    </div>
                    <div class="col-4 mx-auto my-auto text-center py-4">
                        <i style="font-size: 45px" class="fa fa-list-alt p-0"></i>
                    </div>
                </div>
            </a>

            <a href="{{ route('client-daftar-balita') }}"
                class="card mb-3 text-decoration-none status-gizi text-white p-0">
                <div class="row g-0">
                    <div class="col-8">
                        <div class="card-body px-1">
                            <h5 class="card-title p-0 m-0">Daftar Balita</h5>
                            {{-- <p class="card-text p-0 m-0">Daftar Menu untuk administrator</p> --}}
                        </div>
                    </div>
                    <div class="col-4 mx-auto my-auto text-center py-4">
                        <i style="font-size: 45px" class="fa fa-list-alt p-0"></i>
                    </div>
                </div>
            </a>

        </div>
    </section>

    <!-- background -->
    <div class="backdrop" id="backdrop"></div>
@endsection
