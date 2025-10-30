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
                            Media video
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
                                    <div class="video-wrapper">
                                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_1"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <div class="video-wrapper">
                                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_2"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <div class="video-wrapper">
                                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_3"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <div class="video-wrapper">
                                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_4"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <div class="video-wrapper">
                                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_5"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <div class="video-wrapper">
                                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/VIDEO_ID_6"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
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
@endsection
