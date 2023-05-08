@include('Layout.header')
@include('Layout.main')
{{-- main --}}
      <div class="breadcrumb-area text-center shadow dark bg-fixed text-light" style="background-image: url('{{ asset('images/Bg5.jpeg')}}')">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <h1>Maduma Tani</h1>
              <ul class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}"><i class="fas fa-home"></i> Home</a></li>
                <li class="active">Tani</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  
      <div class="row justify-content-center">
        <div class="my-5">
          <div class="error-box">
            <div class="search">
              <div class="input-group">
                <form action="#">
                  <input type="text" placeholder="Search" class="form-control" name="search" autocomplete="off" value="{{ request()->search }}">
                  <button type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if(Auth::user()->role=="user")
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
          @foreach($pinjam as $item)
          @if($item->user_id== auth()->user()->id)
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
        <div class="text-center">
          {{ $pinjam->links() }}
        </div>
      </div>
      @endif
{{-- end main --}}
@include('Layout.footer')