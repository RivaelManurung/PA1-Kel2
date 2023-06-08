@include('layouts.main')
@include('layouts.header')
<!-- main -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-content"><br><br><br><br><br>
                <h2 class="text-center">Update Video</h2>
                <form action="{{ route('video.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Video Name</label>
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
                        <label for="video" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="video" name="video">{{ $data->video }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="summernote" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="summernote" rows="15"
                                required>{{ $data->deskripsi }}</textarea>
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
