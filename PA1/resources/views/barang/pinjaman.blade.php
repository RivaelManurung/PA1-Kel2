@include('layouts.main')
@include('layouts.header')
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
                <div class="col-lg-5">
                    <div class="form-content">
                        <h2 class="text-center">Pinjam Disini</h2>

                        <form action="{{ route('pinjam.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <p>Nama Alat</p>
                                        <label for="nik"></label>
                                        <input class="form-control" id="nama" name="namaalat"
                                               placeholder="nama alat" type="text"
                                               value="{{ $barang->nama }}"readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">

                                    <div class="form-floating">
                                        <p>Pinjam Alat</p>
                                        <label for="Stok" class="form-label"></label>
                                        <input class="form-control @error('jumlah') is-invalid  @enderror"
                                               id="nama" name="jumlah" placeholder="Stok" type="number"
                                               autocomplete="off">
                                        @error('jumlah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <p>Rencana Peminjaman Barang</p>
                                        <label for="rencana peminjaman"></label>
                                        <input
                                            class="form-control datepicker @error('tanggal_peminjaman') is-invalid  @enderror"
                                            id="rencana peminjaman" name="tanggal_peminjaman" 
                                            placeholder="rencana peminjaman" type="date" autocomplete="off">
                                        @error('tanggal_peminjaman')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <p>Rencana Pemulangan Barang</p>
                                        <label for="rencana pemulangan"></label>
                                        <input
                                            class="form-control datepicker @error('tanggal_pemulangan') is-invalid  @enderror"
                                            id="rencana pemulangan" name="tanggal_pemulangan"
                                            placeholder="rencana pemulangan" type="date" autocomplete="off">
                                        @error('tanggal_pemulangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
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
    $('.datepicker').datepicker({

        startDate: new Date()

    });
</script>
<!-- end main -->
@include('layouts.footer')
