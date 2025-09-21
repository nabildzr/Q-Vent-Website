@extends('layouts.layout')

@section('title', 'Trash Event')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Trash Event</x-slot:title>
            <x-slot:icon>solar:trash-bin-minimalistic-broken</x-slot:icon>
        </x-breadcrumb>

        @include('layouts.feedback')

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Event Terhapus</h5>
            </div>
            <div class="card-body">
                <div style="overflow-x: auto;">
                    <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Event Category</th>
                                <th>Created By</th>
                                <th>Start Date</th>
                                <th>Deleted At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td class="text-truncate" style="max-width: 120px;" title="{{ $event->title }}">
                                        {{ Str::limit($event->title, 15) }}
                                    </td>
                                    <td class="text-truncate" style="max-width: 120px;"
                                        title="{{ $event->eventCategory->name ?? '-' }}">
                                        {{ Str::limit($event->eventCategory->name ?? '-', 15) }}
                                    </td>
                                    <td class="text-truncate" style="max-width: 120px;"
                                        title="{{ $event->createdBy->name ?? '-' }}">
                                        {{ Str::limit($event->createdBy->name ?? '-', 15) }}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('l, d F Y H:i') }}
                                    </td>
                                    <td>{{ $event->deleted_at->format('d M Y H:i') ?? '-' }}</td>
                                    <td class="d-flex gap-1">
                                        {{-- Restore --}}
                                        <form
                                            action="{{ route('admin.trash.restore', ['type' => 'events', 'id' => $event->id]) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            <button type="button"
                                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                                data-bs-toggle="modal" data-bs-target="#restoreModal-{{ $event->id }}"
                                                title="Restore">
                                                <iconify-icon icon="mdi:restore"></iconify-icon>
                                            </button>
                                        </form>

                                        <button type="button"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $event->id }}"
                                            title="Hapus Permanen">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </td>
                                </tr>
                                {{-- Modal --}}
                                <x-delete-modal 
                                    :id="$event->id" 
                                    :action="route('admin.trash.forceDelete', ['type' => 'events', 'id' => $event->id])"
                                    title="Hapus Permanen Event"
                                    :message="'Apakah Anda yakin ingin menghapus permanen event ' . $event->title . '?'"
                                />
                                {{-- Modal Restore --}}
                                <x-restore-modal 
                                    :id="$event->id" 
                                    :action="route('admin.trash.restore', ['type' => 'events', 'id' => $event->id])"
                                    title="Restore Event"
                                    :message="'Apakah Anda yakin ingin merestore event ' . $event->title . '?'"
                                />
                            @empty
                                <tr>
                                    <td colspan="7">Tidak ada event di trash.</td>
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
