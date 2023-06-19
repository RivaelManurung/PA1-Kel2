@include('layouts.main')
@include('layouts.header')
   <!-- ======= Breadcrumbs ======= -->
   <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li><a href="{{ route('video.index') }}">Video</a></li>
            <li>Tambah Video
        </ol>
        <h2>Video</h2>

    </div>
</section><!-- End Breadcrumbs -->
<!-- main -->
    <div class="container">
        <br><br><br><br>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-content">
                    <h2 class="text-center">Tambah Video</h2>
                    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data" id="video-upload-form">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Video" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Video" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="video">Video File</label>
                            <input type="file" class="form-control" id="video" name="video" accept="video/mp4" required>
                        </div>
                        <div id="loading" class="text-center" style="display: none;">
                            <img src="{{ asset('loading.gif') }}" alt="Loading...">
                            <p>Uploading video...</p>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="submit-button">Tambah Video</button>
                        </div>
                    </form>
                    <div id="video-player" class="text-center mt-5" style="display: none;">
                        <iframe id="youtube-iframe" width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#video-upload-form').on('submit', function() {
            $('#submit-button').attr('disabled', 'disabled'); // Disable submit button
            $('#loading').show(); // Show loading element
        });
    });
</script>

    
