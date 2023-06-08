@include('layouts.main')
@include('layouts.header')
<!-- main -->
<br><br>

<div class="blog-area single full-blog full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <div class="blog-content wow fadeInUp col-lg-10 offset-lg-1 col-md-12">
                    <div class="item">
                        <div class="blog-item-box">
                            <div class="thumb"><br>
                                <h1 class="judul">{!! $album->judul !!}</h1>
                                <img src="{{ asset('asset/album/' . $album->gambar) }}" alt="{{ $album->judul }}"
                                    width="100%" height="350">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->
@include('layouts.footer')
