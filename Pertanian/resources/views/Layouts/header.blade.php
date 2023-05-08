  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center justify-content-between">
          <a href="Beranda"><img src=" {{ asset('assets/img/SiTani.png') }}" style="width : 2.5rem"></a>

          <!-- navbar -->
          <nav id="navbar" class="navbar">
              <ul>
                  <li><a href="{{ route('Beranda') }}">Beranda</a></li>
                  <li><a href="{{ route('edukasi.index') }}">Edukasi</a></li>
                  <li><a href="{{ url('barang') }}">Barang</a></li>
                  @if (Auth::User()->level == 'admin')
                      <li><a href="{{ url('/pinjam') }}">Peminjaman</a>
                  @endif
                  <li><a href="{{ route('proyekTani.index') }}">Proyek Tani</a></li>
                  <li><a href="{{ route('kontak') }}">Kontak</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->

          <!-- Nav Item - User Information -->
          <div class="dropdown">
              <a class="btn btn-light-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                      <small>{{ auth()->user()->level }}</small>
                  </span><br>
                  <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
              </a>

              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
              </ul>
          </div>

  </header><!-- End Header -->
