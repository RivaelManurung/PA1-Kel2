@include('Layouts.main')
@include('Layouts.header')
<!-- main -->
<div class="blog-area full-blog blog-standard full-blog grid-colum default-padding">
    <div class="container">
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


        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
              <div class="container">
                @if (Auth::User()->level == 'admin')
                  <a class="btn btn-primary btn-md btn-tambah" href="{{ route('album.create') }}">Tambah</a>
                @endif
                @foreach ($album as $item)
                  <div class="mt-4 mb-4">
                    <div class="row row-cols-4 g-2 md:g-4">
                      <img src="{{ asset('asset/album/' . $item->gambar) }}" alt="{{ $item->judul }}" width="100%" height="100%">
                      <div class="col">
                        <div class="card-body">
                          <div>
                            @if (Auth::User()->level == 'admin')
                              <a class="btn btn-primary btn-md btn-edit" href="{{ route('album.edit', $item->id) }}">Edit</a>
                              <form action="{{ route('album.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-md btn-hapus">Hapus</button>
                              </form>
                              <a class="btn btn-primary btn-md btn-selengkapnya" href="{{ route('album.show', $item->id) }}">Selengkapnya</a>
                            @else
                              <a class="btn btn-primary btn-md btn-selengkapnya" href="{{ route('album.show', $item->id) }}">Selengkapnya</a>
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
          
                    <div class="d-flex">
                        <div class="mx-auto">
                            {{ $album->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>

<!-- End #main -->
@include('Layouts.footer')
