@extends('layouts.client-layouts')

@section('title', 'Beranda - Dashboard')

@push('css')
    <link rel="stylesheet" href="{{ asset('tampilan') }}/style/daftar.css" />
    <style>
        .daftar-bahan .col-12 {
          background-color: #38b6ff;
        }

        .daftar-bahan .title-text {
          font-size: 20px;
        }

        .daftar-bahan i {
          font-size: 19px;
        }

        .pencarian {
          box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.5);
        }
        .card {
          box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.4);
        }

        thead tr:last-child th {
          border-bottom: 1px solid black;
        }

        td {
          font-size: 14px;
        }

        /* .table > :not(:last-child) > :last-child > * {
          border-bottom-color: transparent !important;
          border-bottom-style: solid !important ;
          border-bottom-width: 1px !important ;
        } */

        input:focus {
          border-bottom: 2px solid #0099ff !important;
        }

        .search {
          top: 10px;
          transition: 0.2s;
          color: #9a9a9a;
        }

        input:focus ~ .search {
          transform: translateY(-18px) !important;
          color: #0099ff;
          font-size: 12px;
        }

        input:focus ~ .fa {
          color: #0099ff !important;
        }

        input:valid ~ .search {
          transform: translateY(-18px) !important;
          font-size: 12px;
        }

        .list table thead th {
          background-color: #0099ff;
          color: white;
        }

        /* .list table tbody tr:nth-child(odd) {
          background-color: #a5dbfa;
        }

        .list table tbody tr:nth-child(even) {
          background-color: #a5d4f391;
        } */
      </style>
@endpush

@section('header-content', 'Daftar Makanan Sehat')

@section('header-content-back')
    <header class="daftar-bahan fixed-top" id="daftar-bahan">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex mx-auto my-auto py-2 headerTop">
                    <a href="{{ route('client-menu-makanan') }}" class="card-title text-white mb-0 py-1 my-auto">
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
    {{-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid p-0">
          <button class="navbar-toggler border-0 shadow-none col-12 d-flex" type="button">
            <span class="navbar-toggler-icon" id="tujuan"></span>
            <p class="nabvar-brand me-auto my-auto fw-bold text-white ms-4 col-8">Cek Gizi Online</p>
          </button>
        </div>
    </nav> --}}
      <!-- end of header -->

      <!-- sidebar nav -->
      <x-client-sidebar />
      <!-- end of sidebar nav -->

      <!-- konten menu -->
    <section class="pencarian bg-white fixed-top" style="margin-top: 26px; top: 20px; padding-top: 10px">
        <div class="container">
          <div class="row">
            <div class="col-12 px-1 py-2">
              <form action="">
                <div class="mb-1 position-relative px-3">
                  <input type="text" class="form-control border-0 border-bottom border-dark rounded-0 shadow-none px-0" id="search" required />
                  <label for="search" class="position-absolute search">Cari Makanan</label>
                  <i class="fa fa-search position-absolute" style="top: 12px; right: 13px; font-size: 18px"></i>
                </div>
              </form>
            </div>
          </div>
        </div>
    </section>

    <section class="list pt-5 mt-5 mb-5" id="list">
        <div class="container">
            <div class="row mt-2 mb-5">

                @foreach ($makanan as $item)
                <!-- awal colomn card -->
                <div class="col-12 px-2">
                    <div class="card mb-3 p-0 pb-2">
                        <div class="row g-0">
                        <div class="col-3 text-center my-auto">
                            <img src="{{ asset('default-img') }}/{{ $item->makanan_gambar }}" class="rounded img-fluid" alt="" style="height: 60%; width: 90%" />
                        </div>
                        <div class="col-9 px-1">
                            <div class="card-body p-0">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center px-5" colspan="3" style="border-bottom: 1.5px solid rgba(0, 0, 0, 0.336)">{{ $item->makanan_nama }}</th>
                                    <th class="border-0 px-0"></th>
                                    <th class="border-0 px-0"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th class="fw-normal py-0 pt-1">Kalori</th>
                                    <td class="py-0 pt-1">:</td>
                                    <td class="fw-normal py-0 pt-1">{{ $item->makanan_kalori }} Kilokalori</td>
                                </tr>
                                <tr>
                                    <th class="fw-normal py-0">Karbohidrat</th>
                                    <td class="py-0">:</td>
                                    <td class="fw-normal py-0">{{ $item->makanan_karbohidrat }} Gram</td>
                                </tr>
                                <tr>
                                    <th class="fw-normal py-0">Lemak</th>
                                    <td class="py-0">:</td>
                                    <td class="fw-normal py-0">{{ $item->makanan_lemak }} Gram</td>
                                </tr>
                                <tr>
                                    <th class="fw-normal py-0">Protein</th>
                                    <td class="py-0">:</td>
                                    <td class="fw-normal py-0">{{ $item->makanan_protein }} Gram</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- akhir dari colomn card -->
                @endforeach
          </div>
          <br />
        </div>
    </section>

    <!-- background -->
    <div class="backdrop" id="backdrop"></div>
@endsection
