@extends('layouts.layout')

@section('title', 'Daftar Kategori Event')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Daftar Kategori Event</x-slot:title>
            <x-slot:icon>iconamoon:category-light</x-slot:icon>
        </x-breadcrumb>

        @include('layouts.feedback')

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
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
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
                                    <a href="#" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <button type="submit" class="inline-block" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $category->id }}">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </a>
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


    @foreach ($categories as $category)
        <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1"
            aria-labelledby="deleteModalLabel-{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content radius-16 bg-base">
                    <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                        <h1 class="modal-title fs-5" id="deleteModalLabel-{{ $category->id }}">Hapus Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-24">
                        <div class="d-flex flex-column gap-8">
                            <p>Apakah Anda yakin ingin menghapus kategori "{{ $category->name }}"?</p>
                        </div>
                    </div>
                    <div class="modal-footer py-16 px-24 border border-top-0 border-start-0 border-end-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('admin.event_category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('beforeAppScripts')
    <script>
        let table = new DataTable('#dataTable');
    </script>
@endsection
