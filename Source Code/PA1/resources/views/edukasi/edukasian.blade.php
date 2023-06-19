@include('layouts.main')
@include('layouts.header')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('Beranda') }}">Home</a></li>
                <li><a href="{{ route('edukasi.index') }}">Edukasi</a></li>
                <li>Edukasi-Readmore</li>
            </ol>
            <h2>Edukasi</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Edukasi Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class=" entries">

                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="{{ asset('asset/gambar/' . $edukasi->gambar) }}" alt="{{ $edukasi->judul }}"
                                width="100%" height="350">
                        </div>
                        <div class="info">
                            <h2 class="entry-title">
                                {{ $edukasi->judul }}
                            </h2>
                            <p>
                                {!! nl2br($edukasi->deskripsi) !!}
                            </p>
                        </div>
                    </article><!-- End blog entry -->
                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Edukasi Section -->

</main><!-- End #main -->
@include('layouts.footer')
