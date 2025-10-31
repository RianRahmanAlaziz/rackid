<!-- BEGIN: Modal Content -->
<div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">New Document</h2>
                <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"
                        aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal"
                            class="w-5 h-5 text-slate-500"></i> </a>
                </div>
            </div> <!-- END: Modal Header -->
            <form action="/dashboard/document" method="post" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12"> <label for="nfile"
                            class="block text-sm font-medium text-gray-700 mt-2">Nama
                        </label>
                        <input id="nfile" name="nfile" type="text" class="form-control"
                            value="{{ old('nfile') }}" placeholder="Nama File">
                        @error('nfile')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <div class="mt-3">
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input id="brosur" class="form-check-input" type="radio" name="category"
                                        value="brosur">
                                    <label class="form-check-label" for="brosur">Brosur</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input id="datasheet" class="form-check-input" type="radio" name="category"
                                        value="datasheet">
                                    <label class="form-check-label" for="datasheet">Datasheet</label>
                                </div>
                                @error('category')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label for="file" class="form-label">Upload File</label>
                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                            <div class="flex flex-wrap px-4 cursor-pointer" id="preview-file">
                                <!-- Pratinjau Gambar Akan Ditambahkan di Sini Secara Dinamis -->
                            </div>
                            <div class="px-4 pb-4 flex items-center relative cursor-pointer">
                                <i data-lucide="image" class="w-4 h-4 mr-2 cursor-pointer"></i>
                                <span class="text-primary mr-1 cursor-pointer">Upload a file</span>
                                or drag and
                                drop
                                <input id="input" name="file" type="file" accept=".pdf,.doc,.docx"
                                    class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                    onchange="previewFile(event)" value="{{ old('file') }}">
                            </div>
                        </div>
                        @error('file')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <button type="submit"
                        class="btn btn-primary w-20">Send</button>
                </div>
                <!-- END: Modal Footer -->
            </form>
        </div>
    </div>
</div>
<!-- END: Modal Content -->

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons(); // Ini akan memuat ikon dengan atribut data-lucide
        });

        // Fungsi untuk menampilkan pratinjau file yang diunggah Datasheet
        function previewFile(event) {
            const previewContainer = document.getElementById("preview-file");
            previewContainer.innerHTML = ""; // Kosongkan container jika ada pratinjau sebelumnya

            const file = event.target.files[0]; // Hanya 1 file yang bisa diunggah
            const fileType = file.type;

            if (fileType === 'application/pdf' || fileType === 'application/msword' || fileType ===
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                const fileIcon = fileType === 'application/pdf' ? 'PDF' : 'DOC/DOCX';

                const filePreview = document.createElement("div");
                filePreview.className =
                    "file w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in";

                filePreview.innerHTML = `
                   <div class="w-3/5 file__icon file__icon--file mx-auto">
                <div class="file__icon__file-name">${fileIcon}</div>
                </div>
                 
                <div title="Remove this file?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2" onclick="removePreviewfile()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <a href="" class="block font-medium mt-4 text-center truncate">${file.name}</a>
            `;
                previewContainer.appendChild(filePreview);
            }
        }

        function removePreviewfile() {
            const previewContainer = document.getElementById("preview-file");
            previewContainer.innerHTML = ""; // Hapus pratinjau file
            document.getElementById("file").value = ""; // Reset input file
        }
    </script>
@endpush
