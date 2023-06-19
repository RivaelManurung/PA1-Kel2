@include('layouts.header')

@include('layouts.main')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li> Barang</li>
        </ol>
        <h2>Barang</h2>

    </div>
</section><!-- End Breadcrumbs -->
<!-- main -->
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
    <!-- Tampilkan barang setelah ditambah -->
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
    <div class="container">
        @if (Auth::user()->hasRole('admin'))
            <a class="btn btn-primary btn-md btn-tambah" href="{{ route('barang.create') }}">Tambah</a>
        @endif
        <br><br>
        <div class="row">
            @foreach ($barang as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('asset/gambar/' . $item->gambar) }}" alt="{{ $item->nama }}"
                            class="card-img-top" style="height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">ID: {{ $item->id }} - {{ $item->nama }}</h5>
                            <p class="card-text">Stok: {{ $item->jumlah }}</p>
                            @if (Auth::user()->hasRole('admin'))
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary btn-sm btn-edit"
                                        href="{{ route('barang.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-md btn-hapus">Hapus</button>
                                    </form>
                                </div>
                            @else
                                <a class="btn btn-primary btn-md"
                                    href="{{ route('barang.show', $item->id) }}">Pinjam</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="d-flex justify-content-center">
            {{ $barang->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <!-- end main -->
    @include('layouts.footer')
