  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
      <div class="container  d-flex align-items-center">

          <h1 class="logo me-auto"><a href={{ route('Beranda') }}>SiTani</a></h1>

          <nav id="navbar" class="navbar">
              <ul>
                  <li><a class="nav-link scrollto " href="{{ route('Beranda') }}">Beranda</a></li>
                  <li><a class="nav-link scrollto" href="{{ route('edukasi.index') }}">Edukasi</a></li>
                  <li><a class="nav-link scrollto" href="{{ url('barang') }}">Barang</a></li>
                  @if (Auth::user()->level == 'admin')
                      <li><a class="nav-link scrollto" href="{{ url('/pinjam') }}">Peminjaman</a></li>
                  @endif
                  <li><a class="nav-link scrollto" href="{{ route('agenda.index') }}">Agenda</a></li>
                  <li><a class="nav-link scrollto" href="{{ route('album.index') }}">Album</a></li>
                  <li><a class="nav-link scrollto" href="{{ route('proyekTani.index') }}">Proyek Tani</a></li>
                  <li><a class="nav-link scrollto" href="{{ route('kontak') }}">Kontak</a></li>
              </ul>

              <!-- .navbar -->

              <!-- .navbar -->
              <div>
                  <ul>
                    <div class="nav-item dropdown">
                        @php
                            // Mengambil data peminjaman yang terkait dengan pengguna yang sedang login
                            $notif = \App\Models\Peminjaman::where('user_id', auth()->user()->id)
                                ->where('pemberitahuan', '!=', null)
                                ->get();
                    
                            // Menghitung jumlah total peminjaman yang memiliki pemberitahuan
                            $total = \App\Models\Peminjaman::where('user_id', auth()->user()->id)
                                ->where('pemberitahuan', '!=', null)
                                ->count();
                        @endphp
                    
                        @if (Auth::user()->level == 'user')
                            <a href="{{ url('/dashboard') }}" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell" style="font-size: 2.5rem;"></i>
                                <span class="badge warning" id="notificationCount">{{ $total }}</span>
                            </a>
                        @endif
                    
                        <div class="dropdown-menu dropdown-menu1 p-0 anyClass" style="width: 200px">
                            <div class="bg-primary text-white p-1">
                                Notifikasi
                            </div>
                            @foreach ($notif as $item)
                                <div class="ff p-1">
                                    Peminjaman {{ $item->namaalat }} {{ $item->pemberitahuan }}
                                    <a href="{{ route('Beranda', $item->id) }}" class="float-right text-muted text-sm mark-as-read">Mark as read</a>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    
                    

                      <li class="nav-item dropdown">
                          @if (Auth::user())
                              <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40"
                                      fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-1 2a1 1 0 1 0-2 0 1 1 0 0 0 2 0z" />
                                      <path fill-rule="evenodd"
                                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                  </svg>
                              </a>
                              <ul class="dropdown-menu cart-list" aria-labelledby="navbarDropdown">
                                  <li>
                                      {{ auth()->user()->name }}
                                      <h6>Terimakasih Telah Berkunjung</h6>
                                      @if (Auth::user()->level == 'user')
                                          <a class="dropdown-item" href="{{ route('history.index') }}">
                                              <i
                                                  class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                                              <span class="align-middle">History</span>
                                          </a>
                                      @endif
                                  <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                      </li>
                  </ul>
              @else
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('/auth') }}">Login</a>
                  </li>
                  @endif
                  </li>

                  </ul>
              </div>
          </nav>
      </div>
  </header><!-- End Header -->
  <script>
    // Function to update the notification count
    function updateNotificationCount(count) {
        var notificationCount = document.getElementById('notificationCount');
        notificationCount.textContent = count;
    }

    // Send an AJAX request to mark a notification as read
    function markNotificationAsRead(id) {
        axios.get('Beranda' + id)
            .then(function(response) {
                // Update the notification count in the UI
                var newTotal = response.data.total;
                updateNotificationCount(newTotal);
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    // Add event listeners to the "Mark as read" links
    var markAsReadLinks = document.getElementsByClassName('mark-as-read');
    for (var i = 0; i < markAsReadLinks.length; i++) {
        markAsReadLinks[i].addEventListener('click', function(event) {
            event.preventDefault();
            var notificationId = this.getAttribute('href').split('/').pop();
            markNotificationAsRead(notificationId);
        });
    }
</script>