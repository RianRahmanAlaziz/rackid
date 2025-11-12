@extends('frontend.layouts.app')
@section('title', 'Hubungi Kami - PT. Inti Kreasi Network | Rack.ID')
@section('meta_description',
    'Hubungi Rack.ID untuk konsultasi, pemesanan, atau informasi produk rak server seperti
    Standing Close Rack, Wallmount Rack, Wallmount Folding, Open Wallmount, dan Aksesoris Rak.')
@section('meta_keywords',
    'hubungi rack.id, kontak PT Inti Kreasi Network, kontak rack server, customer service rack.id,
    standing close rack, wallmount rack, open wallmount, wallmount folding, aksesoris rak, support rack server Indonesia')
@section('container')
    <div class="rts-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <span class="bg-title">Contact</span>
                        <h1 class="title rts-text-anime-style-1">
                            Contact Us
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-area">
            <img src="assets/images/about/shape/bg_about1.png" alt="shape" class="one">
            <img src="assets/images/about/shape/bg_about02.png " alt="shape" class="two">
            <img src="assets/images/about/shape/bg_05.png" alt="shape" class="three">
        </div>
    </div>


    <!-- contact areas main -->
    <div class="rts-contact-area-in-page" data-animation="fadeInUp" data-delay="0.2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="contact-info-area-wrapper-p">
                        <div class="single-contact-info">
                            <div class="info-wrapper">
                                <span>Hubungi Kami</span>
                                <a href="#">
                                    <h5 style="color: #fff; font-size:15px;">+62 821 1224 8872</h5>
                                </a>
                                <a href="#"></a>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="info-wrapper">
                                <span>Bergabung Bersama Kami</span>
                                <a href="#">
                                    <h5 style="color: #fff; font-size:15px;">customercare@rack.id</h5>
                                </a>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="info-wrapper">
                                <span>Lokasi Kami</span>
                                <a href="#">
                                    <h5 style="color: #fff; font-size:15px;">Jl. Kapuk Kencana No.35A, RT.007/RW.3, Kapuk
                                        Muara, Kecamatan
                                        Penjaringan,Jkt Utara, Daerah Khusus Ibukota Jakarta 14460</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="thumbnail-contact-form">
                        <img src="assets/images/contact/cs01.png" alt="contact">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact areas main end -->

    <!-- map area start -->
    <div class="google-map-area rts-section-gapTop ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="google-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7926.273434874888!2d106.7575434!3d-6.1373772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1d96234940ed%3A0xc12e287872ca01de!2sRackID%20—%20Solusi%20Rak%20Server%20%26%20Infrastruktur%20IT!5e0!3m2!1sen!2sid!4v1741757435755!5m2!1sen!2sid"
                            width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- map area end -->
@endsection
