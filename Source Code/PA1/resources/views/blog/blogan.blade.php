@include('layouts.main')
@include('layouts.header')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li>Blog Single</li>
            </ol>
            <h2>Blog Single</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

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

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text" value="{{ request()->search }}">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search form -->
                        </div><!-- End sidebar -->
                    </div><!-- End col-lg-4 -->
                </div>

            </div>
    </section><!-- End Blog Single Section -->

</main><!-- End #main -->
@include('layouts.footer')
