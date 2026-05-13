@extends('dashboard.layouts.app')
@section('container')
    <div class="intro-y flex items-center mt-24">
        <h2 class="text-lg font-medium mr-auto">
            General Report
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-lucide="database" class="report-box__icon text-primary"></i>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $product }}</div>
                    <div class="text-base text-slate-500 mt-1">Jumlah Product</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-images-icon lucide-images">
                            <path d="m22 11-1.296-1.296a2.4 2.4 0 0 0-3.408 0L11 16" />
                            <path d="M4 8a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2" />
                            <circle cx="13" cy="7" r="1" fill="currentColor" />
                            <rect x="8" y="2" width="14" height="14" rx="2" />
                        </svg>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $gallery }}</div>
                    <div class="text-base text-slate-500 mt-1">Total Gallery</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-files-icon lucide-files">
                            <path
                                d="M15 2a2 2 0 0 1 1.414.586l4 4A2 2 0 0 1 21 8v7a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                            <path d="M15 2v4a2 2 0 0 0 2 2h4" />
                            <path d="M5 7a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h8a2 2 0 0 0 1.732-1" />
                        </svg>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $document }}</div>
                    <div class="text-base text-slate-500 mt-1">Total Documents</div>
                </div>
            </div>
        </div>
    </div>
@endsection
