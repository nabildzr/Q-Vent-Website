@extends('layouts.layout')

@section('title', $isEdit ? 'Edit Kategori Event' : 'Tambah Kategori Event')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>{{ $isEdit ? 'Edit Kategori Event' : 'Tambah Kategori Event' }}</x-slot:title>
            <x-slot:icon>iconamoon:category-light</x-slot:icon>
        </x-breadcrumb>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $isEdit ? 'Edit Kategori' : 'Tambah Kategori' }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ $isEdit ? route('admin.event_category.update', $category->id) : route('admin.event_category.store') }}"
                        method="POST" class="row gy-3 needs-validation" novalidate>
                        @csrf
                        @if ($isEdit)
                            @method('PUT')
                        @endif

                        <div class="col-md-6">
                            <label class="form-label">Nama Kategori</label>
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="material-symbols:category-outline"></iconify-icon>
                                </span>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $category->name) }}" required placeholder="Contoh: Webinar">
                                @error('name')
                                    <div style="color:red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary-600" type="submit">
                                {{ $isEdit ? 'Update' : 'Simpan' }}
                            </button>
                            <a href="{{ route('admin.event_category.index') }}" class="btn btn-danger-600">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
