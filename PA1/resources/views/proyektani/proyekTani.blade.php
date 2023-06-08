@include('layouts.main')
@include('layouts.header')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">ProyekTani</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item text-white"><a href="{{ route('Beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">ProyekTani</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<div class="container">
    <div class="row justify-content-center">
        <div class="my-5"><br><br>
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


    <div class="container">
        @if (Auth::user()->hasRole('admin'))
            <a class="btn btn-primary btn-md btn btn-tambah" href="{{ route('proyekTani.create') }}">Tambah</a><br><br>
        @endif
        @foreach ($proyekTani as $item)
            <div class="card mb-3">
                <div class="row ">
                    <div class="col-md-5">
                        <img src="{{ asset('asset/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}" width="100%"
                            height="234">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="abc card-text">
                                {!! Str::limit($item->deskripsi, 200) !!}
                            </p>
                            @if (Auth::user()->hasRole('admin'))
                                <a class="btn btn-primary btn-md btn-edit"
                                    href="{{ route('proyekTani.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('proyekTani.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-md btn-hapus">Hapus</button>
                                </form>
                                <a class="btn btn-primary btn-md btn-selengkapnya"
                                    href="{{ route('proyekTani.show', $item->id) }}">Selengkapnya</a>
                            @else
                                <a class="btn btn-primary btn-md btn-selengkapnya"
                                    href="{{ route('proyekTani.show', $item->id) }}">Selengkapnya</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex">
            <div class="mx-auto">
                {{ $proyekTani->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
