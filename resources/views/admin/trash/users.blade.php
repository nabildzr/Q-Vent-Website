@extends('layouts.layout')

@section('title', 'Trash Users')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Trash Users</x-slot:title>
            <x-slot:icon>solar:trash-bin-minimalistic-broken</x-slot:icon>
        </x-breadcrumb>

        @include('layouts.feedback')

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">User Terhapus</h5>
            </div>
            <div class="card-body">
                <div style="overflow-x: auto;">
                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Role</th>
                                <th>Deleted At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone ?? '-' }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>{{ $user->deleted_at->format('d M Y H:i') }}</td>
                                    <td class="d-flex gap-1">
                                        {{-- Restore --}}
                                        <form
                                            action="{{ route('admin.trash.restore', ['type' => 'users', 'id' => $user->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="button"
                                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                                data-bs-toggle="modal" data-bs-target="#restoreModal-{{ $user->id }}"
                                                title="Restore">
                                                <iconify-icon icon="mdi:restore"></iconify-icon>
                                            </button>
                                        </form>

                                        <button type="button"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $user->id }}"
                                            title="Hapus Permanen">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </td>
                                </tr>
                                {{-- Modal --}}
                                <x-delete-modal :id="$user->id" :action="route('admin.trash.forceDelete', ['type' => 'users', 'id' => $user->id])" title="Hapus Permanen User"
                                    :message="'Apakah Anda yakin ingin menghapus permanen user ' . $user->name . '?'" />
                                {{-- Modal Restore --}}
                                <x-restore-modal :id="$user->id" :action="route('admin.trash.restore', ['type' => 'users', 'id' => $user->id])" title="Restore User"
                                    :message="'Apakah Anda yakin ingin merestore user ' . $user->name . '?'" />
                            @empty
                                <tr>
                                    <td colspan="7">Tidak ada user di trash.</td>
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
        let table = new DataTable('#dataTable');
    </script>
@endsection
