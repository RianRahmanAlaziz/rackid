   @extends('frontend.layouts.app')
   @section('title', 'Datasheet Produk - PT. Inti Kreasi Network | Rack.ID')
   @section('meta_description',
       'Lihat dan unduh datasheet resmi Rack.ID untuk detail teknis produk seperti Standing
       Close Rack, Wallmount Rack, Wallmount Folding, Open Wallmount, dan Aksesoris Rak.')
   @section('meta_keywords',
       'datasheet rack.id, datasheet rack server, spesifikasi rack server, PT Inti Kreasi Network,
       standing close rack, wallmount rack, open wallmount, wallmount folding, aksesoris rak, rack server Indonesia')
   @section('container')
       <div class="rts-breadcrumb-area pb--200">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="title-area-left">
                           <span class="bg-title">Datasheet</span>
                           <h1 class="title rts-text-anime-style-1">
                               Unduh Dokumen
                           </h1>
                           <p class="disc" style="max-width: 45%;">
                               Temukan berbagai datasheet produk Rackid untuk mengetahui informasi lengkap tentang solusi
                               kami.
                           </p>
                       </div>
                   </div>
               </div>
           </div>
           <div class="shape-area">
               <img src="/assets/images/about/shape/01.png" alt="shape" class="one">
               <img src="/assets/images/about/shape/02.png" alt="shape" class="two">
               <img src="/assets/images/about/shape/03.png" alt="shape" class="three">
           </div>
       </div>
       <!-- rts document download area start -->
       <div class="rts-document-area rts-section-gapBottom mt-dec-section-inner with-pricing">
           <div class="container">
               <div class="row g-4">
                   @forelse ($files as $item)
                       <!-- single document card -->
                       <div class="col-lg-4 col-md-6">
                           <div class="document-card text-center p-4 border rounded shadow-sm">
                               <div class="icon mb-3">
                                   <i class="fa-regular fa-file-pdf fa-3x text-primary"></i>
                               </div>
                               <h4 class="doc-title">Datasheet Teknis {{ $item->nfile }}</h4>
                               <p class="doc-desc">Spesifikasi teknis lengkap untuk produk RackID.</p>
                               <a href="/assets/document/{{ $item->file }}" class="rts-btn btn-primary mt-3"
                                   download>Unduh
                                   PDF</a>
                           </div>
                       </div>
                   @empty
                       <div class="col-12 text-center my-5">
                           <p class="text-muted">Belum ada Dokument yang tersedia.</p>
                       </div>
                   @endforelse
               </div>
           </div>
           <!-- pagination area -->
           @if ($files->hasPages())
               <div class="row">
                   <div class="col-12">
                       <div class="text-center">
                           <div class="pagination">
                               {{-- Tombol halaman --}}
                               @for ($i = 1; $i <= $files->lastPage(); $i++)
                                   @if ($i == $files->currentPage())
                                       <button class="active">
                                           {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                       </button>
                                   @else
                                       <button onclick="window.location.href='{{ $files->url($i) }}'">
                                           {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                       </button>
                                   @endif
                               @endfor

                               {{-- Tombol next --}}
                               @if ($files->hasMorePages())
                                   <a href="{{ $files->nextPageUrl() }}">
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
       <!-- rts document download area end -->
   @endsection
