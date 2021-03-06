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

            input:focus~.search {
                transform: translateY(-18px) !important;
                color: #0099ff;
                font-size: 12px;
            }

            input:focus~.fa {
                color: #0099ff !important;
            }

            input:valid~.search {
                transform: translateY(-18px) !important;
                font-size: 12px;
            }

            .list table {
                color: rgb(46, 46, 46);
            }

            .list table thead th {
                background-color: #0099ff;
                color: white;
            }

            .list table tbody tr:nth-child(odd) {
                background-color: #a5dbfa;
            }

            .list table tbody tr:nth-child(even) {
                background-color: #a5d4f391;
            }
    </style>
@endpush

@section('header-content', 'Info Kebutuhan Gizi')

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
    <section class="list pt-5 mt-4 pb-3 mb-5" id="list">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h6 class="" style="font-size: 25px">Nutrisi Tiap Jenjang Usia</h6>
                </div>
                <!-- colom card -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col-12" colspan="3" class="text-center">Usia 0-6 Bulan</th>
                                        <th class="border-0 p-0"></th>
                                        <th class="border-0 p-0"></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td>Kalori</td>
                                        <td>:</td>
                                        <td>550 Kilokalori</td>
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat</td>
                                        <td>:</td>
                                        <td>28gram</td>
                                    </tr>
                                    <tr>
                                        <td>Protein</td>
                                        <td>:</td>
                                        <td>12gram</td>
                                    </tr>
                                    <tr>
                                        <td>Lemak</td>
                                        <td>:</td>
                                        <td>34gram</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- akhir dari colomn card -->
                <!-- card -->
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col-12" colspan="3" class="text-center">Usia 7-11 Bulan</th>
                                        <th class="border-0 p-0"></th>
                                        <th class="border-0 p-0"></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td>Kalori</td>
                                        <td>:</td>
                                        <td>725 Kilokalori</td>
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat</td>
                                        <td>:</td>
                                        <td>82gram</td>
                                    </tr>
                                    <tr>
                                        <td>Protein</td>
                                        <td>:</td>
                                        <td>18gram</td>
                                    </tr>
                                    <tr>
                                        <td>Lemak</td>
                                        <td>:</td>
                                        <td>36gram</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- akhir dari colomn card -->
                <!-- card -->
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col-12" colspan="3" class="text-center">Usia 1-3 Tahun</th>
                                        <th class="border-0 p-0"></th>
                                        <th class="border-0 p-0"></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td>Kalori</td>
                                        <td>:</td>
                                        <td>1125 Kilokalori</td>
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat</td>
                                        <td>:</td>
                                        <td>115gram</td>
                                    </tr>
                                    <tr>
                                        <td>Protein</td>
                                        <td>:</td>
                                        <td>26gram</td>
                                    </tr>
                                    <tr>
                                        <td>Lemak</td>
                                        <td>:</td>
                                        <td>44gram</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- akhir dari colomn card -->
                <!-- card -->
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col-12" colspan="3" class="text-center">Usia 4-6 Tahun</th>
                                        <th class="border-0 p-0"></th>
                                        <th class="border-0 p-0"></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td>Kalori</td>
                                        <td>:</td>
                                        <td>1600 Kilokalori</td>
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat</td>
                                        <td>:</td>
                                        <td>220gram</td>
                                    </tr>
                                    <tr>
                                        <td>Protein</td>
                                        <td>:</td>
                                        <td>35gram</td>
                                    </tr>
                                    <tr>
                                        <td>Lemak</td>
                                        <td>:</td>
                                        <td>62gram</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- akhir dari colomn card -->
                <!-- card -->
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col-12" colspan="3" class="text-center">Usia 7-9 Tahun</th>
                                        <th class="border-0 p-0"></th>
                                        <th class="border-0 p-0"></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td>Kalori</td>
                                        <td>:</td>
                                        <td>1850 Kilokalori</td>
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat</td>
                                        <td>:</td>
                                        <td>254gram</td>
                                    </tr>
                                    <tr>
                                        <td>Protein</td>
                                        <td>:</td>
                                        <td>49gram</td>
                                    </tr>
                                    <tr>
                                        <td>Lemak</td>
                                        <td>:</td>
                                        <td>72gram</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- akhir dari colomn card -->
                <!-- card -->
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col-12" colspan="3" class="text-center">Usia 10-12 Tahun</th>
                                        <th class="border-0 p-0"></th>
                                        <th class="border-0 p-0"></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td>Kalori</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">2100 Kilokalori (Laki-laki)</li>
                                                <li>2000 Kilokalori (Perempuan)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">289gram (Laki-laki)</li>
                                                <li>275gram (Perempuan)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Protein</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">56gram (Laki-laki)</li>
                                                <li>60gram</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lemak</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">70gram (Laki-laki)</li>
                                                <li>67gram (Perempuan)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- akhir dari colomn card -->
                <!-- card -->
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col-12" colspan="3" class="text-center">Usia 13-15 Tahun</th>
                                        <th class="border-0 p-0"></th>
                                        <th class="border-0 p-0"></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td>Kalori</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">2475 Kilokalori (Laki-laki)</li>
                                                <li>2125 Kilokalori (Perempuan)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">340gram (Laki-laki)</li>
                                                <li>292gram (Perempuan)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Protein</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">72gram (Laki-laki)</li>
                                                <li>69gram</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lemak</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">83gram (Laki-laki)</li>
                                                <li>71gram (Perempuan)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- akhir dari colomn card -->
                <!-- card -->
                <div class="col-12 mb-5">
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col-12" colspan="3" class="text-center">Usia 16-18 Tahun</th>
                                        <th class="border-0 p-0"></th>
                                        <th class="border-0 p-0"></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td>Kalori</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">2676 Kilokalori (Laki-laki)</li>
                                                <li>2125 Kilokalori (Perempuan)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">368gram (Laki-laki)</li>
                                                <li>292gram (Perempuan)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Protein</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">66gram (Laki-laki)</li>
                                                <li>59gram</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lemak</td>
                                        <td>:</td>
                                        <td>
                                            <ul class="px-0 mb-0" style="list-style: none">
                                                <li class="mb-1">89gram (Laki-laki)</li>
                                                <li>71gram (Perempuan)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- akhir dari colomn card -->
            </div>
        </div>
    </section>

    <!-- background -->
    <div class="backdrop" id="backdrop"></div>
@endsection
