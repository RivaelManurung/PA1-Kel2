@include('Layouts.main')
@include('Layouts.header')
<!-- main -->
<div class="container">
    <br><br><br><br>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-content">
                <h2 class="text-center">Tambah Album</h2>
                <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul gambar</label>
                        <div class="col-sm-10">
                            <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Namatopik" autocomplete="off">
                            @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" id="gambar" name="gambar">  
                            @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
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
@include('Layouts.footer')