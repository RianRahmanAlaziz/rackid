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
                            @forelse ($image as $item)
                                <div class="col-md-4">
                                    <div class="single-gallery">
                                        <div class="video-wrapper">
                                            <iframe width="560" height="315" src="{{ $item->url }}"
                                                title="{{ $item->ngambar }}" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                            </iframe>
                                        </div>

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
@endsection
