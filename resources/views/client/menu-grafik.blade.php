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
    <section id="daftar" class="daftar mt-4 pt-4">
        <div class="container mt-4">
          <div class="row">
            <div class="col-12 px-1">
              <a href="{{ route('grafik-berat') }}" class="nav-link px-1 text-dark">
                <!-- card -->
                <div class="card ">
                  <div class="card-title text-center mb-0 px-2 bg-success rounded-2 py-3 my-auto">
                    <h6 style="font-size: 18px" class="mb-0 my-auto">Berat Badan Menurut Umur (BB/U)</h6>
                  </div>
                </div>
                <!-- akhir dari card -->
              </a>
            </div>
            <div class="col-12 px-1">
              <a href="{{ route('grafik-tinggi') }}" class="nav-link px-1 text-dark">
                <!-- card -->
                <div class="card">
                  <div class="card-title text-center mb-0 px-1 bg-warning rounded-2 py-3 my-auto">
                    <h6 style="font-size: 18px" class="mb-0">Tinggi Badan Menurut Umum (TB/U)</h6>
                  </div>
                </div>
                <!-- akhir dari card -->
              </a>
            </div>
            <div class="col-12 px-1">
              <a href="{{ route('grafik-berat-tinggi') }}" class="nav-link px-1 text-dark">
                <!-- card -->
                <div class="card">
                  <div class="card-title text-center mb-0 px-1 bg-danger rounded-2 py-3 my-auto">
                    <h6 style="font-size: 18px" class="mb-0">Berat Badan Menurut Tinggi Badan (BB/TB)</h6>
                  </div>
                </div>
                <!-- akhir dari card -->
              </a>
            </div>
          </div>
        </div>
      </section>

    <!-- background -->
    <div class="backdrop" id="backdrop"></div>
@endsection
