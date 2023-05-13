@include('Layouts.header')
@include('Layouts.main')
{{-- main --}}

<div class="row justify-content-center">
    <div class="my-5"><br><br>
        <div class="error-box">
            <div class="search">
                <div class="input-group">
                    <form action="#">
                        <input type="text" placeholder="Search" class="form-control" name="search" autocomplete="off"
                            value="{{ request()->search }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Auth::user()->level == 'user')
    <div class="blog-area full-blog blog-standard full-blog grid-colum default-padding col-md-12">
        <table>
            <tr>
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
                        <th>{{ $item->nama }}</th>
                        <th>{{ $item->alamat }}</th>
                        <th>{{ $item->namaalat }}</th>
                        <th>{{ $item->jumlah }}</th>
                        <th>{{ $item->tanggal_peminjaman }}</th>
                        <th>{{ $item->tanggal_pemulangan }}</th>
                        <th>{{ $item->status }}</th>
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
@include('Layouts.footer')
