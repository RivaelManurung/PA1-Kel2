@include('layouts.main')
@include('layouts.header')
<!-- main -->
<br><br>
<div class="blog-area single full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <div class="blog-content wow fadeInUp col-lg-10 offset-lg-1 col-md-12">
                    <div class="item">
                        <div class="blog-item-box">
                            <div class="info">
                                <h3>kegiatan: {{ $agenda->kegiatan }}</h3>
                                <p class="item-details">
                                    <span class="item-label">Pukul:</span>
                                    {!! $agenda->jam !!}
                                </p>
                                <p class="item-details">
                                    <span class="item-label">Tanggal:</span>
                                    {!! $agenda->tanggal !!}
                                </p>
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
