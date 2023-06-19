@include('layouts.main')
@include('layouts.header')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li><a href="{{ route('agenda.index') }}">Agenda</a></li>
            <li>Edit Agenda</li>
        </ol>
        <h2>Agenda</h2>

    </div>
</section><!-- End Breadcrumbs -->
<!-- main -->
<link href="{{ asset('assets/vendor/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/vendor/summernote/summernote-bs4.min.js') }}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-content">
                <br><br><br><br><br>
                <h2 class="text-center">Perbaharui Informasi Agenda</h2>
                <form action="{{ route('agenda.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                        <div class="col-sm-10">
                            <input name="kegiatan" type="text" class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan" placeholder="Namatopik" autocomplete="off" value="{{ $data->kegiatan }}">
                            @error('kegiatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Hari/Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ $data->tanggal }}">
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jam" class="col-sm-2 col-form-label">Pukul</label>
                        <div class="col-sm-10">
                            <input name="jam" type="time" class="form-control @error('jam') is-invalid @enderror" id="jam" placeholder="Jam" autocomplete="off" value="{{ old('jam', $data->jam) }}">
                            @error('jam')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                        <div class="col-sm-10">
                            <input name="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" placeholder="Tempat" autocomplete="off" value="{{ $data->tempat }}">
                            @error('tempat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center my-5">
                        <button type="submit" class="px-5 btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- end main -->
@include('layouts.footer')
