@include('layouts.main') <!-- Sertakan layout 'main' -->

@include('layouts.header') <!-- Sertakan layout 'header' -->
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li><a href="{{ route('agenda.index') }}">Agenda</a></li>
            <li>Tambah Agenda</li>
        </ol>
        <h2>Agenda</h2>

    </div>
</section><!-- End Breadcrumbs -->
<!-- main -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-content">
                <br><br><br><br>
                <h2 class="text-center">Tambah Informasi Agenda</h2>
                <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Perlindungan Cross-Site Request Forgery -->
                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                        <div class="col-sm-10">
                            <input name="kegiatan" type="text"
                                class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan"
                                placeholder="Nama topik" autocomplete="off">
                            @error('kegiatan')
                                <div class="invalid-feedback">{{ $message }}</div> <!-- Tampilkan pesan kesalahan jika bidang 'kegiatan' memiliki kesalahan -->
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label">Hari/Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal">
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div> <!-- Tampilkan pesan kesalahan jika bidang 'tanggal' memiliki kesalahan -->
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jam" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col-sm-10">
                            <input name="jam" type="time" class="form-control @error('jam') is-invalid @enderror"
                                id="jam" placeholder="Jam" autocomplete="off">
                            @error('jam')
                                <div class="invalid-feedback">{{ $message }}</div> <!-- Tampilkan pesan kesalahan jika bidang 'jam' memiliki kesalahan -->
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                        <div class="col-sm-10">
                            <input name="tempat" type="text"
                                class="form-control @error('tempat') is-invalid @enderror" id="tempat"
                                placeholder="Tempat" autocomplete="off">
                            @error('tempat')
                                <div class="invalid-feedback">{{ $message }}</div> <!-- Tampilkan pesan kesalahan jika bidang 'tempat' memiliki kesalahan -->
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center my-5">
                        <button type="submit" class="px-5 btn btn-primary">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- end main -->

@include('layouts.footer') <!-- Sertakan layout 'footer' -->
