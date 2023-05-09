<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('Beranda') }}"><img src="{{ asset('assets/img/SiTani.png') }}" style="width: 2.5rem"></a>

        <!-- navbar -->
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('Beranda') }}">Beranda</a></li>
                <li><a href="{{ route('edukasi.index') }}">Edukasi</a></li>
                <li><a href="{{ url('barang') }}">Barang</a></li>
                @if (Auth::user()->level == 'admin')
                    <li><a href="{{ url('/pinjam') }}">Peminjaman</a></li>
                @endif
                <li><a href="{{ route('proyekTani.index') }}">Proyek Tani</a></li>
                <li><a href="{{ route('kontak') }}">Kontak</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

        <div class="attr-nav inc-border">
            <ul>
                <li class="nav-item dropdown">
                    @php
                        $notif = \App\Models\Peminjaman::where('user_id',auth()->user()->id)->where('pemberitahuan','!=',NULL)->get(); 
                        $total = \App\Models\Peminjaman::where('user_id',auth()->user()->id)->where('pemberitahuan','!=',NULL)->count(); ;
                    @endphp
                    @if(Auth::User()->level=="user")
                    <a href="{{ url('/dashboard') }}" class="dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell" style="font-size: 2.5rem;"></i>
                        {{-- <span class="badge rounded-pill bg-danger badge-up">1</span> --}}
                        <span class="badge warning">{{ $total }}</span>
                    </a>
                    @endif
                    <style>
                        .dropdown-menu1{
                            width: 300px !important;
                            /* height: 400px !important; */
                        }
                        .ff {
                            font-size: 13px;
                            font-weight: 2px;
                            line-height:1.5;
                        }
                        .anyClass {
                            max-height:300px;
                            overflow-y: scroll;
                        }
                    </style>
                    <div class="dropdown-menu dropdown-menu1 p-0 anyClass" style="width: 200px">
                        <div class="bg-primary text-white p-1">
                            Notifikasi
                        </div>
                        @foreach($notif as $item)
                        <div class="ff p-1">
                            Peminjaman  {{ $item->namaalat }} {{ $item->pemberitahuan }}
                        </div>
                        <hr>
                        @endforeach
                    </div>  
                </li>
                <li class="nav-item dropdown">
                    @if(Auth::User())
                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            <ul class="dropdown-menu cart-list">
                                <li>
                                    {{ auth()->user()->name }}
                                    <h6>Terimakasih Telah Berkunjung</h6>
                                    @if(Auth::User()->level=="user")
                                        <a class="dropdown-item" href="{{ route('history.index') }}"><i
                                            class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> 
                                            <span class="align-middle">History</span>
                                        </a>   
                                    @endif     
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="" style="border-radius: 10%;width:100px;height:35px">Keluar</button> 
                                    </form>
                                </li>
                            </ul>
                        </svg>
                    </a>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/auth') }}">Login</a>
                    </li>
                    @endif
                </li>
            </ul>
        </div>  
        
    </div>
</header>
