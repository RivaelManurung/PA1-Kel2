@include('layouts.main')
@include('layouts.header')
<!-- main -->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li><a href="{{ route('edukasi.index') }}">Album</a></li>
            <li>Edit Album</li>
        </ol>
        <h2>Album</h2>

    </div>
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-content"><br><br><br><br><br>
                <h2 class="text-center">Update Album</h2>
                <form action="{{ route('album.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Gallery Name</label>
                        <div class="col-sm-10">
                            <input value="{{ $data->judul }}" name="judul" type="text"
                                class="form-control @error('judul') is-invalid @enderror" id="judul"
                                placeholder="Nama Galeri" autocomplete="off">
                        </div>
                    </div>
                    @error('judul')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="gambar" name="gambar">{{ $data->gambar }}
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
