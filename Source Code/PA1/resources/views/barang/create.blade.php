@include('layouts.main')
@include('layouts.header')
<!-- main -->

    <!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li><a href="{{ route('barang.index') }}">Barang</a></li>
            <li>Tambah Barang</li>
        </ol>
        <h2>Barang</h2>

    </div>
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-content"><br><br><br>
                <h2 class="text-center">Tambah Barang</h2>
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input name="nama" type="text"
                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Nama Barang" autocomplete="off">
                        </div>
                    </div>
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input name="jumlah" type="number"
                                class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                placeholder="Jumlah Barang" autocomplete="off">
                        </div>
                    </div>
                    @error('jumlah')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                id="gambar"name="gambar">
                        </div>
                    </div>
                    @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row justify-content-center my-5">
                        <button type="submit" class="px-5 btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include ('layouts.footer')
