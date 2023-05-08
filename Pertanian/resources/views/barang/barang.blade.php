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
                                <a class="btn circle btn-gray border btn-md btn-tambah"
                                    href="{{ route('barang.create') }}">Tambah</a><br><br>
                            @endif
                            @foreach ($barang as $item)
                                <div class="card mb-3">
                                    <div class="row ">
                                        <div class="col-md-5">
                                            <img src="{{ asset('asset/gambar/' . $item->gambar) }}"
                                                alt="{{ $item->nama }}" width="100%" height="250px">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Nama Barang:</p>
                                                    <h5 class="card-title">{{ $item->nama }}</h5>
                                                </div>
                                                <br>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Stok:</p>
                                                    <h5 class="card-title">{{ $item->jumlah }}</h5>
                                                </div>
                                                @if (Auth::User()->level == 'admin')
                                                    <a class="btn circle btn-gray border btn-md btn-edit"
                                                        href="{{ route('barang.edit', $item->id) }}">Edit</a>
                                                    <form action="{{ route('barang.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn circle btn-gray border btn-md btn-hapus">Hapus</button>
                                                    </form>
                                                @else
                                                    <a class="btn circle btn-gray border btn-md"
                                                        href="{{ route('barang.show', $item->id) }}">Pinjam</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex">
                                <div class="mx-auto">
                                    {{$barang->links("pagination::bootstrap-4")}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main -->
        @include ('Layouts.footer')
