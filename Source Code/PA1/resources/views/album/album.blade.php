@include('layouts.main')
@include('layouts.header')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li> Album</li>
        </ol>
        <h2>Album</h2>

    </div>
</section><!-- End Breadcrumbs -->
<div class="container">
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
        <!-- Tampilkan album setelah ditambah -->
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
