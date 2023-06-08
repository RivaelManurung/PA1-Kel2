@include('layouts.main')
@include('layouts.header')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Album</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item text-white "><a href="{{ route('Beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">Album</li>
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
                                <input type="text" placeholder="Search" class="form-control" name="search"
                                    autocomplete="off" value="{{ request()->search }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::user()->hasRole('admin'))
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary btn-md btn-tambah" href="{{ route('album.create') }}">Tambah</a>
                    </div>
                </div>
            </div>
        @endif

        <div class="container">
            <div class="row">
                @foreach ($album as $item)
                    <div class="col-md-3 p-3">
                        <img src="{{ asset('asset/album/' . $item->gambar) }}" alt="{{ $item->judul }}" width="100%"
                            height="auto" style="border-radius: 5px;">
                        <div style="text-align: center;">
                            @if (Auth::user()->hasRole('admin'))
                                <a class="btn btn-primary btn-md btn-edit"
                                    href="{{ route('album.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('album.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-md btn-hapus">Hapus</button>
                                </form>
                            @endif
                            <a class="btn btn-primary btn-md btn-selengkapnya"
                                href="{{ route('album.show', $item->id) }}">Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            {{ $album->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>


<!-- End #main -->
@include('layouts.footer')
