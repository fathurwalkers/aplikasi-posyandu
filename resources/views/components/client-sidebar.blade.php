<div>
    <div class="navs col-10" id="navbarNav">
        <div class="row">
          <div class="akun-info col-12">
            <div class="card text-white rounded-0 sidenav">
              <div class="card-body pb-1 mt-3" id="navbarNav">
                <img class="card-img-top gambar img-thumbnail rounded-circle" src="{{ asset('default-img/foto') }}/{{ $users->data->data_foto }}" alt="user" />
              </div>
              <div class="card-body mt-3 pt-0 mb-0" id="navbarNav">
                <p class="card-text mb-0">{{ $users->login_nama }}</p>
                <p class="card-text mb-2">{{ $users->login_email }}</p>
              </div>
            </div>
          </div>
          <div class="col-12 text-white mt-3 menu">
            <ul class="nav flex-column">
              <li class="nav-item d-flex px-2 aktiv">
                <i class="fas fa-home my-auto"></i>
                <a class="nav-link" href="#">Menu Utama</a>
              </li>
              <li class="nav-item d-flex px-2">
                <i class="fas fa-info-circle my-auto"></i>
                <a class="nav-link" href="#">Bantuan</a>
              </li>
              <li class="nav-item d-flex px-2">
                <i class="fas fa-sign-out-alt my-auto"></i>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="logoutrequest" value="CLIENT">
                    <button type="submit" class="nav-link">Keluar Akun</button>
                </form>

              </li>
            </ul>
          </div>
        </div>
      </div>
</div>
