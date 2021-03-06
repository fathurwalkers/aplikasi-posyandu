<div>
    <footer id="footer1" class="footer1 col-12 fixed-bottom py-2">
        <ul class="nav justify-content-around text-white">
          <li class="nav-item">
            <a class="nav-link active text-white py-0 d-flex flex-column" aria-current="page" href="{{ route('client-home') }}"
              ><i class="fas fa-home my-auto mx-auto"></i>
              <p class="mb-0">Beranda</p>
            </a>
          </li>
          @if ($users->login_level == "admin")
          <li class="nav-item">
            <a class="nav-link active text-white py-0 d-flex flex-column" aria-current="page" href="{{ route('menu-admin') }}"
              ><i class="fas fa-list my-auto mx-auto"></i>
              <p class="mb-0">Data</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link active text-white py-0 d-flex flex-column" aria-current="page" href="{{ route('client-profile') }}"
              ><i class="fas fa-users my-auto mx-auto"></i>
              <p class="mb-0">Data Akun</p>
            </a>
          </li>
        </ul>
      </footer>
</div>
