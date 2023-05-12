@include('Layouts.main')
@include('Layouts.header')
<!-- main -->
<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-content">
                  <br><br><br><br>
                    <h2 class="text-center">Tambah Informasi agenda</h2>
                    <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                            <div class="col-sm-10">
                                <input name="kegiatan" type="text" class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan" placeholder="Namatopik" autocomplete="off">
                            </div>
                        </div>
                        @error('kegiatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Hari/Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="Date"name="Date">  
                            </div>                                                         
                        </div>
                        @error('tanggal')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="summernote" class="col-sm-2 col-form-label">Pukul</label>
                            <div class="col-sm-10">
                                <input name="judul" type="time" class="form-control @error('jam') is-invalid @enderror" id="jam" placeholder="jam" autocomplete="off">
                            </div>
                        </div>
                        @error('jam')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">tempat</label>
                            <div class="col-sm-10">
                                <input name="jam" type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" placeholder="tempat" autocomplete="off">
                            </div>
                        </div>
                        @error('tempat')
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
    <!-- end main -->
    @include ('Layouts.footer')
