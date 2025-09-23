@extends('layouts.layout')

@section('title', 'Trash Attendees')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Trash Attendees</x-slot:title>
            <x-slot:icon>solar:trash-bin-trash-bold</x-slot:icon>
        </x-breadcrumb>

        @include('layouts.feedback')

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Event Terhapus</h5>
            </div>
            <div class="card-body">
                <div style="overflow-x: auto;">
                    <table class="table bordered-table mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul Event</th>
                                <th>Kategori</th>
                                <th>Dibuat Oleh</th>
                                <th>Dihapus Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->eventCategory->name ?? '-' }}</td>
                                    <td>{{ $event->createdBy->name ?? '-' }}</td>
                                    <td>{{ $event->deleted_at ?? 'Event Belom Di Hapus' }}</td>
                                    <td>
                                        <a href="{{ route('admin.trash.attendees.show', $event->id) }}" type="button"
                                            class="btn rounded-pill btn-primary-100 text-primary-600 radius-8 px-14 py-6 text-sm">
                                            Daftar Attendee
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="1">Tidak ada attendees terhapus.</td>
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
