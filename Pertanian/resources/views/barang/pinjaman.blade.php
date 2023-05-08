@include('Layouts.main')
@include('Layouts.header')
<!-- main -->

<div class="contact-area default-padding">
    @if (session()->has('success'))
        <div class="row justify-content-center my-2 container-full">
            <div class="alert alert-danger text-center col-lg-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container-full">
        <div class="contact-items">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="form-content"><br><br>
                        <h2 class="text-center">Pinjam Disini</h2>

                        <form action="{{ route('pinjam.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="namaalat">Nama Alat</label>
                                <input class="form-control" id="namaalat" name="nama" type="text"
                                    value="{{ $barang->nama }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah Alat</label>
                                <input class="form-control" id="jumlah" name="jumlah" type="number" min="1"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                <input class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman"
                                    type="date" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_pemulangan">Rencana Pemulangan</label>
                                <input class="form-control" id="tanggal_pemulangan" name="tanggal_pemulangan"
                                    type="date" required>
                            </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="px-5 btn btn-primary">Konfirmasi</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.datepicker').datepicker({

        startDate: new Date()

    });
</script>
<!-- end main -->
@include('Layouts.footer')
