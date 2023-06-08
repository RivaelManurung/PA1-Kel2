@extends('layouts.main')
@include('layouts.header')

<div class="blog-area single full-blog full-blog default-padding">
    <div class="container"><br><br>
        <div class="blog-items">
            <div class="row">
                <div class="blog-content wow fadeInUp col-lg-10 offset-lg-1 col-md-12">
                    <div class="item">
                        <div class="blog-item-box">
                            <div class="thumb">
                                <img src="{{ asset('asset/gambar/' . $proyekTani->gambar) }}"
                                    alt="{{ $proyekTani->judul }}" width="100%" height="350">
                            </div>
                            <div class="info">
                                <h3>{{ $proyekTani->judul }}</h3>
                                <p>{!! $proyekTani->deskripsi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
