@extends('layouts.layout')

@section('title', 'Daftar Kategori Event')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Daftar Kategori Event</x-slot:title>
            <x-slot:icon>material-symbols:category-search-outline-rounded</x-slot:icon>
        </x-breadcrumb>

        @if (session('success'))
            <div class="alert alert-success bg-success-100 text-success-600 border-success-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-12 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
                role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="akar-icons:double-check" class="icon text-xl"></iconify-icon>
                    {{ session('success') }}
                </div>
                <button class="remove-button text-success-600 text-xxl line-height-1"> <iconify-icon
                        icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
            </div>
        @endif

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Kategori</h5>
                <a href="{{ route('admin.event_category.create') }}" class="btn btn-primary-600 radius-8 px-16 py-9">+
                    Tambah Kategori</a>
            </div>
            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('admin.event_category.edit', $category->id) }}"
                                        class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>
                                    <form action="{{ route('admin.event_category.destroy', $category->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                        class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($categories->isEmpty())
                            <tr>
                                <td colspan="3">Belum ada kategori event.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let table = new DataTable('#dataTable');
    </script>
@endsection
