@extends('dashboard.layouts.app')
@section('container')
    <div class="intro-y flex items-center mt-20">
        <h2 class="text-lg font-medium mr-auto">
            Edit Product
        </h2>
    </div>
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">
        <div class="intro-y col-span-11 2xl:col-span-9">
            <form action="/dashboard/product/{{ $product->id }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <!-- BEGIN: Product Information -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Product Information
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Product Name</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3"> Sertakan min. 40 karakter
                                            hingga
                                            membuatnya lebih menarik dan mudah ditemukan pembeli, terdiri dari jenis produk,
                                            merek, dan informasi seperti warna, bahan, atau jenis. </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="productname" name="productname" type="text" class="form-control"
                                        placeholder="Product name" value="{{ old('productname', $product->productname) }}">
                                    <div class="form-help text-right">Maximum character 0/70</div>
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Slug</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3"> Slug adalah bagian dari
                                            URL yang berfungsi sebagai pengenal unik untuk suatu halaman atau konten,
                                            biasanya berupa teks yang diambil dari judul halaman dan diubah menjadi lebih
                                            singkat, mudah dibaca, dan ramah mesin pencari (SEO-friendly).</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="slug" name="slug" type="text" class="form-control"
                                        value="{{ old('slug', $product->slug) }}" readonly>
                                    <div class="form-help text-right">Maximum character 0/70</div>
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Category</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <select id="category_id" name="category_id" class="form-select">
                                        <option value="">
                                            Pilih Category
                                        </option>
                                        @foreach ($category as $item)
                                            @if (old('category_id', $product->category_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END: Product Information -->

                <!-- BEGIN: Uplaod Product -->
                <div class="intro-y box p-5  mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Upload Product
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-10">
                                <div class="form-label w-full xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Product Photos</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                            <div>Format gambar adalah .jpg .jpeg .png
                                                (Untuk
                                                gambar optimal menggunakan ukuran minimal 400 x 400 piksel).</div>
                                            <div class="mt-2">Pilih foto produk atau drag dan drop hingga 5 foto sekaligus
                                                Di Sini. Sertakan min. 3 foto menarik agar produk semakin diminati
                                                pembeli.</div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                    <div class="grid grid-cols-10 gap-5 pl-4 pr-5" id="preview-container0">
                                        <!-- Pratinjau Gambar Lama -->
                                        @if ($product->gambar)
                                            @foreach (json_decode($product->gambar) as $index => $gambar)
                                                <div id="existing-preview-{{ $index }}"
                                                    class="col-span-5 md:col-span-2 h-28 relative image-fit cursor-pointer zoom-in existing-preview"
                                                    data-file="{{ $gambar }}">
                                                    <img class="rounded-md" alt="Preview Image"
                                                        src="{{ asset('/assets/images/product/' . $gambar) }}"
                                                        style="width: 100%; height: auto;">
                                                    <div class="remove-btn tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                                                        onclick="removeExistingImage({{ $index }}, '{{ $gambar }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18"></line>
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18"></line>
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- Upload gambar baru -->
                                    <div class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                                        <i data-lucide="image" class="w-4 h-4 mr-2"></i>
                                        <span class="text-primary mr-1">Upload a file</span> or drag and drop
                                        <input id="input" type="file" name="gambar[]" multiple accept="image/*"
                                            class="w-full h-full top-0 left-0 absolute opacity-0"
                                            onchange="previewNewImage(event)">
                                    </div>
                                </div>
                                <input type="hidden" name="deleted_images" id="deleted_images" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Uplaod Product -->

                <!-- BEGIN: Product Detail -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Product Description
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Product ID</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">Masukkan kode Unique yang
                                            digunakan untuk mengidentifikasi produk secara spesifik.</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="productid" name="productid" type="text" class="form-control"
                                        placeholder="Product ID" value="{{ old('productid', $product->productid) }}">
                                    @error('productid')
                                        <div class="text-danger form-help text-left">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Description</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-32 mt-3 xl:mt-0 flex-1">
                                    <textarea name="description" id="description" rows="5" class="editor">{{ old('description', $product->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="text-danger form-help text-left">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END: Product Detail -->
                <!-- BEGIN: Product Management -->
                <div class="intro-y box p-5 mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Product Management
                        </div>
                        <div class="mt-5">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Product Status</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3"> Jika statusnya aktif,
                                            produk dapat dicari oleh calon pembeli. </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <div class="form-check form-switch">
                                        <input id="status" name="status" class="form-check-input" type="checkbox"
                                            {{ old('status', $product->status ?? '') == 'Active' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Product Management -->

                <!-- BEGIN: Uplaod Product -->
                <div class="intro-y box p-5  mt-5">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                        <div
                            class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Video Product
                        </div>
                        <div id="formContainer" class="mt-5">
                            @foreach ($product->thumbnail as $key => $thumbnail)
                                <div
                                    class="mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400 pb-5 group-thumbnail">
                                    {{-- Thumbnail Preview --}}
                                    <div class="form-inline items-start flex-col xl:flex-row mt-10">
                                        <div class="form-label w-full xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Thumbnail</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                            <div class="grid grid-cols-10 gap-5 pl-4 pr-5 preview-thumbnail">
                                                <div class="w-40 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                                    <img class="rounded-md" alt="Preview Image"
                                                        src="{{ asset('/assets/images/product/' . $thumbnail) }}">
                                                    <div title="Remove this image?"
                                                        class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2 remove-thumbnail">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18"></line>
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18"></line>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                                                <i data-lucide="image" class="w-4 h-4 mr-2"></i>
                                                <span class="text-primary mr-1">Upload a file</span> or drag and drop
                                                <input type="file" name="thumbnail_existing[]" accept="image/*"
                                                    class="thumbnail-input w-full h-full top-0 left-0 absolute opacity-0"
                                                    onchange="previewImagethumbnail(event)">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- URL Input --}}
                                    <div
                                        class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                        <div class="form-label xl:w-64 xl:!mr-10">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">URL</div>
                                                    <div
                                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                        Required
                                                    </div>
                                                </div>
                                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                                    Masukkan URL embed yang valid. Contoh: YouTube embed atau dokumen.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mt-3 xl:mt-0 flex-1">
                                            @php
                                                $urlValue = old('url.' . $key, $product->url[$key] ?? '');
                                                if (is_array($urlValue)) {
                                                    $urlValue = implode(',', $urlValue);
                                                }
                                            @endphp
                                            <input name="url[]" type="text" class="form-control" placeholder="URL"
                                                value="{{ $urlValue }}">
                                            @error('url.' . $key)
                                                <div class="text-danger form-help text-left">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Remove Button --}}
                                    <div class="flex justify-end mt-3">
                                        <button type="button"
                                            class="removeBtn px-4 py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="thumbnail_existing_hidden[]" value="{{ $thumbnail }}">
                            @endforeach
                        </div>

                    </div>
                    <button href="#" class="btn py-2 px-4 btn-outline-secondary w-full md:w-24 text-xs"
                        id="tambahBtn" type="button"><i data-lucide="plus"></i></button>
                </div>
                <!-- END: Uplaod Product -->
                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                    <a href="/dashboard/product"
                        class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">
                        Cancel
                    </a>
                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
                </div>
            </form>
        </div>
        <div class="intro-y col-span-2 hidden 2xl:block">
            <div class="pt-10 sticky top-0">
                <ul
                    class="text-slate-500 relative before:content-[''] before:w-[2px] before:bg-slate-200 before:dark:bg-darkmode-600 before:h-full before:absolute before:left-0 before:z-[-1]">
                    <li class="mb-4 border-l-2 pl-5 border-primary dark:border-primary text-primary font-medium"> <a
                            href="">Product
                            Information</a> </li>
                    <li class="mb-4 border-l-2 pl-5 border-transparent dark:border-transparent"> <a href="">Upload
                            Product</a> </li>
                    <li class="mb-4 border-l-2 pl-5 border-transparent dark:border-transparent"> <a href="">Product
                            Detail</a> </li>
                    <li class="mb-4 border-l-2 pl-5 border-transparent dark:border-transparent"> <a href="">Product
                            Management</a> </li>
                </ul>
                <div
                    class="mt-10 bg-warning/20 dark:bg-darkmode-600 border border-warning dark:border-0 rounded-md relative p-5">
                    <i data-lucide="lightbulb" class="w-12 h-12 text-warning/80 absolute top-0 right-0 mt-5 mr-3"></i>
                    <h2 class="text-lg font-medium">
                        Tips
                    </h2>
                    <div class="mt-5 font-medium"></div>
                    <div class="leading-relaxed text-xs mt-2 text-slate-600 dark:text-slate-500">
                        <div>Format gambar adalah .jpg .jpeg .png dan ukuran minimal 300 x 300 piksel (Untuk gambar optimal
                            gunakan ukuran minimal 700 x 700 piksel).</div>
                        <div class="mt-2">Pilih foto produk atau drag and drop hingga 5 foto sekaligus di sini.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.getElementById('tambahBtn').addEventListener('click', function() {
            // Mendapatkan container form
            var formContainer = document.getElementById('formContainer');
            var index = formContainer.children.length; // Mendapatkan jumlah form yang sudah ada

            // Membuat elemen baru untuk ditambahkan
            var newForm = `
                <div class="mt-5 pt-5 border-t border-slate-200/60 dark:border-darkmode-400 pb-5">
                     <div class="form-inline items-start flex-col xl:flex-row mt-10">
                                <div class="form-label w-full xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Thumbnail</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                    <div class="grid grid-cols-10 gap-5 pl-4 pr-5 preview-thumbnail">
                                        <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                                    </div>
                                    <div class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                                        <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span
                                            class="text-primary mr-1">Upload
                                            a file</span> or drag and drop
                                        <input id="thumbnail" type="file" name="thumbnail[]" multiple accept="image/*"
                                            class="thumbnail-input w-full h-full top-0 left-0 absolute opacity-0"
                                            onchange="previewImagethumbnail(event)" value="{{ old('thumbnail') }}">
                                    </div>
                                </div>
                                @error('thumbnail')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">URL</div>
                                            <div
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Required</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                            <div>Masukkan URL yang valid dan pastikan link tersebut adalah link embed, agar
                                                konten dapat diintegrasikan langsung di halaman produk.</div>
                                            <div class="mt-2">Contoh URL embed bisa berupa video, dokumen, atau konten
                                                interaktif lainnya.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="url" name="url[]" type="text" class="form-control"
                                        placeholder="URL" value="{{ old('url') }}">
                                    @error('url')
                                        <div class="text-danger form-help text-left">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="flex justify-end mt-3">
                                <button type="button" class="removeBtn px-4 py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition">
                                    Hapus
                                </button>
                            </div>
                </div>
                `;

            // Menyisipkan form baru ke dalam container
            formContainer.insertAdjacentHTML('beforeend', newForm);

            // Tambahkan event listener untuk tombol hapus
            updateRemoveEvent();
            updateImagePreviewEvents();
        });


        // Fungsi untuk update event listener pada tombol hapus
        function updateRemoveEvent() {
            document.querySelectorAll('.removeBtn').forEach(button => {
                button.addEventListener('click', function() {
                    // Menghapus elemen pembungkus utama yang berisi semua field input
                    this.closest('.mt-5').remove();
                });
            });
        }

        const productname = document.querySelector('#productname');
        const slug = document.querySelector('#slug');
        let timeout = null;

        productname.addEventListener('input', function() {
            clearTimeout(timeout); // Hapus timeout sebelumnya

            if (productname.value.trim() === '') {
                // Jika productname kosong, hapus slug
                slug.value = '';
            } else {
                // Jika ada nilai pada productname, lakukan fetch
                timeout = setTimeout(() => {
                    fetch('/dashboard/product/checkslug?productname=' + encodeURIComponent(productname
                            .value))
                        .then(response => response.json())
                        .then(data => slug.value = data.slug)
                        .catch(error => console.error('Error fetching slug:', error));
                }, 300); // Menunggu 300ms setelah pengguna berhenti mengetik sebelum mengirim permintaan
            }
        });
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons(); // Memuat ikon dengan atribut data-lucide
        });

        // Fungsi untuk menampilkan pratinjau gambar yang diunggah
        function previewImage(event) {
            const previewContainer = document.getElementById("preview-container0");


            const files = Array.from(event.target.files); // Ambil file yang diunggah
            console.log(files); // Log untuk melihat apakah file terdeteksi

            files.forEach((file, index) => {
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        console.log("File dibaca:", e.target
                            .result); // Log untuk memastikan file dibaca dengan benar

                        const imagePreview = document.createElement("div");
                        imagePreview.className =
                            "col-span-5 md:col-span-2 h-28 relative image-fit cursor-pointer zoom-in";
                        imagePreview.id = `preview-${index}`; // Berikan ID unik berdasarkan index

                        imagePreview.innerHTML = `
                        <img class="rounded-md" alt="Preview Image" src="${e.target.result}" style="width: 100%; height: auto;">
                        <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreview(${index})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    `;
                        previewContainer.appendChild(imagePreview);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // ✅ Preview gambar baru sebelum upload
        function previewNewImage(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById("preview-container0");

            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement("div");
                    div.classList.add("col-span-5", "md:col-span-2", "h-28", "relative", "image-fit",
                        "cursor-pointer", "zoom-in");
                    div.innerHTML = `
                    <img class="rounded-md" alt="New Image Preview" src="${e.target.result}" style="width: 100%; height: auto;">
                    <div class="remove-btn tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="this.parentElement.remove()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>`;
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }

        // Fungsi untuk menghapus pratinjau gambar lama
        function removeExistingImage(index, imageName) {
            const previewContainer = document.getElementById("preview-container0");
            const imagePreview = document.getElementById(`existing-preview-${index}`);
            if (imagePreview) {
                previewContainer.removeChild(imagePreview);
            }

            // Tambahkan gambar yang dihapus ke input hidden
            const deletedImagesInput = document.getElementById('deleted_images');

            // Pisahkan dengan koma atau tambahkan sebagai array (gunakan format array di HTML)
            let deletedImagesArray = deletedImagesInput.value ? deletedImagesInput.value.split(',') : [];
            deletedImagesArray.push(imageName); // Tambahkan gambar yang dihapus
            deletedImagesInput.value = deletedImagesArray.join(','); // Gabungkan kembali sebagai string
        }

        function removePreview(index) {
            const previewContainer = document.getElementById("preview-container0");
            const imagePreview = document.getElementById(`preview-${index}`);
            if (imagePreview) {
                previewContainer.removeChild(imagePreview); // Hapus pratinjau gambar berdasarkan index
            }
        }

        function updateImagePreviewEvents() {
            document.querySelectorAll('.thumbnail-input').forEach(input => {
                input.removeEventListener('change', handleImagePreview); // pastikan tidak double
                input.addEventListener('change', handleImagePreview);
            });
        }

        function handleImagePreview(event) {
            const input = event.target;
            const previewContainer = input.closest('.form-inline').querySelector('.preview-thumbnail');
            previewContainer.innerHTML = '';

            const files = input.files;
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imagePreview = document.createElement("div");
                    imagePreview.className = "w-40 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";
                    imagePreview.innerHTML = `
                     <img class="rounded-md" alt="Preview Image" src="${e.target.result}">
                <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2 remove-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>`;
                    // Tambahkan event click untuk tombol hapus ❌
                    imagePreview.querySelector('.remove-thumbnail').addEventListener('click', () => {
                        imagePreview.remove();
                    });
                    previewContainer.appendChild(imagePreview);
                };
                reader.readAsDataURL(file);
            });


        }

        document.querySelectorAll('.remove-thumbnail').forEach(btn => {
            btn.addEventListener('click', function() {
                const imageWrapper = this.closest('.image-fit');
                // tandai input hidden-nya sebagai "null" atau "remove"
                const hiddenInput = imageWrapper.parentElement.querySelector('.thumbnail-hidden');
                if (hiddenInput) {
                    hiddenInput.value = ''; // atau 'remove'
                }
                // hapus tampilan gambar
                imageWrapper.remove();
            });
        });


        // Inisialisasi untuk form pertama
        updateRemoveEvent();
        updateImagePreviewEvents();


        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.removeBtn').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.group-thumbnail').remove();
                });
            });
        });
    </script>
@endpush
