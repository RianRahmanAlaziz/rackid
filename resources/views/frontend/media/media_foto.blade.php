@extends('frontend.layouts.app')
@section('container')
    <!-- partners area breadcrumb area wrapper -->
    <div class="partner-breadcrumb bg_image"
        style="background-image: url('assets/images/banner/heading_produk.png'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat;
                height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-left center">
                        <h2 class="title">
                            Media Foto
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="rts-gallery-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gallery-area-main-wrapper-4">
                        <div class="row g-5">
                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <a href="assets/images/gallery/01.webp" class="thumbnail gallery-image">
                                        <img src="assets/images/gallery/01.webp" alt="gallery">
                                    </a>
                                    <div class="instagram">
                                        <img src="assets/images/gallery/instagram.svg" alt="instagram.svg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <a href="assets/images/gallery/03.webp" class="thumbnail gallery-image">
                                        <img src="assets/images/gallery/03.webp" alt="gallery">
                                    </a>
                                    <div class="instagram">
                                        <img src="assets/images/gallery/instagram.svg" alt="instagram.svg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <a href="assets/images/gallery/04.webp" class="thumbnail gallery-image">
                                        <img src="assets/images/gallery/04.webp" alt="gallery">
                                    </a>
                                    <div class="instagram">
                                        <img src="assets/images/gallery/instagram.svg" alt="instagram.svg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <a href="assets/images/gallery/05.webp" class="thumbnail gallery-image">
                                        <img src="assets/images/gallery/05.webp" alt="gallery">
                                    </a>
                                    <div class="instagram">
                                        <img src="assets/images/gallery/instagram.svg" alt="instagram.svg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <a href="assets/images/gallery/02.webp" class="thumbnail gallery-image">
                                        <img src="assets/images/gallery/02.webp" alt="gallery">
                                    </a>
                                    <div class="instagram">
                                        <img src="assets/images/gallery/instagram.svg" alt="instagram.svg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <a href="assets/images/gallery/06.webp" class="thumbnail gallery-image">
                                        <img src="assets/images/gallery/06.webp" alt="gallery">
                                    </a>
                                    <div class="instagram">
                                        <img src="assets/images/gallery/instagram.svg" alt="instagram.svg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pagination area -->
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <div class="pagination">
                        <button class="active">01</button>
                        <button>02</button>
                        <button>03</button>
                        <button>04</button>
                        <button><i class="fal fa-angle-double-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts galllery area end -->
@endsection
