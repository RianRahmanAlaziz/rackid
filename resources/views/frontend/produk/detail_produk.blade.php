    @extends('frontend.layouts.app')
    @section('title', '{{ $products->productname }} - PT. Inti Kreasi Network | Rack.ID')
    @section('meta_description',
        '{{ $products->productname }} dari Rack.ID – solusi rak server profesional untuk
        kebutuhan jaringan dan infrastruktur IT Anda. Tersedia berbagai ukuran dan fitur sesuai kebutuhan.')
    @section('meta_keywords',
        '{{ $products->productname }}, rack.id, PT Inti Kreasi Network, rack server, standing
        rack, wallmount rack, open wallmount, wallmount folding, aksesoris rak, rack server Indonesia')
    @section('container')
        <div class="partner-breadcrumb bg_image"
            style="background-image: url('/assets/images/banner/heading_produk.png'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat;
                height: 200px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-area-left center">
                            <h2 class="title">
                                {{ $products->category->name }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rts-sop-details-area rts-section-gapTop">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="banner-horizental">
                            <div class="swiper swiper-container-h1">
                                <div class="swiper-wrapper">
                                    @php
                                        $images = json_decode($products->gambar, true) ?? [];
                                        $thumbnails = json_decode($products->thumbnail, true) ?? [];
                                        $sets = json_decode($products->set, true) ?? [];
                                        $urls = json_decode($products->url, true) ?? [];
                                        $allImages = array_merge($images, $thumbnails, $sets);
                                        $mainImages = array_slice($allImages, 0, 4);
                                        $mainVideos = array_slice($urls, 0, 2);
                                        $carouselItems = array_merge($mainImages, $mainVideos);
                                    @endphp
                                    @foreach ($mainImages as $index => $image)
                                        <div class="swiper-slide">
                                            <div class="slider-inner">
                                                <img src="{{ asset('/assets/images/product/' . $image) }}"
                                                    alt="full_screen-image">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt_md--180 mt_sm--180">
                        <div class="ms-single-product__content">
                            <h2 class="ms-single-product_title"> {{ $products->productname }}</h2>
                            <div class="woocommerce-product-details__short-description">
                                {!! $products->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- rts related shop area start -->
        <div class="rts-related-shop-area rts-section-gapBottom ptb--100" dir="ltr">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-style-five center mb--40">
                            <h2 class="title">Produk Terkait</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-related-shop-area">
                            <div class="swiper mySwiper-related-shop">
                                <div class="swiper-wrapper">
                                    @foreach ($product as $item)
                                        @php
                                            $gambarArray = json_decode($item->gambar, true);
                                        @endphp
                                        <div class="swiper-slide">
                                            <div class="rts-single-shop-area">
                                                <a href="/produk/{{ $item->slug }}" class="thumbnail">
                                                    <img src="{{ asset('/assets/images/product/' . $gambarArray[0]) }}"
                                                        alt="{{ $item->productname }}">
                                                </a>
                                                <div class="inner-content">
                                                    <a href="/produk/{{ $item->slug }}">
                                                        <h4 class="title">{{ $item->productname }}</h4>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- rts related shop area end -->
    @endsection
