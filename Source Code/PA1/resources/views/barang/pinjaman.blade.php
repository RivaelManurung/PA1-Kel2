extends('layouts.main')
@include('layouts.header')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li><a href="{{ route('barang.index') }}">Barang</a></li>
            <li>Pinjam Barang</li>
        </ol>
        <h2>Barang</h2>
    </div>
</section><!-- End Breadcrumbs -->
<!-- main -->
<br><br><br>
<div class="contact-area default-padding">
    @if (session()->has('success'))
        <div class="row justify-content-center my-2 container-full">
            <div class="alert alert-danger text-center col-lg-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container-full">
        <div class="contact-items">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="form-content">
                        <h2 class="text-center">Pinjam Disini</h2>
                        <form action="{{ route('pinjam.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="namaalat">Nama Alat</label>
                                        <input class="form-control" id="namaalat" name="namaalat"
                                            placeholder="Nama Alat" type="text" value="{{ $barang->nama }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Alat yang Dipinjam</label>
                                        <input class="form-control @error('jumlah') is-invalid  @enderror"
                                            id="jumlah" name="jumlah" placeholder="Jumlah Alat" type="number"
                                            autocomplete="off">
                                        @error('jumlah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_alat">ID Alat</label>
                                <input class="form-control" id="id_alat" name="id_alat" placeholder="ID Alat"
                                    type="text" value="{{ $barang->id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="rencana_peminjaman">Rencana Peminjaman Barang</label>
                                <input
                                    class="form-control datepicker @error('tanggal_peminjaman') is-invalid  @enderror"
                                    id="rencana_peminjaman" name="tanggal_peminjaman" placeholder="Rencana Peminjaman"
                                    type="date" autocomplete="off">
                                @error('tanggal_peminjaman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rencana_pemulangan">Rencana Pemulangan Barang</label>
                                <input
                                    class="form-control datepicker @error('tanggal_pemulangan') is-invalid  @enderror"
                                    id="rencana_pemulangan" name="tanggal_pemulangan" placeholder="Rencana Pemulangan"
                                    type="date" autocomplete="off">
                                @error('tanggal_pemulangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input class="form-control" id="stok" name="stok" placeholder="Stok"
                                    type="text" value="{{ $barang->jumlah }}" readonly>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="px-5 btn btn-primary">Konfirmasi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@extends('layouts.main')
@include('layouts.header')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li><a href="{{ route('barang.index') }}">Barang</a></li>
            <li>Pinjam Barang</li>
        </ol>
        <h2>Barang</h2>
bash
Copy code
</div>
</section><!-- End Breadcrumbs -->
<!-- main -->
<br><br><br>
<div class="contact-area default-padding">
    @if (session()->has('success'))
        <div class="row justify-content-center my-2 container-full">
            <div class="alert alert-danger text-center col-lg-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container-full">
        <div class="contact-items">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="form-content">
                        <h2 class="text-center">Pinjam Disini</h2>
                        <form action="{{ route('pinjam.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="namaalat">Nama Alat</label>
                                        <input class="form-control" id="namaalat" name="namaalat"
                                            placeholder="Nama Alat" type="text" value="{{ $barang->nama }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Alat yang Dipinjam</label>
                                        <input class="form-control @error('jumlah') is-invalid  @enderror"
                                            id="jumlah" name="jumlah" placeholder="Jumlah Alat" type="number"
                                            autocomplete="off">
                                        @error('jumlah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_alat">ID Alat</label>
                                <input class="form-control" id="id_alat" name="id_alat" placeholder="ID Alat"
                                    type="text" value="{{ $barang->id }}" readonly>
                            </div>
php
Copy code
                        <div class="form-group">
                            <label for="rencana_peminjaman">Rencana Peminjaman Barang</label>
                            <input
                                class="form-control datepicker @error('tanggal_peminjaman') is-invalid  @enderror"
                                id="rencana_peminjaman" name="tanggal_peminjaman" placeholder="Rencana Peminjaman"
                                type="date" autocomplete="off">
                            @error('tanggal_peminjaman')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="rencana_pemulangan">Rencana Pemulangan Barang</label>
                            <input
                                class="form-control datepicker @error('tanggal_pemulangan') is-invalid  @enderror"
                                id="rencana_pemulangan" name="tanggal_pemulangan" placeholder="Rencana Pemulangan"
                                type="date" autocomplete="off">
                            @error('tanggal_pemulangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input class="form-control" id="stok" name="stok" placeholder="Stok"
                                type="text" value="{{ $barang->jumlah }}" readonly>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="px-5 btn btn-primary">Konfirmasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        var today = new Date();
        var maxDate = new Date();
        maxDate.setDate(today.getDate() + 7);
        $('.datepicker').datepicker({
        minDate: today,
        maxDate: maxDate,
        startDate: today
    });
});

// Mendapatkan nilai input tanggal peminjaman
var tanggalPeminjaman = document.getElementById('rencana_peminjaman');

// Menambahkan event listener pada input tanggal pemulangan
document.getElementById('rencana_pemulangan').addEventListener('change', function() {
    var tanggalPemulangan = this.value;
    if (tanggalPeminjaman.value !== '' && tanggalPemulangan !== '') {
        if (tanggalPemulangan < tanggalPeminjaman.value) {
            alert('Tanggal pemulangan tidak boleh sebelum tanggal peminjaman.');
            this.value = '';
        }
    }
});

// Validasi stok
var jumlahInput = document.getElementById('jumlah');
var stokInput = document.getElementById('stok');

jumlahInput.addEventListener('change', function() {
    var jumlah = parseInt(jumlahInput.value);
    var stok = parseInt(stokInput.value);

    if (jumlah > stok) {
        alert('Jumlah peminjaman melebihi stok yang tersedia.');
        jumlahInput.value = '';
    }
});

// Menonaktifkan tombol submit jika jumlah input adalah 0
document.getElementById('jumlah').addEventListener('input', function() {
    var jumlah = parseInt(this.value);
    var submitButton = document.querySelector('button[type="submit"]');

    if (jumlah === 0) {
        submitButton.disabled = true;
    } else {
        submitButton.disabled = false;
    }
});
</script>
<!-- end main -->
@include('layouts.footer')