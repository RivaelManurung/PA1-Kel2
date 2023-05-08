@include('Layouts.main')
@include('Layouts.header')
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
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
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
                                <a class="btn circle btn-gray border btn-md btn btn-tambah"
                                    href="{{ route('proyekTani.create') }}">Tambah</a><br><br>
                            @endif
                            @foreach ($proyekTani as $item)
                                <div class="card mb-3">
                                    <div class="row ">
                                        <div class="col-md-5">
                                            <img src="{{ asset('asset/gambar/' . $item->gambar) }}"
                                                alt="{{ $item->judul }}" width="100%" height="234">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->judul }}</h5>
                                                <p class="abc card-text">
                                                    {!! Str::limit($item->deskripsi, 200) !!}
                                                </p>
                                                @if (Auth::User()->level == 'admin')
                                                    <a class="btn circle btn-gray border btn-md btn-edit"
                                                        href="{{ route('proyekTani.edit', $item->id) }}">Edit</a>
                                                    <form action="{{ route('proyekTani.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn circle btn-gray border btn-md btn-hapus">Hapus</button>
                                                    </form>
                                                    <a class="btn circle btn-gray border btn-md btn-selengkapnya"
                                                        href="{{ route('proyekTani.show', $item->id) }}">Selengkapnya</a>
                                                @else
                                                    <a class="btn circle btn-gray border btn-md btn-selengkapnya"
                                                        href="{{ route('proyekTani.show', $item->id) }}">Selengkapnya</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex">
                                <div class="mx-auto">
                                    {{$proyekTani->links("pagination::bootstrap-4")}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Layouts.footer')
