@extends('layouts.layout')

@section('title', 'Daftar Event')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Daftar Event</x-slot:title>
            <x-slot:icon>solar:calendar-add-broken</x-slot:icon>
        </x-breadcrumb>

        @include('layouts.feedback')

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Event</h5>
                <a href="{{ route('admin.event.create') }}" class="btn btn-primary-600 radius-8 px-16 py-9">+ Tambah Event</a>
            </div>
            <div class="card-body">
                <div style="overflow-x: auto;">
                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10' style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Event Category</th>
                                <th>Created By</th>
                                <th>Start Date</th>
                                <th>Banner</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td class="text-truncate" style="max-width: 120px;" title="{{ $event->title }}">
                                        {{ Str::limit($event->title, 15) }}</td>
                                    <td class="text-truncate" style="max-width: 120px;"
                                        title="{{ $event->eventCategory->name ?? '-' }}">
                                        {{ Str::limit($event->eventCategory->name ?? '-', 15) }}</td>
                                    <td class="text-truncate" style="max-width: 120px;"
                                        title="{{ $event->createdBy->name ?? '-' }}">
                                        {{ Str::limit($event->createdBy->name ?? '-', 15) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('l, d F Y H:i') }}</td>
                                    <td>
                                        @if ($event->banner)
                                            <img src="{{ asset('storage/' . $event->banner) }}" alt="Banner"
                                                class="object-fit-cover rounded" style="height: 30px; width: 30px;">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="@if ($event->status === 'active') bg-success-focus text-success-600
                                            @elseif ($event->status === 'done') bg-primary-100 text-primary-600
                                            @elseif ($event->status === 'cancelled') bg-danger-focus text-danger-600
                                            @else bg-secondary text-secondary-600 @endif
                                            px-16 py-6 rounded-pill fw-semibold text-xs">
                                            {{ ucfirst($event->status) }}
                                        </span>
                                    </td>
                                    <td class="d-flex gap-1">
                                        {{-- Tombol lihat selalu tampil --}}
                                        <a href="{{ route('admin.event.show', $event->id) }}"
                                            class="w-32-px h-32-px bg-primary-100 text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center"
                                            title="Lihat Detail">
                                            <iconify-icon icon="lucide:eye"></iconify-icon>
                                        </a>

                                        {{-- Tombol edit hanya untuk user yang boleh update --}}
                                        @can('update', $event)
                                            <a href="{{ route('admin.event.edit', $event->id) }}"
                                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                                title="Edit">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </a>
                                        @endcan

                                        {{-- Tombol hapus hanya untuk user yang boleh delete --}}
                                        @can('delete', $event)
                                            <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                                    title="Hapus">
                                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="1">Belum ada event.</td>
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
