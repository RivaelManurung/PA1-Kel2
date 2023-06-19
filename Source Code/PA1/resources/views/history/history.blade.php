@include('layouts.header')
@include('layouts.main')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li> History</li>
        </ol>
        <h2>History</h2>

    </div>
</section><!-- End Breadcrumbs -->
{{-- main --}}
<div class="row justify-content-center">
    <div class="my-5"><br><br>
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

@if (Auth::user()->hasRole('petani'))
    <div class="blog-area full-blog blog-standard full-blog grid-colum default-padding col-md-12">
        <table>
            <tr>
                <th>No Peminjaman</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nama Alat</th>
                <th>Jumlah Peminjaman</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pemulangan</th>
                <th>Status</th>
            </tr>
            @foreach ($pinjam as $item)
                @if ($item->user_id == auth()->user()->id)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->namaalat }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->tanggal_pemulangan }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endif
            @endforeach
        </table>
        <div class="d-flex">
            <div class="mx-auto">
                {{ $pinjam->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endif
{{-- end main --}}
@include('layouts.footer')
