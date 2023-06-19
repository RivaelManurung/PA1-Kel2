@include('layouts.main')
@include('layouts.header')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('Beranda') }}">Home</a></li>
                <li><a href="{{ route('video.index') }}">Video</a></li>
                <li>Video-Readmore</li>
            </ol>
            <h2>Video</h2>

        </div>
    </section><!-- End Breadcrumbs -->
<!-- main -->
<div class="blog-area single full-blog full-blog default-padding">
    <div class="container"><br><br>
        <div class="blog-items">
            <div class="row">
                <div class="blog-content wow fadeInUp col-lg-10 offset-lg-1 col-md-12">
                    <div class="item">
                        <div class="blog-item-box">
                            <div class="thumb">
                                <h1 class="judul">{!! $video->judul !!}</h1>
                                @if ($video->video)
                                    <video width="100%" height="350" controls>
                                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <img src="{{ asset('asset/video/' . $video->thumbnail) }}" alt="{{ $video->judul }}"
                                        width="100%" height="350">
                                @endif
                            </div>
                            <div class="info">
                                <p>{!! nl2br($video->deskripsi) !!}</p>
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
