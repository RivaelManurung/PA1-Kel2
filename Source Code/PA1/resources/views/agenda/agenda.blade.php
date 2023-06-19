@include('layouts.main')
<!-- Memasukkan tampilan utama -->

@include('layouts.header')
<link href="{{asset('assets/img/favicon.ico')}} rel="icon">

<!-- Memasukkan tampilan header -->
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li> Agenda</li>
        </ol>
        <h2>Agenda</h2>

    </div>
</section><!-- End Breadcrumbs -->

<!-- main -->
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
        <!-- Tampilkan agenda setelah ditambah -->
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
                <a class="btn btn-primary btn-md btn btn-tambah" href="{{ route('agenda.create') }}">Tambah</a>
                <!-- Tombol "Tambah" hanya ditampilkan jika pengguna yang login memiliki peran (role) sebagai admin -->
            @endif
            <br><br>
            <div class="row">
                @foreach ($agenda as $item)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Kegiatan: {{ $item->kegiatan }}</h5>
                                <div class="card-text">
                                    <p>Tanggal: {{ $item->tanggal }}</p>
                                    <p>Pukul: {{ $item->jam }}</p>
                                    <p>Lokasi: {{ $item->tempat }}</p>
                                </div>
                                <div class="text-right">
                                    @if (Auth::user()->hasRole('admin'))
                                        <a class="btn btn-primary btn-sm btn-edit"
                                            href="{{ route('agenda.edit', $item->id) }}">Edit</a>
                                        <!-- Tombol "Edit" hanya ditampilkan jika pengguna yang login memiliki peran (role) sebagai admin -->
                                        <form action="{{ route('agenda.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm btn-hapus">Hapus</button>
                                            <!-- Tombol "Hapus" hanya ditampilkan jika pengguna yang login memiliki peran (role) sebagai admin -->
                                        </form>
                                    @endif
                                    <a class="btn btn-primary btn-sm btn-selengkapnya"
                                        href="{{ route('agenda.show', $item->id) }}">Selengkapnya</a>
                                    <!-- Tombol "Selengkapnya" -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $agenda->links('pagination::bootstrap-4') }}
                <!-- Menampilkan tautan navigasi halaman menggunakan komponen paginasi Laravel dengan gaya Bootstrap 4 -->
            </div>
        </div>
    </div>
</div>
<!-- End #main -->

@include ('layouts.footer')
<!-- Memasukkan tampilan footer -->
