<div>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
          <a href="index.html">APLIKASI GIZI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
          <a href="index.html">AG</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li class="">
                <a class="nav-link" href="{{ route('admin-home') }}"><i class="far fa-square"></i> <span>Beranda</span></a>
            </li>
            <li class="">
                <a class="nav-link" href="{{ route('admin-home') }}" data-toggle="modal" data-target="#modalakun"><i class="far fa-square"></i> <span>Akun</span></a>
            </li>

            {{-- MODAL LIHAT INFORMASI AKUN  --}}
            <div class="modal fade" id="modalakun" tabindex="1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Data Akun</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                                    <img src="{{ asset('default-img') }}/male.jpg" alt="" class="img img-thumbnail" width="65%">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <h5 class="fix-text-h5">Nama Lengkap </h5>
                                    <h5 class="fix-text-h5">Username </h5>
                                    <h5 class="fix-text-h5">Hak Akses </h5>
                                    <h5 class="fix-text-h5">Status Pengguna </h5>
                                    <h5 class="fix-text-h5">Email</h5>
                                    <h5 class="fix-text-h5">No. HP / Telepon</h5>
                                </div>
                                <div class="col-sm-8 col-md-8 col-lg-8">
                                    <h5 class="fix-text-h5">: NULL </h5>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn gray btn-info" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Kelola Akun</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index.html">Lihat Informasi Akun</a></li>
              </ul>
            </li> --}}

            <li class="menu-header">Menu Kelola</li>

            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Kelola Data</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#"> Data Anak </a></li>
                <li><a class="nav-link" href="#"> Data Balita </a></li>
                <li><a class="nav-link" href="#"> Grafik Pertumbuhan</a></li>
                <li><a class="nav-link" href="#"> Status Gizi</a></li>
                <li><a class="nav-link" href="#"> Laporan </a></li>
              </ul>
            </li>

            {{-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Pengaturan</span></a></li> --}}
          </ul>

          {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-info btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Ke Halaman Utama
            </a>
          </div> --}}
      </aside>
</div>
