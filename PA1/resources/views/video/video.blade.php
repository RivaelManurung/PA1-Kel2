@include('layouts.main')
@include('layouts.header')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Edukasi</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item text-white "><a href="{{ route('Beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">video</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<!-- main -->
<div class="blog-area full-blog blog-standard full-blog grid-colum default-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="my-5">
                <div class="error-box">
                    <div class="search">
                        <div class="input-group">
                            <form action="#">
                                <input type="text" placeholder="Search" class="form-control" name="search" autocomplete="off" value="{{ request()->search }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @if (Auth::user()->hasRole('admin'))
                <a class="btn btn-primary btn-md btn btn-tambah" href="{{ route('video.create') }}">Tambah</a><br><br>
            @endif
            @foreach ($video as $item)
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-5">
                            @if ($item->video)
                                <video src="{{ asset('storage/' . $item->video) }}" alt="{{ $item->judul }}" width="100%" height="100%" controls></video>
                            @elseif ($item->link)
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{ $item->link }}" allowfullscreen></iframe>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <div class="abc card-text">
                                    {!! Str::limit($item->deskripsi, 200) !!}
                                </div>
                                <div>
                                    @if (Auth::user()->hasRole('admin'))
                                        <a class="btn btn-primary btn-md btn-edit" href="{{ route('video.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('video.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-md btn-hapus">Hapus</button>
                                        </form>
                                        <a class="btn btn-primary btn-md btn-selengkapnya" href="{{ route('video.show', $item->id) }}">Selengkapnya</a>
                                    @else
                                        <a class="btn btn-primary btn-md btn-selengkapnya" href="{{ route('video.show', $item->id) }}">Selengkapnya</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Tampilkan video setelah ditambah -->
        @if (session('success'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

        

        {{-- <div class="container">
            <div class="row">
                @foreach ($video as $item)
                    <div class="col-md-3 p-3">
                        <img src="{{ asset('assets/video/' . $item->video) }}" alt="{{ $item->judul }}"
                            width="100%" height="auto" style="border-radius: 5px;">
                        <div style="text-align: center;">
                            @if (Auth::user()->hasRole('admin'))
                                <a class="btn btn-primary btn-md btn-edit"
                                    href="{{ route('video.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('video.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-md btn-hapus">Hapus</button>
                                </form>
                            @endif
                            <a class="btn btn-primary btn-md btn-selengkapnya"
                                href="{{ route('video.show', $item->id) }}">Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}

        <div class="d-flex justify-content-center">
            {{ $video->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@include('layouts.footer')
