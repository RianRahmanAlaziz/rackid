@extends('frontend.layouts.app')
@section('title', 'Media Foto - PT. Inti Kreasi Network | Rack.ID')
@section('meta_description',
    'Lihat koleksi media foto Rack.ID yang menampilkan berbagai produk unggulan seperti
    Standing Close Rack, Wallmount Rack, Wallmount Folding, Open Wallmount, dan Aksesoris Rak.')
@section('meta_keywords',
    'media foto rack.id, foto produk rack server, PT Inti Kreasi Network, standing close rack,
    wallmount rack, open wallmount, wallmount folding, aksesoris rak, galeri foto rack server Indonesia')
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
                            @forelse ($image as $item)
                                <div class="col-md-4">
                                    <div class="single-gallery">
                                        <a href="/assets/images/gallery/{{ $item->gambar }}"
                                            class="thumbnail gallery-image">
                                            <img src="/assets/images/gallery/{{ $item->gambar }}"
                                                alt="{{ $item->ngambar }}">
                                        </a>

                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center my-5">
                                    <p class="text-muted">Belum ada gambar yang tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- pagination area -->
        @if ($image->hasPages())
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <div class="pagination">
                            {{-- Tombol halaman --}}
                            @for ($i = 1; $i <= $image->lastPage(); $i++)
                                @if ($i == $image->currentPage())
                                    <button class="active">
                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                    </button>
                                @else
                                    <button onclick="window.location.href='{{ $image->url($i) }}'">
                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                    </button>
                                @endif
                            @endfor

                            {{-- Tombol next --}}
                            @if ($image->hasMorePages())
                                <a href="{{ $image->nextPageUrl() }}">
                                    <button><i class="fal fa-angle-double-right"></i></button>
                                </a>
                            @else
                                <button disabled><i class="fal fa-angle-double-right"></i></button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- rts galllery area end -->
@endsection
