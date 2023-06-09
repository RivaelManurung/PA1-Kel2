@include ('layouts.main')
@include('layouts.header')
<link href="{{ asset('assets/vendor/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
<script src=" {{ asset('assets/vendor/summernote/summernote-bs4.min.js') }}"></script>


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
<!-- main -->
<div class="container"><br><br><br>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-content">
                <h2 class="text-center">Perbaharui Alat</h2>
                <form action="/barang/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input value="{{ $data->nama }}" name="nama" type="text"
                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Nama Barang" autocomplete="off">
                        </div>
                    </div>
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Barang</label>
                        <div class="col-sm-10">
                            <input value="{{ $data->jumlah }}" name="jumlah" type="number"
                                class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                placeholder="jumlah Barang" autocomplete="off">
                        </div>
                    </div>
                    @error('jumlah')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="gambar" name="gambar">{{ $data->gambar }}
                        </div>
                    </div>
                    <div class="row justify-content-center my-5">
                        <button type="submit" class="px-5 btn btn-primary">Perbaharui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end main -->
@include ('layouts.footer')
