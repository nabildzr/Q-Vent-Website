@extends('layouts.layout')

@section('title', $isEdit ? 'Edit Event' : 'Tambah Event')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>{{ $isEdit ? 'Edit Event' : 'Tambah Event' }}</x-slot:title>
            <x-slot:icon>solar:calendar-add-broken</x-slot:icon>
        </x-breadcrumb>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $isEdit ? 'Edit Event' : 'Tambah Event' }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ $isEdit ? route('admin.event.update', $event->id) : route('admin.event.store') }}"
                        method="POST" enctype="multipart/form-data" class="row gy-3 needs-validation" novalidate>
                        @csrf
                        @if ($isEdit)
                            @method('PUT')
                        @endif

                        <div class="col-md-6">
                            <label class="form-label">Judul</label>
                            <input type="text" name="title" value="{{ old('title', $event->title) }}"
                                class="form-control" required>
                            @error('title')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Kategori</label>
                            <select name="event_category_id" class="form-select" required>
                                <option value="">Pilih Kategori</option>
                                @foreach (\App\Models\EventCategory::all() as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ old('event_category_id', $event->event_category_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('event_category_id')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="location" value="{{ old('location', $event->location) }}"
                                class="form-control" required>
                            @error('location')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="start_date" value="{{ old('start_date', $event->start_date) }}"
                                class="form-control" required>
                            @error('start_date')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ old('description', $event->description) }}</textarea>
                            @error('description')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="">Pilih Status</option>
                                <option value="active" {{ old('status', $event->status) == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="done" {{ old('status', $event->status) == 'done' ? 'selected' : '' }}>Done
                                </option>
                                <option value="cancelled"
                                    {{ old('status', $event->status) == 'cancelled' ? 'selected' : '' }}>Cancellad</option>
                            </select>
                            @error('status')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Administrator Event</label>
                            <select name="created_by" class="form-select" required>
                                <option value="">Pilih Administrator Event</option>
                                @foreach (\App\Models\User::where('role', 'admin')->get() as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('created_by', $event->created_by) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('created_by')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="card h-100 p-0">
                                <div class="card-header border-bottom bg-base py-16 px-24">
                                    <h6 class="text-lg fw-semibold mb-0">Image Upload</h6>
                                </div>
                                <div class="card-body p-24">
                                    <div class="upload-image-wrapper d-flex align-items-center gap-3">
                                        <div
                                            class="uploaded-img d-none position-relative h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                            <button type="button"
                                                class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex">
                                                <iconify-icon icon="radix-icons:cross-2"
                                                    class="text-xl text-danger-600"></iconify-icon>
                                            </button>
                                            <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover"
                                                src="#" alt="image">
                                        </div>

                                        <label
                                            class="upload-file h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                            for="upload-file">
                                            <iconify-icon icon="solar:camera-outline"
                                                class="text-xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light">Upload</span>
                                            <input id="upload-file" type="file" name="banner" hidden>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $event->banner) }}" height="100" alt="Banner"
                                    id="photo-preview" class="img-fluid img-thumbnail photo-preview"
                                    style="{{ $event->banner ? '' : 'display:none;' }};
                                        max-width: 300px;
                                        max-height: 150px;
                                        margin-top: 10px;
                                    " />

                            </div>
                        </div>

                        <script>
                            // preview while creating/updating (upload)
                            function previewPhoto(event) {
                                const input = event.target;
                                const preview = document.getElementById('photo-preview');
                                const inputText = document.getElementById('input-text');
                                if (input.files && input.files[0]) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        preview.src = e.target.result;
                                        preview.style.display = 'block';
                                        inputText.style.display = 'block';
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                } else {
                                    preview.src = '#';
                                    preview.style.display = 'none';
                                    preview.style.display = 'none';
                                }
                            }

                            function previewImage(event) {
                                const input = event.input
                                const preview = document.getElementById('photo-preview')
                                if (input.files && input.files[0]) {
                                    const reader = new FileReader()
                                    reader.onload = (e) => {
                                        preview.src = e.target.result;
                                        preview.style.display = 'block'
                                    }
                                    reader.readAsDataURL(input.files[0])
                                } else {
                                    preview.src = ''
                                    preview.style.display = 'none'
                                }
                            }
                        </script>

                        <div class="col-md-12">
                            <label class="form-label">Admin Pendamping (boleh lebih dari 1)</label>
                            <div class="row">
                                @foreach ($users as $user)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="admins[]"
                                                value="{{ $user->id }}" id="adminCheck{{ $user->id }}"
                                                {{ in_array($user->id, old('admins', $event->admins->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="adminCheck{{ $user->id }}">
                                                {{ $user->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('admins')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="card h-100 p-0">
                                <div class="card-header border-bottom bg-base py-16 px-24">
                                    <h6 class="text-lg fw-semibold mb-0">Upload With image preview</h6>
                                </div>
                                <div class="card-body p-24">
                                    <div class="upload-image-wrapper d-flex align-items-center gap-3 flex-wrap">
                                        <div class="uploaded-imgs-container d-flex gap-3 flex-wrap"></div>

                                        <label
                                            class="upload-file-multiple h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                            for="upload-file-multiple">
                                            <iconify-icon icon="solar:camera-outline"
                                                class="text-xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light">Upload</span>
                                            <input id="upload-file-multiple" type="file" name="photos[]" multiple
                                                hidden>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary-600"
                                type="submit">{{ $isEdit ? 'Update' : 'Simpan' }}</button>
                            <a href="{{ route('admin.event.index') }}" class="btn btn-danger-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('beforeAppScripts')
<script>
    // Banner (Single)
    const fileInput = document.getElementById("upload-file");
    const imagePreview = document.getElementById("uploaded-img__preview");
    const uploadedImgContainer = document.querySelector(".uploaded-img");
    const removeButton = document.querySelector(".uploaded-img__remove");

    fileInput?.addEventListener("change", (e) => {
        if (e.target.files.length) {
            const src = URL.createObjectURL(e.target.files[0]);
            imagePreview.src = src;
            uploadedImgContainer.classList.remove('d-none');
        }
    });
    removeButton?.addEventListener("click", () => {
        imagePreview.src = "";
        uploadedImgContainer.classList.add('d-none');
        fileInput.value = "";
    });

    // Foto Tambahan (Multiple)
    const fileInputMultiple = document.getElementById("upload-file-multiple");
    const uploadedImgsContainer = document.querySelector(".uploaded-imgs-container");

    fileInputMultiple?.addEventListener("change", (e) => {
        const files = e.target.files;

        Array.from(files).forEach(file => {
            const src = URL.createObjectURL(file);

            const imgContainer = document.createElement('div');
            imgContainer.classList.add('position-relative', 'h-120-px', 'w-120-px', 'border', 'input-form-light', 'radius-8', 'overflow-hidden', 'border-dashed', 'bg-neutral-50');

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('uploaded-img__remove', 'position-absolute', 'top-0', 'end-0', 'z-1', 'text-2xxl', 'line-height-1', 'me-8', 'mt-8', 'd-flex');
            removeButton.innerHTML = '<iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>';

            const imagePreview = document.createElement('img');
            imagePreview.classList.add('w-100', 'h-100', 'object-fit-cover');
            imagePreview.src = src;

            imgContainer.appendChild(removeButton);
            imgContainer.appendChild(imagePreview);
            uploadedImgsContainer.appendChild(imgContainer);

            removeButton.addEventListener('click', () => {
                URL.revokeObjectURL(src);
                imgContainer.remove();
            });
        });

        // Clear file input agar bisa upload file yang sama lagi
        fileInputMultiple.value = '';
    });
</script>
@endsection
