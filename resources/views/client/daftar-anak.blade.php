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
    <!-- menu-->
    <section id="daftar" class="daftar">
        <div class="container">
          <div class="row">
            <div class="col-12 mt-3">
              <h5 class="">Daftar Anak</h5>
            </div>
          </div>
          <div class="card mt-2">
            <div class="row g-0">
              <div class="col-3 text-center d-flex justify-content-center p-3 my-auto">
                <img src="img/businessman.png" alt="icon" class="childIcon" />
              </div>
              <div class="col-6 me-auto py-1 font">
                <div class="card-body text-decoration-none d-flex p-0 py-1 me-auto">
                  <i class="fa fa-user my-auto px-1"></i>
                  <p class="card-text ms-1">Awaluddin Rajab</p>
                </div>
                <div class="card-body text-decoration-none d-flex p-0 me-auto">
                  <i class="fa fa-calendar my-auto px-1"></i>
                  <p class="card-text ms-1">31 10 2019</p>
                </div>
                <div class="card-body text-decoration-none d-flex p-0 ms-1">
                  <i class="fa fa-male my-auto"></i>
                  <i class="fa fa-female my-auto"></i>
                  <p class="card-text ms-2">Laki-laki</p>
                </div>
              </div>
              <div class="col-3 px-2 py-1 d-flex flex-column justify-content-between">
                <button class="btn rounded-3 shadow-none lihat text-white px-1" type="submit" onclick="document.getElementById('views').click(); return false">Lihat</button>
                <a href="lihat.html" id="views">Lihat</a>
                <button class="btn btn-danger rounded-3 shadow-none hapus px-1">Hapus</button>
              </div>
            </div>
          </div>

          <a href="tambah-anak.html" class="card-body tambah img-thumbnail rounded-circle text-white">
            <i class="fa fa-user-plus"></i>
          </a>
        </div>
      </section>
@endsection
