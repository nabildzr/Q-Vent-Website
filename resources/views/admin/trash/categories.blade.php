@extends('layouts.layout')

@section('title', 'Trash Categories')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Trash Categories</x-slot:title>
            <x-slot:icon>solar:trash-bin-minimalistic-broken</x-slot:icon>
        </x-breadcrumb>

        @include('layouts.feedback')

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Kategori Event Terhapus</h5>
            </div>
            <div class="card-body">
                <div style="overflow-x: auto;">
                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kategori</th>
                                <th>Deleted At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->deleted_at->format('d M Y H:i') }}</td>
                                    <td class="d-flex gap-1">
                                        <form
                                            action="{{ route('admin.trash.restore', ['type' => 'categories', 'id' => $category->id]) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            <button type="button"
                                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                                data-bs-toggle="modal" data-bs-target="#restoreModal-{{ $category->id }}"
                                                title="Restore">
                                                <iconify-icon icon="mdi:restore"></iconify-icon>
                                            </button>
                                        </form>

                                        <button type="button"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $category->id }}"
                                            title="Hapus Permanen">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </td>
                                </tr>
                                {{-- Modal --}}
                                <x-delete-modal 
                                    :id="$category->id"
                                    :action="route('admin.trash.forceDelete', ['type' => 'categories', 'id' => $category->id])"
                                    title="Hapus Permanen Kategori"
                                    :message="'Apakah Anda yakin ingin menghapus permanen kategori ' . $category->name . '?'"
                                />
                                {{-- Modal Restore --}}
                                <x-restore-modal
                                    :id="$category->id"
                                    :action="route('admin.trash.restore', ['type' => 'categories', 'id' => $category->id])"
                                    title="Restore Kategori"
                                    :message="'Apakah Anda yakin ingin merestore kategori ' . $category->name . '?'"
                                />
                            @empty
                                <tr>
                                    <td colspan="1">Tidak ada kategori di trash.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('beforeAppScripts')
    <script>
        let table = new DataTable('#dataTable', {
            order: [[0, 'desc']]
        });
    </script>
@endsection
