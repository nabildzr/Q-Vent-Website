@extends('layouts.layout')

@section('title', 'Trash Attendees - ' . $event->title)

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Trash Attendees ({{ $event->title }})</x-slot:title>
            <x-slot:icon>solar:trash-bin-trash-bold</x-slot:icon>
        </x-breadcrumb>

        @include('layouts.feedback')

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Peserta Terhapus</h5>
                <a href="{{ route('admin.trash.attendees.index') }}"
                    class="w-32-px h-32-px bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                    title="Kembali">
                    <iconify-icon icon="lucide:arrow-left"></iconify-icon>
                </a>
            </div>
            <div class="card-body">
                <div style="overflow-x: auto;">
                    <table class="table bordered-table mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Dihapus Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($attendees as $attendee)
                                <tr>
                                    <td>{{ $attendee->id }}</td>
                                    <td>{{ $attendee->first_name . ' ' . $attendee->last_name }}</td>
                                    <td>{{ $attendee->email ?? '-' }}</td>
                                    <td>{{ $attendee->phone_number ?? '-' }}</td>
                                    <td>{{ $attendee->deleted_at->format('d M Y H:i') }}</td>
                                    <td class="d-flex gap-1">
                                        <form
                                            action="{{ route('admin.trash.restore', ['type' => 'attendees', 'id' => $attendee->id]) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            <button type="button"
                                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                                data-bs-toggle="modal" data-bs-target="#restoreModal-{{ $attendee->id }}"
                                                title="Restore">
                                                <iconify-icon icon="mdi:restore"></iconify-icon>
                                            </button>
                                        </form>

                                        <button type="button"
                                            class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $attendee->id }}"
                                            title="Hapus Permanen">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </td>
                                </tr>
                                {{-- Modal --}}
                                <x-delete-modal 
                                    :id="$attendee->id" 
                                    :action="route('admin.trash.forceDelete', ['type' => 'attendees', 'id' => $attendee->id])"
                                    title="Hapus Permanen Attendee"
                                    :message="'Apakah Anda yakin ingin menghapus permanen attendee ' . $attendee->first_name . ' ' . $attendee->last_name . '?'"
                                />
                                {{-- Modal Restore --}}
                                <x-restore-modal
                                    :id="$attendee->id"
                                    :action="route('admin.trash.restore', ['type' => 'attendees', 'id' => $attendee->id])"
                                    title="Restore Attendee"
                                    :message="'Apakah Anda yakin ingin merestore attendee ' . $attendee->first_name . ' ' . $attendee->last_name . '?'"
                                />
                            @empty
                                <tr>
                                    <td colspan="6">Tidak ada attendee terhapus.</td>
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
