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
                              @forelse ($notif as $item)
                                  <div class="ff p-1">
                                      Peminjaman {{ $item->namaalat }} {{ $item->pemberitahuan }}
                                      <a href="{{ route('Beranda', $item->id) }}"
                                          class="float-right text-muted text-sm mark-as-read"
                                          onclick="markNotificationAsRead({{ $item->id }})">Mark as read</a>
                                  </div>
                                  <hr>
                              @empty
                                  <div class="ff p-1">
                                      Tidak ada notifikasi
                                  </div>
                              @endforelse
                          </div>
                      </div>

                      @push('scripts')
                          <script>
                              function markNotificationAsRead(notificationId) {
                                  // Kirim permintaan AJAX untuk menandai notifikasi sebagai telah dibaca
                                  $.ajax({
                                      url: "{{ route('Beranda') }}",
                                      method: "POST",
                                      data: {
                                          notificationId: notificationId,
                                          _token: '{{ csrf_token() }}'
                                      },
                                      success: function(response) {
                                          // Kurangi jumlah notifikasi yang belum dibaca
                                          var notificationCountElement = document.getElementById('notificationCount');
                                          var currentCount = parseInt(notificationCountElement.innerText);
                                          if (!isNaN(currentCount) && currentCount > 0) {
                                              notificationCountElement.innerText = currentCount - 1;
                                          }

                                          // Lakukan sesuatu setelah notifikasi ditandai sebagai telah dibaca
                                      }
                                  });
                              }
                              var notificationCountElement = document.getElementById('notificationCount');
                              var currentCount = parseInt(notificationCountElement.innerText);
                              if (!isNaN(currentCount) && currentCount > 0) {
                                  notificationCountElement.innerText = currentCount - 1;
                              }
                          </script>
                      @endpush




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
                  @endif
                  </li>

                  </ul>
              </div>
          </nav>
      </div>
      </div>
  </header><!-- End Header -->
