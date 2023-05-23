@include('layouts.header')
@include('layouts.main')

{{-- body --}}
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>Welcome to website SiTani </h1>
                <h2>Visi:
                    Menjadi platform yang terkemuka dalam mendukung pertanian modern dan berkelanjutan, serta
                    meningkatkan kesejahteraan petani di seluruh dunia.</h2>
                <h2>Misi: Menghadirkan solusi inovatif berbasis teknologi untuk membantu petani meningkatkan efisiensi
                    produksi, kualitas, dan produktivitas pertanian</h2>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/sawah2.jpg" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

    @include('layouts.footer')
