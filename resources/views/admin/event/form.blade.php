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
                                <option value="active" {{ old('status', $event->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="done" {{ old('status', $event->status) == 'done' ? 'selected' : '' }}>Done</option>
                                <option value="cancelled" {{ old('status', $event->status) == 'cancelled' ? 'selected' : '' }}>Cancellad</option>
                            </select>
                            @error('status')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pembuat</label>
                            <select name="created_by" class="form-select" required>
                                <option value="">Pilih Pembuat</option>
                                @foreach (\App\Models\User::all() as $user)
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

                        <div class="col-md-12">
                            <label class="form-label">Banner (optional)</label>
                            <input type="file" name="banner" class="form-control">
                            @if ($isEdit && $event->banner)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $event->banner) }}" height="100" alt="Banner">
                                </div>
                            @endif
                            @error('banner')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary-600" type="submit">{{ $isEdit ? 'Update' : 'Simpan' }}</button>
                            <a href="{{ route('admin.event.index') }}" class="btn btn-danger-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
