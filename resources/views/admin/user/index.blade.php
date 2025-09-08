@extends('layouts.layout')

@section('title', 'Daftar User')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Daftar User</x-slot:title>
            <x-slot:icon>solar:shield-user-broken</x-slot:icon>
        </x-breadcrumb>

        @include('layouts.feedback')

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar User</h5>
                @can('isSuperAdmin')
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary-600 radius-8 px-16 py-9">+ Tambah
                        User</a>
                @endcan
            </div>
            <div class="card-body">
                <div style="overflow-x: auto;">
                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        @can('isSuperAdmin')
                                            <a href="{{ route('admin.user.edit', $user->id) }}"
                                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon
                                                    icon="lucide:edit"></iconify-icon></a>
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                                                class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach

                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="5">Belum ada user.</td>
                                </tr>
                            @endif
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
            order: false,
        });
    </script>
@endsection
