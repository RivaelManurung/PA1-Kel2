@include ('Layouts.main')
@include('Layouts.header')
  
  <!-- main -->
<br><br><br>
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
    @if(Auth::user()->level=="admin")
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
          <th class="text-center">Aksi</th>
        </tr>
        @foreach($pinjam as $item)
        <tr>
          <th>{{ $item->nama }}</th>
          <th>{{ $item->alamat }}</th>
          <th>{{ $item->namaalat }}</th>
          <th>{{ $item->jumlah }}</th>
          <th>{{ $item->tanggal_peminjaman }}</th>
          <th>{{ $item->tanggal_pemulangan }}</th>
          <th>{{ $item->status }}</th>
          <th class="row justify-content-center">
            <form action="{{ route('pinjam.terima',$item->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <button type="submit" class="btn btn-success mx-1">Terima</button>
            </form>
            <form action="{{ route('pinjam.tolak',$item->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <button type="submit" class="btn btn-danger mx-1">Tolak</button>
            </form>
            <form action="{{ route('pinjam.denda',$item->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <button type="submit" class="btn btn-warning mx-1">Denda</button>
            </form>
          </th>
        </tr>
        @endforeach
      </table>
      <div class="text-center">
        {{ $pinjam->links() }}
      </div>
    </div>
    @else
    <section class="team-section">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h1 style="color: 79aa97;">Pinjam<br>Di Sini</h1>
          </div>
        </div>
        <div class="row">
          <div class="team-items row">
            @foreach($barang as $item)
            <div class="item col-md-4">
              <img src="{{ asset('asset/gambar/'.$item->gambar) }}" height="70%" alt="team" />
              <div class="inner">
                <div class="info">
                  <h5>{{ $item->nama }}</h5>
                  <a href="{{ route('pinjam.show',$item->id) }}" class="social-links">Pinjam</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    @endif

    <!-- end main -->
    @include ('Layouts.footer')
