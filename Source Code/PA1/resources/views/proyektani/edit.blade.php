@include('layouts.main')
@include('layouts.header')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li><a href="{{ route('proyektani.index') }}">ProyekTani</a></li>
            <li> Edit ProyekTani</li>
        </ol>
        <h2>ProyekTani</h2>

    </div>
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-content">
                <h2 class="text-center">Perbaharui Informasi proyek Tani</h2>
                <form action="{{ route('proyekTani.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Nama Topik</label>
                        <div class="col-sm-10">
                            <input value="{{ $data->judul }}" name="judul" type="text"
                                class="form-control @error('judul') is-invalid @enderror" id="judul"
                                placeholder="Namatopik" autocomplete="off">
                        </div>
                    </div>
                    @error('judul')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="gambar"name="gambar">{{ $data->gambar }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="summernote" class="col-sm-2 col-form-label">Narasi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="summernote"
                                placeholder="Narasi" rows="15">{!! $data->deskripsi !!}</textarea>
                        </div>
                    </div>
                    @error('deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row justify-content-center my-5">
                        <button type="submit" class="px-5 btn btn-primary">Perbaharui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
