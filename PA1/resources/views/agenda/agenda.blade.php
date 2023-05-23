@include ('layouts.main')
@include('layouts.header')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Agenda</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item text-white"><a href="{{ route('Beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">Agenda</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<!-- main -->
<div class="blog-area full-blog blog-standard full-blog grid-colum default-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="my-5"><br><br><br>
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
            @if (Auth::User()->level == 'admin')
                <a class="btn btn-primary btn-md btn btn-tambah" href="{{ route('agenda.create') }}">Tambah</a>
            @endif
            @foreach ($agenda as $item)
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">Kegiatan: {{ $item->kegiatan }}</h5>
                                <div class="card-text">
                                    <p>Tanggal: {{ $item->tanggal }}</p>
                                    <p>Pukul: {{ $item->jam }}</p>
                                    <p>Lokasi: {{ $item->tempat }}</p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    @if (Auth::User()->level == 'admin')
                                        <a class="btn btn-primary btn-md btn-edit"
                                            href="{{ route('agenda.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('agenda.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-md btn-hapus">Hapus</button>
                                        </form>
                                        <a class="btn btn-primary btn-md btn-selengkapnya"
                                            href="{{ route('agenda.show', $item->id) }}">Selengkapnya</a>
                                    @else
                                        <a class="btn btn-primary btn-md btn-selengkapnya"
                                            href="{{ route('agenda.show', $item->id) }}">Selengkapnya</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex">
                <div class="mx-auto">
                    {{ $agenda->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>
</div>


<!-- End #main -->
@include ('layouts.footer')
