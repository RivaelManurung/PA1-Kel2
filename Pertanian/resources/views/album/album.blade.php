@include('Layouts.main')
@include('Layouts.header')
<!-- main -->
<div class="blog-area full-blog blog-standard full-blog grid-colum default-padding">
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

        <div class="blog-items">
            <div class="blog-content">
                <div class="blog-item-box">
                    <div class="row">
                        <div class="container">
                            @if (Auth::User()->level == 'admin')
                                <a class="btn btn-gray border btn-md btn btn-tambah"
                                    href="{{ route('album.create') }}">Tambah</a><br><br>
                            @endif
                            @foreach ($album as $item)
                                <div class="card mb-3">
                                    <div class="row ">
                                        <div class="col-md-5">
                                            <img src="{{ asset('asset/album/' . $item->gambar) }}"
                                                alt="{{ $item->judul }}" width="100%" height="100%">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body">
                                                <div>
                                                    @if (Auth::User()->level == 'admin')
                                                        <a class="btn btn-gray border btn-md btn-edit"
                                                            href="{{ route('album.edit', $item->id) }}">Edit</a>
                                                        <form action="{{ route('album.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-gray border btn-md btn-hapus">Hapus</button>
                                                        </form>
                                                        <a class="btn btn-gray border btn-md btn-selengkapnya"
                                                            href="{{ route('album.show', $item->id) }}">Selengkapnya</a>
                                                    @else
                                                        <a class="btn btn-gray border btn-md btn-selengkapnya"
                                                            href="{{ route('album.show', $item->id) }}">Selengkapnya</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex">
                                <div class="mx-auto">
                                    {{$album->links("pagination::bootstrap-4")}}
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
@include('Layouts.footer')
