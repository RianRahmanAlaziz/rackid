@extends('dashboard.layouts.app')
@section('container')
    <h2 class="intro-y text-lg font-medium mt-8 xl:mt-24">
        Product List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="/dashboard/product/create" class="btn btn-primary shadow-md mr-2">Add New Product</a>
            <div class="hidden md:block mx-auto text-slate-500"> Showing {{ $product->firstItem() }} to
                {{ $product->lastItem() }} of {{ $product->total() }} entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <form action="{{ url()->current() }}" method="get">
                        <input type="text" name="search" id="search" class="form-control w-56 box pr-10"
                            placeholder="Search..." value="{{ old('search', request('search')) }}">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </form>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">PRODUCT NAME</th>
                        <th class="whitespace-nowrap">IMAGES</th>
                        <th class="whitespace-nowrap">VIDEO</th>
                        <th class=" whitespace-nowrap">SLUG</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product as $item)
                        <tr class="intro-x">
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">
                                    {{ Str::limit(strip_tags($item->productname), 50) }}
                                </a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $item->category->name }}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex">
                                    @foreach (collect(json_decode($item->gambar, true))->take(3) as $gambar)
                                        <div
                                            class="w-10 h-10 image-fit zoom-in @if (!$loop->first) -ml-5 @endif">
                                            <img alt="{{ $item->productname }}" data-action="zoom"
                                                class="w-full tooltip rounded-full"
                                                src="{{ asset('/assets/images/product/' . (is_array($gambar) && isset($gambar['filename']) ? $gambar['filename'] : $gambar)) }}"
                                                title="Uploaded at {{ $item->updated_at->format('d F Y') }}">
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex">
                                    @foreach (collect(json_decode($item->thumbnail))->take(3) as $thumbnail)
                                        <div
                                            class="w-10 h-10 image-fit zoom-in @if (!$loop->first) -ml-5 @endif">
                                            <img alt="{{ $item->productname }}" data-action="zoom"
                                                class="w-full tooltip rounded-full"
                                                src="{{ asset('/assets/images/product/' . $thumbnail) }}"
                                                title="Uploaded at {{ $item->updated_at->format('d F Y') }}">
                                        </div>
                                    @endforeach
                                </div>
                            </td>

                            <td class="">
                                <a class="text-slate-500 flex items-center mr-3" href="/product/{{ $item->slug }}"
                                    target="_blank"> <i data-lucide="external-link" class="w-4 h-4 mr-2"></i>/products/
                                    {{ Str::limit(strip_tags($item->slug), 10) }}</a>
                            </td>
                            <td class="w-40">
                                <div
                                    class="flex items-center justify-center 
                                    {{ $item->status == 'Active' ? 'text-success' : 'text-danger' }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                                    {{ $item->status }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="/dashboard/product/{{ $item->id }}/edit">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#delete-confirmation-modal{{ $item->id }}"> <i
                                            data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex justify-center items-center">
            <nav class="w-full sm:w-auto">
                <ul class="pagination">
                    {{-- Tombol ke awal & sebelumnya --}}
                    @if ($product->onFirstPage())
                        <li class="page-item disabled"><a class="page-link"><i class="w-4 h-4"
                                    data-lucide="chevrons-left"></i></a></li>
                        <li class="page-item disabled"><a class="page-link"><i class="w-4 h-4"
                                    data-lucide="chevron-left"></i></a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $product->url(1) }}"><i class="w-4 h-4"
                                    data-lucide="chevrons-left"></i></a></li>
                        <li class="page-item"><a class="page-link" href="{{ $product->previousPageUrl() }}"><i
                                    class="w-4 h-4" data-lucide="chevron-left"></i></a></li>
                    @endif

                    {{-- Halaman --}}
                    @php
                        $start = max($product->currentPage() - 2, 1);
                        $end = min($product->currentPage() + 2, $product->lastPage());
                    @endphp

                    {{-- Halaman pertama --}}
                    @if ($start > 1)
                        <li class="page-item"><a class="page-link" href="{{ $product->url(1) }}">1</a></li>
                        @if ($start > 2)
                            <li class="page-item disabled"><a class="page-link">...</a></li>
                        @endif
                    @endif

                    {{-- Range halaman dinamis --}}
                    @for ($i = $start; $i <= $end; $i++)
                        <li class="page-item {{ $i == $product->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $product->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Halaman terakhir --}}
                    @if ($end < $product->lastPage())
                        @if ($end < $product->lastPage() - 1)
                            <li class="page-item disabled"><a class="page-link">...</a></li>
                        @endif
                        <li class="page-item"><a class="page-link"
                                href="{{ $product->url($product->lastPage()) }}">{{ $product->lastPage() }}</a></li>
                    @endif

                    {{-- Tombol ke berikutnya & terakhir --}}
                    @if ($product->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $product->nextPageUrl() }}"><i
                                    class="w-4 h-4" data-lucide="chevron-right"></i></a></li>
                        <li class="page-item"><a class="page-link" href="{{ $product->url($product->lastPage()) }}"><i
                                    class="w-4 h-4" data-lucide="chevrons-right"></i></a></li>
                    @else
                        <li class="page-item disabled"><a class="page-link"><i class="w-4 h-4"
                                    data-lucide="chevron-right"></i></a></li>
                        <li class="page-item disabled"><a class="page-link"><i class="w-4 h-4"
                                    data-lucide="chevrons-right"></i></a></li>
                    @endif
                </ul>
            </nav>
        </div>

        <!-- END: Pagination -->

    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    @foreach ($product as $item)
        <div id="delete-confirmation-modal{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">
                                Do you really want to delete these records?
                                <br>
                                This process cannot be undone.
                            </div>
                        </div>
                        <form action="/dashboard/product/{{ $item->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="px-5 pb-8 text-center">
                                <button type="button" data-tw-dismiss="modal"
                                    class="btn btn-outline-secondary w-24 mr-1">Cancel</button>

                                <button type="submit" class="btn btn-danger w-24">Delete</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- END: Delete Confirmation Modal -->
@endsection
