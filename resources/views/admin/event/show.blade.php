@extends('layouts.layout')

@section('title', 'Detail Event')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Detail Event</x-slot:title>
            <x-slot:icon>solar:calendar-broken</x-slot:icon>
        </x-breadcrumb>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Detail Event: {{ $event->title }}</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.event.edit', $event->id) }}"
                        class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"
                        title="Edit">
                        <iconify-icon icon="lucide:edit"></iconify-icon>
                    </a>
                    <a href="{{ route('admin.event.index') }}"
                        class="w-32-px h-32-px bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                        title="Kembali">
                        <iconify-icon icon="lucide:arrow-left"></iconify-icon>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Judul</label>
                        <p class="mb-0">{{ $event->title }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Kategori</label>
                        <p class="mb-0">{{ $event->eventCategory->name ?? '-' }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Start Date</label>
                        <p class="mb-0">{{ $event->start_date }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Lokasi</label>
                        <p class="mb-0">{{ $event->location }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Dibuat Oleh</label>
                        <p class="mb-0">{{ $event->createdBy->name ?? '-' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Status</label>
                        <p class="mb-0">
                            <span
                                class="@if ($event->status === 'active') bg-success-focus text-success-600
                                     @elseif ($event->status === 'done') bg-primary-100 text-primary-600
                                     @elseif ($event->status === 'cancelled') bg-danger-focus text-danger-600
                                     @else bg-secondary text-secondary-600 @endif
                                     px-16 py-6 rounded-pill fw-semibold text-xs">
                                {{ ucfirst($event->status) }}
                            </span>
                        </p>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Registration Link</label>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0">
                                {{ $event->registrationLink->link ?? '-' }}
                            </p>
                            <div class="d-flex align-items-center gap-2">
                                <button
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                    data-bs-toggle="modal" data-bs-target="#editLinkModal">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </button>
                                <a href="#x" type="button"
                                    class="btn rounded-pill btn-danger-100 text-danger-600 radius-8 px-14 py-6 text-sm">Edit
                                    Form
                                    Input</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="fw-semibold text-muted">Deskripsi</label>
                        <div class="border rounded p-3 bg-light">{{ $event->description }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Banner</label><br>
                        @if ($event->banner)
                            <img src="{{ asset('storage/' . $event->banner) }}" alt="Banner"
                                class="rounded shadow-sm img-fluid mt-2 clickable-image"
                                style="max-height: 200px; cursor: zoom-in;">
                        @else
                            <p class="text-muted">Tidak ada banner</p>
                        @endif
                    </div>

                    @php
                        $maxAdmins = 6;
                        $totalAdmins = $event->admins->count();
                    @endphp

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Administrator</label>
                        @if ($totalAdmins > 0)
                            <div class="d-flex flex-wrap gap-2 mt-2" style="max-width: 100%;">
                                @foreach ($event->admins->take($maxAdmins) as $admin)
                                    <div class="d-flex align-items-center gap-2 px-2 py-1 rounded bg-light"
                                        style="flex: 0 0 calc(50% - 4px); max-width: calc(50% - 4px);">
                                        <iconify-icon icon="lucide:user" class="text-primary"
                                            style="font-size: 18px;"></iconify-icon>
                                        <span class="text-truncate" style="max-width: 140px;">{{ $admin->name }}</span>
                                    </div>
                                @endforeach

                                @if ($totalAdmins > $maxAdmins)
                                    <button type="button" class="btn btn-outline-primary btn-sm mt-1"
                                        data-bs-toggle="modal" data-bs-target="#adminModal">
                                        +{{ $totalAdmins - $maxAdmins }} lainnya
                                    </button>
                                @endif
                            </div>
                        @else
                            <p class="text-muted mt-2">Tidak ada Administrator</p>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label class="fw-semibold text-muted">Foto Tambahan</label><br>
                        @if ($event->eventPhotos && $event->eventPhotos->count())
                            <div class="d-flex flex-wrap gap-2 mt-2">
                                @foreach ($event->eventPhotos as $photo)
                                    <img src="{{ asset('storage/' . $photo->photo) }}" alt="Photo"
                                        class="rounded shadow-sm clickable-image"
                                        style="height: 100px; width: 150px; object-fit: cover; cursor: zoom-in;">
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted mt-2">Tidak ada foto tambahan</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal untuk preview gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <img src="" id="modalImage" class="img-fluid rounded" alt="Preview">
        </div>
    </div>
</div>

<!-- Modal Semua Administrator -->
<div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Complete List of Administrators</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    @foreach ($event->admins as $admin)
                        <div class="list-group-item d-flex align-items-center gap-2">
                            <iconify-icon icon="lucide:user" class="text-primary"></iconify-icon>
                            <span>{{ $admin->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Registration Link -->
<div class="modal fade" id="editLinkModal" tabindex="-1" aria-labelledby="editLinkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        @if ($event->registrationLink)
            <form method="POST"
                action="{{ route('admin.event.registration-link.update', $event->registrationLink->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLinkModalLabel">Edit Registration Link</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" name="link" class="form-control" id="link"
                                value="{{ $event->registrationLink->link ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="valid_until" class="form-label">Valid Until</label>
                            <input type="date" name="valid_until" class="form-control" id="valid_until"
                                value="{{ optional($event->registrationLink->valid_until)->format('Y-m-d') }}"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        @else
            <div class="alert alert-warning">Registration link belum dibuat untuk event ini.</div>
        @endif
    </div>
</div>


@section('beforeAppScripts')
    <script>
        // Saat gambar diklik, tampilkan modal dan ubah src
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.clickable-image').forEach(function(img) {
                img.addEventListener('click', function() {
                    document.getElementById('modalImage').src = this.src;
                    let modal = new bootstrap.Modal(document.getElementById('imageModal'));
                    modal.show();
                });
            });
        });
    </script>
@endsection
