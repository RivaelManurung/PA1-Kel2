@include('layouts.main')
@include('layouts.header')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li><a href="{{ route('agenda.index') }}">Agenda</a></li>
            <li> Agenda- Readmore</li>
        </ol>
        <h2>Agenda</h2>

    </div>
</section><!-- End Breadcrumbs -->
<!-- main -->
<!-- Div utama untuk area blog -->
<div class="blog-area single full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <!-- Div untuk konten blog -->
                <div class="blog-content wow fadeInUp col-lg-10 offset-lg-1 col-md-12">
                    <div class="item">
                        <!-- Kotak item blog -->
                        <div class="blog-item-box">
                            <div class="info">
                                <!-- Judul kegiatan -->
                                <h3>Kegiatan: {{ $agenda->kegiatan }}</h3>
                                <!-- Detail jam -->
                                <p class="item-details">
                                    <span class="item-label">Pukul:</span>
                                    {!! $agenda->jam !!}
                                </p>
                                <!-- Detail tanggal -->
                                <p class="item-details">
                                    <span class="item-label">Tanggal:</span>
                                    {!! $agenda->tanggal !!}
                                </p>
                                <!-- Detail lokasi -->
                                <p class="item-details">
                                    <span class="item-label">Lokasi:</span>
                                    {!! $agenda->tempat !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end main -->
@include ('layouts.footer')
