@extends('frontend.layouts.app')
@section('container')
    <div class="banner-swiper-two">
        <div class="swiper mySwiper-banner-two">
            <div class="swiper-wrapper">
                <!-- SLIDE 1 -->
                <div class="swiper-slide">
                    <div class="banner-slide">
                        <img src="assets/images/banner/Wallmount Rack.jpg" alt="Banner 1" class="banner-main-img">
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="swiper-slide">
                    <div class="banner-slide">
                        <img src="assets/images/banner/Open Wallmount.jpg" alt="Banner 2" class="banner-main-img">
                    </div>
                </div>

                <!-- SLIDE 3 -->
                <div class="swiper-slide">
                    <div class="banner-slide">
                        <img src="assets/images/banner/wallmount Folding.jpg" alt="Banner 3" class="banner-main-img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- rts service area start -->
    <div class="rts-service-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between-hr">
                        <div class="title-area-hr-left">
                            <h2 class="title rts-text-anime-style-1">
                                Solusi Rak Server<br> Untuk Pertumbuhan Bisnis Anda
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5 mt--40">
                <!-- Spesialis Rak Server -->
                <div class="col-xl-4 col-lg-6 col-sm-12" data-animation="fadeInUp" data-delay="0.1" data-duration="1.2">
                    <div class="single-service-hr">
                        <a href="#" class="thumbnail">
                            <img src="assets/images/service/Server.png" alt="Spesialis Rak Server">
                        </a>
                        <div class="inner text-center">
                            <div class="icon-area mb-3">
                                <i class="fa-solid fa-server fa-3x text-white"></i>
                            </div>
                            <a href="#">
                                <h3 class="title">Spesialis Rak Server</h3>
                            </a>
                            <p class="disc">
                                Standing Close Rack, Wallmount Rack, Open Wallmount, Wallmount Folding, dan Aksesoris
                                Rak.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Gratis Pengiriman -->
                <div class="col-xl-4 col-lg-6 col-sm-12" data-animation="fadeInUp" data-delay="0.4" data-duration="1.2">
                    <div class="single-service-hr">
                        <a href="#" class="thumbnail">
                            <img src="assets/images/service/Truck.png" alt="Gratis Pengiriman">
                        </a>
                        <div class="inner text-center">
                            <div class="icon-area mb-3">
                                <i class="fa-solid fa-truck-fast fa-3x text-white"></i>
                            </div>
                            <a href="#">
                                <h3 class="title">Gratis Pengiriman</h3>
                            </a>
                            <p class="disc">
                                Layanan Pengiriman Gratis.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Gratis Instalasi -->
                <div class="col-xl-4 col-lg-6 col-sm-12" data-animation="fadeInUp" data-delay="0.7" data-duration="1.2">
                    <div class="single-service-hr">
                        <a href="#" class="thumbnail">
                            <img src="assets/images/service/perakitan.png" alt="Gratis Perakitan">
                        </a>
                        <div class="inner text-center">
                            <div class="icon-area mb-3">
                                <i class="fa-solid fa-screwdriver-wrench fa-3x text-white"></i>
                            </div>
                            <a href="#">
                                <h3 class="title">Gratis Perakitan</h3>
                            </a>
                            <p class="disc">
                                Layanan Perakitan Dan Instalasi Rack Server.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts service area end -->
@endsection
