<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('tampilan') }}/style/home.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>@yield('title')</title>

    @stack('css')
  </head>
  <body id="body">
        <!-- header -->
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
        <!-- end of header -->
        @yield('main-content')

    <!-- footer -->
    <x-client-menu-footer />

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('tampilan') }}/js/index.js"></script>

    @stack('js')
  </body>
</html>
