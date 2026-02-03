@extends('frontend.layouts.app')

@section('title', $metaTitle)
@section('meta_description', $metaDescription)
@section('meta_keywords', $metaKeywords)

@section('container')

    <!-- ===================== BREADCRUMB ===================== -->
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
                            {{ optional($products->category)->name ?? 'Produk' }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== DETAIL PRODUK ===================== -->
    <div class="rts-sop-details-area rts-section-gapTop">
        <div class="container">
            <div class="row align-items-center">

                <!-- ====== IMAGE SLIDER ====== -->
                <div class="col-lg-6">
                    <div class="banner-horizental">
                        <div class="swiper swiper-container-h1">
                            <div class="swiper-wrapper">

                                @php
                                    $images = json_decode($products->gambar, true) ?? [];
                                    $thumbnails = json_decode($products->thumbnail, true) ?? [];
                                    $sets = json_decode($products->set, true) ?? [];

                                    $allImages = array_merge($images, $thumbnails, $sets);

                                    // fallback jika semua kosong
                                    if (empty($allImages)) {
                                        $allImages = ['default-product.png'];
                                    }

                                    $mainImages = array_slice($allImages, 0, 4);
                                @endphp

                                @foreach ($mainImages as $index => $image)
                                    <div class="swiper-slide">
                                        <div class="slider-inner">
                                            <img src="{{ asset('/assets/images/product/' . $image) }}"
                                                alt="{{ $products->productname ?? 'Produk' }} image {{ $index + 1 }}">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <!-- ====== CONTENT ====== -->
                <div class="col-lg-6 mt_md--180 mt_sm--180">
                    <div class="ms-single-product__content">
                        <h2 class="ms-single-product_title">
                            {{ $products->productname ?? 'Nama Produk' }}
                        </h2>

                        <div class="woocommerce-product-details__short-description">
                            {!! $products->description ?? '<p>Deskripsi belum tersedia.</p>' !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ===================== PRODUK TERKAIT ===================== -->
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
                                        $gambarArray = json_decode($item->gambar, true) ?? [];
                                        $gambarUtama = $gambarArray[0] ?? 'default-product.png';
                                    @endphp

                                    <div class="swiper-slide">
                                        <div class="rts-single-shop-area">
                                            <a href="{{ $item->slug ? url('/produk/' . $item->slug) : '#' }}"
                                                class="thumbnail">
                                                <img src="{{ asset('/assets/images/product/' . $gambarUtama) }}"
                                                    alt="{{ $item->productname ?? 'Produk' }}">
                                            </a>
                                            <div class="inner-content">
                                                <a href="{{ $item->slug ? url('/produk/' . $item->slug) : '#' }}">
                                                    <h4 class="title">
                                                        {{ $item->productname ?? 'Nama Produk' }}
                                                    </h4>
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

@endsection
