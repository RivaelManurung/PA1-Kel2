
@include ('layouts.main')
@include('layouts.header')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">Tempo</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="active" href="blog.html">Blog</a></li>
                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Blog</li>
                </ol>
                <h2>Blog</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                @if (Auth::user()->hasRole('admin'))
                    <a class="btn btn-primary btn-md btn btn-tambah"
                        href="{{ route('edukasi.create') }}">Tambah</a><br><br>
                @endif
                @foreach ($edukasi as $item)
                    <div class="row">

                        <div class="col-lg-8 entries">

                            <article class="entry">

                                <div class="entry-img">
                                    <img src="{{ asset('asset/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        width="100%" height="100%">
                                </div>

                                <h2 class="entry-title">
                                    {{ $item->judul }}
                                </h2>


                                <div class="entry-content">
                                    <p>
                                        {!! Str::limit($item->deskripsi, 200) !!}
                                    </p>
                                    @if (Auth::user()->hasRole('admin'))
                                        <div class="read-more">
                                            <a class="btn btn-primary" href="{{ route('edukasi.edit', $item->id) }}">Edit</a>
                                            <form action="{{ route('edukasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="read-more">
                                            <a class="btn btn-primary" href="{{ route('edukasi.show', $item->id) }}">Read More</a>
                                        </div>
                                    @endif
                                </div>
                                
                @endforeach
                <div class="d-flex">
                    <div class="mx-auto">
                        {{ $edukasi->links('pagination::bootstrap-4') }}
                    </div>
                </div>

                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->

            <div class="col-lg-4">

                <div class="sidebar">

                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form">
                        <form action="">
                            <input type="text">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!-- End sidebar search formn-->


                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

            </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
    @include('layouts.footer')
