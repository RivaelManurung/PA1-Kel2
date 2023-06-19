@include ('layouts.main')
@include('layouts.header')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{ route('Beranda') }}">Home</a></li>
            <li> Kontak</li>
        </ol>
        <h2>Kontak</h2>

    </div>
</section><!-- End Breadcrumbs -->
<!-- main -->
<!-- ======= Members Section ======= -->
<section id="members" class="members">
    <div class="container">

        <div class="row">

            <div class="col-lg-6 col-md-5 d-flex align-items-stretch">
                <div class="member">
                    <div class="member-img">
                        <img src="assets/img/members/M1.jpeg" class="img-fluid" alt="">
                        <div class="social">
                            <a href="https://web.facebook.com/rivael.manroe"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/rivael_m/"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/rivaelmanurung/"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Rivael Manurung</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <div class="member-img">
                        <img src="assets/img/members/M2.jpeg" class="img-fluid" alt="">
                        <div class="social">
                            <a href="https://web.facebook.com/kerens.simanjuntaks/"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/keren_smjtk/"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/keren-simanjuntak-36462b25a/"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Keren Simanjuntak</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <div class="member-img">
                        <img src="assets/img/members/M3.jpeg" class="img-fluid" alt="">
                        <div class="social">
                            <a href="https://www.facebook.com/monslbn"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/monica.slbn/?next=%2F"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/monica-silaban-7b257b26b/"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Monica Silaban </h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <div class="member-img">
                        <img src="assets/img/members/M4.jpeg" class="img-fluid" alt="">
                        <div class="social">
                            <a href="https://www.facebook.com/adinda.hutasoit.3"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/adindaa_h02/"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/adinda-hutasoit-ab5a06275/"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Adinda Hutasoit</h4>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Members Section -->

</main>

<!-- End #main -->
@include ('layouts.footer')
