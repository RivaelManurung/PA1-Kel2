@include('layouts.main')
@include('layouts.header')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('Beranda') }}">Home</a></li>
                <li>Video</a></li>
            </ol>
            <h2>Video</h2>

        </div>
    </section><!-- End Breadcrumbs -->
<!-- main -->
<div class="blog-area full-blog blog-standard full-blog grid-colum default-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="my-5">
                <div class="error-box">
                    <div class="search">
                        <div class="input-group">
                            <form action="#">
                                <input type="text" placeholder="Search" class="form-control" name="search"
                                    autocomplete="off" value="{{ request()->search }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tampilkan video setelah ditambah -->
        @if (session('success'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="container">
            @if (Auth::user()->hasRole('admin'))
                <a class="btn btn-primary btn-md btn btn-tambah" href="{{ route('video.create') }}">Tambah</a><br><br>
            @endif
            @foreach ($video as $item)
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-5">
                            @if ($item->video)
                                <video src="{{ asset('storage/' . $item->video) }}" alt="{{ $item->judul }}"
                                    width="100%" height="100%" controls></video>
                            @elseif ($item->link)
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{ $item->link }}"
                                        allowfullscreen></iframe>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <div class="abc card-text">
                                    {!! Str::limit($item->deskripsi, 200) !!}
                                </div>
                                <div>
                                    @if (Auth::user()->hasRole('admin'))
                                        <a class="btn btn-primary btn-md btn-edit"
                                            href="{{ route('video.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('video.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-md btn-hapus">Hapus</button>
                                        </form>
                                        <a class="btn btn-primary btn-md btn-selengkapnya"
                                            href="{{ route('video.show', $item->id) }}">Selengkapnya</a>
                                    @else
                                        <a class="btn btn-primary btn-md btn-selengkapnya"
                                            href="{{ route('video.show', $item->id) }}">Selengkapnya</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
</div>
<div class="d-flex justify-content-center">
    {{ $video->links('pagination::bootstrap-4') }}
</div>

@include('layouts.footer')
