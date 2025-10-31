@extends('dashboard.layouts.app')
@section('container')
    <div class="grid grid-cols-11 gap-x-6 mt-8 xl:mt-24 pb-20">
        <div class="intro-y col-span-11 2xl:col-span-9">
            <form action="{{ url('/dashboard/banner/' . $banner->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- BEGIN: Banner Information -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Banner Information
                        </div>
                        <div class="mt-5">
                            <!-- Judul Banner -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Banner Title</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                                Required
                                            </div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                            Judul akan ditampilkan di slider banner.
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="title" name="title" type="text" class="form-control"
                                        placeholder="Banner Title" value="{{ old('title', $banner->title) }}">
                                    @error('title')
                                        <div class="text-danger form-help text-left">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Urutan Banner -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Banner Order</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                                Required
                                            </div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                            Tentukan urutan banner di slider (misal: 1 untuk pertama).
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="order" name="order" type="number" class="form-control"
                                        placeholder="Contoh: 1" value="{{ old('order', $banner->order ?? 0) }}">
                                    @error('order')
                                        <div class="text-danger form-help text-left">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Banner Status</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 text-xs rounded-md">
                                                Required
                                            </div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                            Jika aktif, banner akan tampil di website.
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <!-- hidden default supaya selalu kirim nilai -->
                                    <input type="hidden" name="status" value="Inactive">
                                    <div class="form-check form-switch">
                                        <input id="status" name="status" class="form-check-input" type="checkbox"
                                            value="Active"
                                            {{ old('status', $banner->status) == 'Active' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Banner Information -->

                <!-- BEGIN: Upload Banner -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Upload Banner
                        </div>
                        <div class="mt-5">
                            <!-- Banner Desktop -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-10">
                                <div class="form-label w-full xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Banner Desktop</div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                    <div class="grid grid-cols-10 gap-5 pl-4 pr-5" id="preview-container0">
                                        <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                        @if ($banner->gambar_desktop)
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md" alt="Preview Image"
                                                    src="/assets/images/banner/{{ $banner->gambar_desktop }}">
                                                <div title="Remove this image?"
                                                    class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                    onclick="removePreviewDekstop('{{ $banner->gambar_desktop }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <line x1="18" y1="6" x2="6" y2="18">
                                                        </line>
                                                        <line x1="6" y1="6" x2="18" y2="18">
                                                        </line>
                                                    </svg>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                                        <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span
                                            class="text-primary mr-1">Upload
                                            a file</span> or drag and drop
                                        <input id="gambar_desktop" type="file" name="gambar_desktop" accept="image/*"
                                            class="w-full h-full top-0 left-0 absolute opacity-0"
                                            onchange="previewImageDekstop(event)" value="{{ old('gambar_desktop') }}">
                                    </div>
                                </div>
                                @error('gambar_desktop')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Banner Mobile -->
                            <div class="form-inline items-start flex-col xl:flex-row mt-10">
                                <div class="form-label w-full xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Banner Mobile</div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                    <div class="grid grid-cols-10 gap-5 pl-4 pr-5" id="preview-container1">
                                        <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                        @if ($banner->gambar_mobile)
                                            <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                <img class="rounded-md" alt="Preview Image"
                                                    src="/assets/images/banner/{{ $banner->gambar_mobile }}">
                                                <div title="Remove this image?"
                                                    class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                    onclick="removePreviewMobile('{{ $banner->gambar_mobile }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18">
                                                        </line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18">
                                                        </line>
                                                    </svg>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                                        <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span
                                            class="text-primary mr-1">Upload
                                            a file</span> or drag and drop
                                        <input id="gambar_mobile" type="file" name="gambar_mobile" accept="image/*"
                                            class="w-full h-full top-0 left-0 absolute opacity-0"
                                            onchange="previewImageMobile(event)" value="{{ old('gambar_mobile') }}">
                                    </div>
                                </div>
                                @error('gambar_mobile')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Upload Banner -->

                <!-- BEGIN: Action Buttons -->
                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                    <a href="{{ url('/dashboard/banners') }}"
                        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">
                        Cancel
                    </a>
                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update</button>
                </div>
                <!-- END: Action Buttons -->
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons(); // Ini akan memuat ikon dengan atribut data-lucide
        });
        // Fungsi untuk menampilkan pratinjau gambar yang diunggah
        function previewImageDekstop(event) {
            const previewContainer0 = document.getElementById("preview-container0");
            previewContainer0.innerHTML = ""; // Bersihkan pratinjau sebelumnya

            const file1 = event.target.files[0];
            if (file1) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imagePreview = document.createElement("div");
                    imagePreview.className = "w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";

                    imagePreview.innerHTML = `
        <img class="rounded-md" alt="Preview Image" src="${e.target.result}">
        <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreviewDekstop()">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
        </div>
    `;

                    previewContainer0.appendChild(imagePreview);
                };

                reader.readAsDataURL(file1);
            }
        }
        // Fungsi untuk menghapus pratinjau
        function removePreviewDekstop() {
            const previewContainer0 = document.getElementById("preview-container0");
            previewContainer0.innerHTML = ""; // Hapus pratinjau gambar

            // Menghapus elemen input file dan menambahkannya kembali
            const fileInput = document.getElementById("file");
            fileInput.value = ""; // Jika id input file adalah "file"
            const newFileInput = fileInput.cloneNode(true);
            fileInput.parentNode.replaceChild(newFileInput, fileInput);

            // Tambahkan event listener ke elemen baru
            newFileInput.addEventListener("change", previewImage);
        }

        // Fungsi untuk menampilkan pratinjau gambar yang diunggah
        function previewImageMobile(event) {
            const previewContainer1 = document.getElementById("preview-container1");
            previewContainer1.innerHTML = ""; // Bersihkan pratinjau sebelumnya

            const file1 = event.target.files[0];
            if (file1) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imagePreview = document.createElement("div");
                    imagePreview.className = "w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";

                    imagePreview.innerHTML = `
        <img class="rounded-md" alt="Preview Image" src="${e.target.result}">
        <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreviewMobile()">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
        </div>
    `;

                    previewContainer1.appendChild(imagePreview);
                };

                reader.readAsDataURL(file1);
            }
        }
        // Fungsi untuk menghapus pratinjau
        function removePreviewMobile() {
            const previewContainer1 = document.getElementById("preview-container1");
            previewContainer1.innerHTML = ""; // Hapus pratinjau gambar

            // Menghapus elemen input file dan menambahkannya kembali
            const fileInput = document.getElementById("file");
            fileInput.value = ""; // Jika id input file adalah "file"
            const newFileInput = fileInput.cloneNode(true);
            fileInput.parentNode.replaceChild(newFileInput, fileInput);

            // Tambahkan event listener ke elemen baru
            newFileInput.addEventListener("change", previewImage);
        }
    </script>
@endpush
