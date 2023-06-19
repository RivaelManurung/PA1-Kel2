@include('layouts.main')
@include('layouts.header')
<main id="main">


    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('Beranda') }}">Home</a></li>
                <li> ProyekTani</li>
            </ol>
            <h2>ProyekTani</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            @if (Auth::user()->hasRole('admin'))
                <a class="btn btn-primary btn-md btn btn-tambah" href="{{ route('proyekTani.create') }}">Tambah</a><br><br>
            @endif

            <div class="row">
                <div class="col-lg-8 entries">
                    @foreach ($proyekTani as $item)
                        <article class="entry">
                            <div class="entry-img">
                                <img src="{{ asset('asset/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                    width="100%" height="234">
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
                                        <a href="{{ route('proyekTani.show', $item->id) }}" class="btn">Read More</a>
                                        <a href="{{ route('proyekTani.edit', $item->id) }}" class="btn">Edit</a>
                                        <form action="{{ route('proyekTani.destroy', $item->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-red">Hapus</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="read-more">
                                        <a href="{{ route('proyekTani.show', $item->id) }}" class="btn btn-primary">Read
                                            More</a>
                                    </div>
                                @endif

                            </div>

                        </article><!-- End blog entry -->
                    @endforeach
                    <div class="d-flex">
                        <div class="mx-auto">
                            {{ $proyekTani->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div><!-- End col-lg-8 entries -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text" placeholder="Search" class="form-control" name="search"
                                    autocomplete="off" value="{{ request()->search }}">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search form -->
                    </div><!-- End sidebar -->
                </div><!-- End col-lg-4 -->
            </div><!-- End row -->
        </div><!-- End container -->
    </section><!-- End Blog Section -->

</main><!-- End #main -->
@include('layouts.footer')
