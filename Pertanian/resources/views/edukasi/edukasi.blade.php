@include ('Layouts.main')
@include('Layouts.header')
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

        <div class="blog-items">
            <div class="blog-content">
                <div class="blog-item-box">
                    <div class="row">
                        <div class="container">
                            @if (Auth::User()->level == 'admin')
                                <a class="btn btn-gray border btn-md btn btn-tambah"
                                    href="{{ route('edukasi.create') }}">Tambah</a><br><br>
                            @endif
                            @foreach ($edukasi as $item)
                                <div class="card mb-3">
                                    <div class="row ">
                                        <div class="col-md-5">
                                            <img src="{{ asset('asset/gambar/' . $item->gambar) }}"
                                                alt="{{ $item->judul }}" width="100%" height="100%">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->judul }}</h5>
                                                <div class="abc card-text">
                                                    {!! Str::limit($item->deskripsi, 200) !!}
                                                </div>
                                                <div>
                                                    @if (Auth::User()->level == 'admin')
                                                        <a class="btn btn-gray border btn-md btn-edit"
                                                            href="{{ route('edukasi.edit', $item->id) }}">Edit</a>
                                                        <form action="{{ route('edukasi.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-gray border btn-md btn-hapus">Hapus</button>
                                                        </form>
                                                        <a class="btn btn-gray border btn-md btn-selengkapnya"
                                                            href="{{ route('edukasi.show', $item->id) }}">Selengkapnya</a>
                                                    @else
                                                        <a class="btn btn-gray border btn-md btn-selengkapnya"
                                                            href="{{ route('edukasi.show', $item->id) }}">Selengkapnya</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex">
                                <div class="mx-auto">
                                    {{$edukasi->links("pagination::bootstrap-4")}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End #main -->
@include ('Layouts.footer')
