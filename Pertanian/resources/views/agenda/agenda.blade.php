@include ('Layouts.main')
@include('Layouts.header')
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

        <div class="blog-items">
            <div class="blog-content">
                <div class="blog-item-box">
                    <div class="row">
                        <div class="container">
                            @if (Auth::User()->level == 'admin')
                                <a class="btn btn-gray border btn-md btn btn-tambah"
                                    href="{{ route('agenda.create') }}">Tambah</a><br><br>
                            @endif
                            @foreach ($agenda as $item)
                                <div class="card mb-3">
                                    <div class="row ">
                                        <div class="col-md-7">
                                            <div class="card-body">
                                                <h5 class="card-title"> kegiatan: {{ $item->kegiatan }}</h5>
                                                <div class="abc card-text">
                                                    <p>Tanggal:
                                                    {!! Str::limit($item->tanggal, 200) !!}</p>
                                                </div>
                                                <div class="abc card-text">
                                                    <p>Pukul:
                                                    {!! Str::limit($item->jam, 200) !!}</p>
                                                </div>
                                                <div class="abc card-text">
                                                    <p>Lokasi:
                                                    {!! Str::limit($item->tempat, 200) !!}</p>
                                                </div>
                                                <div>
                                                    @if (Auth::User()->level == 'admin')
                                                        <a class="btn btn-gray border btn-md btn-edit"
                                                            href="{{ route('agenda.edit', $item->id) }}">Edit</a>
                                                        <form action="{{ route('agenda.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-gray border btn-md btn-hapus">Hapus</button>
                                                        </form>
                                                        <a class="btn btn-gray border btn-md btn-selengkapnya"
                                                            href="{{ route('agenda.show', $item->id) }}">Selengkapnya</a>
                                                    @else
                                                        <a class="btn btn-gray border btn-md btn-selengkapnya"
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
                                    {{$agenda->links("pagination::bootstrap-4")}}
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
