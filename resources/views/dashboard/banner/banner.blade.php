@extends('dashboard.layouts.app')

@section('container')
    <div class="intro-y flex flex-col items-start mt-8 xl:mt-24 max-w-6xl">
        <h2 class="text-lg font-medium">Banner Slider</h2>
    </div>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-5 mb-5">
        <a href="/dashboard/banner/create" class="btn btn-primary shadow-md mr-2">Add New Banner</a>
        <div class="hidden md:block mx-auto text-slate-500">
            Showing {{ $banners->firstItem() }} to {{ $banners->lastItem() }} of {{ $banners->total() }} entries
        </div>
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

    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center px-4 py-2 whitespace-nowrap">ORDER</th>
                    <th class="px-4 py-2 whitespace-nowrap">TITLE</th>
                    <th class="px-4 py-2 whitespace-nowrap">GAMBAR DESKTOP</th>
                    <th class="px-4 py-2 whitespace-nowrap">GAMBAR MOBILE</th>
                    <th class="px-4 py-2 whitespace-nowrap text-center">STATUS</th>
                    <th class="px-4 py-2 whitespace-nowrap text-center">ACTIONS</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                @forelse ($banners as $banner)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">{{ $banner->order }}</td>
                        <td class="px-4 py-2 font-medium text-gray-700 whitespace-nowrap">
                            {{ $banner->title }}
                        </td>
                        <td>
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in ">
                                    <img alt="{{ $banner->title }}" data-action="zoom" class="w-full tooltip rounded-full"
                                        src="/assets/images/banner/{{ $banner->gambar_desktop }}"
                                        title="Uploaded at {{ $banner->updated_at->format('d F Y') }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in ">
                                    <img alt="{{ $banner->title }}" data-action="zoom" class="w-full tooltip rounded-full"
                                        src="/assets/images/banner/{{ $banner->gambar_mobile }}"
                                        title="Uploaded at {{ $banner->updated_at->format('d F Y') }}">
                                </div>
                            </div>
                        </td>
                        <td class="w-40">
                            <div
                                class="flex items-center justify-center {{ $banner->status == 'Active' ? 'text-success' : 'text-danger' }}">
                                <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                                {{ $banner->status }}
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="/dashboard/banner/{{ $banner->id }}/edit">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                    data-tw-target="#delete-confirmation-modal{{ $banner->id }}">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>

                    {{-- Modal delete untuk setiap banner --}}
                    <div id="delete-confirmation-modal{{ $banner->id }}" class="modal" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="p-5 text-center">
                                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">Are you sure?</div>
                                        <div class="text-slate-500 mt-2">
                                            Do you really want to delete <b>{{ $banner->title }}</b>?<br>
                                            This process cannot be undone.
                                        </div>
                                    </div>
                                    <form action="/dashboard/banners/{{ $banner->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
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
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">
                            No banners found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $banners->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Autoplay semua video
            const videos = document.querySelectorAll('.autoplay-video');
            videos.forEach(video => {
                video.play().catch(err => {
                    console.log('Autoplay blocked:', err);
                });
            });
        });
    </script>
@endsection
