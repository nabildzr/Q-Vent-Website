@extends('layouts.layout')

@section('title', 'Daftar Event')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Daftar Event</x-slot:title>
            <x-slot:icon>solar:calendar-add-broken</x-slot:icon>
        </x-breadcrumb>

        @if (session('success'))
            <div style="color: green">{{ session('success') }}</div>
        @endif

        <div class="card basic-data-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Event</h5>
                <a href="{{ route('admin.event.create') }}" class="btn btn-primary-600 radius-8 px-16 py-9">+ Tambah Event</a>
            </div>
            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Event Category</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>Banner</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ Str::limit($event->title, 10) }}</td>
                                <td>{{ Str::limit($event->description, 10) }}</td>
                                <td>{{ Str::limit($event->location, 10) }}</td>
                                <td>{{ $event->eventCategory->name ?? '-' }}</td>
                                <td>{{ $event->createdBy->name ?? '-' }}</td>
                                <td>
                                    <span class="badge {{ $event->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </td>
                                <td>{{ $event->start_date }}</td>
                                <td>
                                    @if ($event->banner)
                                        <img src="{{ asset('storage/' . $event->banner) }}" alt="Banner" height="40">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.event.edit', $event->id) }}"
                                        class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>
                                    <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus event ini?')" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">Belum ada event.</td>
                            </tr>
                        @endforelse
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
