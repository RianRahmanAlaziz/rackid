   @extends('frontend.layouts.app')
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
               <img src="assets/images/about/shape/01.png" alt="shape" class="one">
               <img src="assets/images/about/shape/02.png" alt="shape" class="two">
               <img src="assets/images/about/shape/03.png" alt="shape" class="three">
           </div>
       </div>
       <!-- rts document download area start -->
       <div class="rts-document-area rts-section-gapBottom mt-dec-section-inner with-pricing">
           <div class="container">
               <div class="row g-4">
                   <!-- single document card -->
                   <div class="col-lg-4 col-md-6">
                       <div class="document-card text-center p-4 border rounded shadow-sm">
                           <div class="icon mb-3">
                               <i class="fa-regular fa-file-lines fa-3x text-primary"></i>
                           </div>
                           <h4 class="doc-title">Datasheet Teknis</h4>
                           <p class="doc-desc">Spesifikasi teknis lengkap untuk produk RackID.</p>
                           <a href="assets/docs/datasheet.pdf" class="rts-btn btn-primary mt-3" download>Unduh PDF</a>
                       </div>
                   </div>
                   <!-- single document card -->
                   <div class="col-lg-4 col-md-6">
                       <div class="document-card text-center p-4 border rounded shadow-sm">
                           <div class="icon mb-3">
                               <i class="fa-regular fa-file-lines fa-3x text-primary"></i>
                           </div>
                           <h4 class="doc-title">Datasheet Teknis</h4>
                           <p class="doc-desc">Spesifikasi teknis lengkap untuk produk RackID.</p>
                           <a href="assets/docs/datasheet.pdf" class="rts-btn btn-primary mt-3" download>Unduh PDF</a>
                       </div>
                   </div>
                   <!-- single document card -->
                   <div class="col-lg-4 col-md-6">
                       <div class="document-card text-center p-4 border rounded shadow-sm">
                           <div class="icon mb-3">
                               <i class="fa-regular fa-file-lines fa-3x text-primary"></i>
                           </div>
                           <h4 class="doc-title">Datasheet Teknis</h4>
                           <p class="doc-desc">Spesifikasi teknis lengkap untuk produk RackID.</p>
                           <a href="assets/docs/datasheet.pdf" class="rts-btn btn-primary mt-3" download>Unduh PDF</a>
                       </div>
                   </div>
               </div>
           </div>
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
       <!-- rts document download area end -->
   @endsection
