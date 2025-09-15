@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Dashboard</x-slot:title>
            <x-slot:icon>solar:home-smile-angle-outline</x-slot:icon>
        </x-breadcrumb>

        {{-- Alert --}}
        @if (session('alert'))
            <div id="auto-alert"
                class="alert alert-warning bg-warning-100 text-warning-600 border-warning-100 px-24 py-11 mb-14 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between"
                role="alert">
                <div class="d-flex align-items-center gap-2">
                    <iconify-icon icon="mdi:alert-circle-outline" class="icon text-xl"></iconify-icon>
                    {{ session('alert.message') }}
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const alert = document.getElementById('auto-alert');
                    if (alert) {
                        setTimeout(() => {
                            alert.style.transition = "opacity 0.5s ease-out";
                            alert.style.opacity = '0';
                            setTimeout(() => alert.remove(), 500);
                        }, 3000);
                    }
                });
            </script>
        @endif

        {{-- Cards --}}
        <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-1 h-100">
                    <div class="card-body p-20 d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Event Selesai</p>
                            <h6 class="mb-0">{{ $countEventDone }}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:check-decagram" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-2 h-100">
                    <div class="card-body p-20 d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Event Aktif</p>
                            <h6 class="mb-0">{{ $countEventActive }}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-clock" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-3 h-100">
                    <div class="card-body p-20 d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Event Ongoing</p>
                            <h6 class="mb-0">{{ $countEventOngoing }}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:progress-clock" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-none border bg-gradient-start-4 h-100">
                    <div class="card-body p-20 d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Event</p>
                            <h6 class="mb-0">{{ $countAllEvent }}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:calendar-multiple" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
            @can('isSuperAdmin')
                <div class="col">
                    <div class="card shadow-none border bg-gradient-start-5 h-100">
                        <div class="card-body p-20 d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div>
                                <p class="fw-medium text-primary-light mb-1">Total Admin</p>
                                <h6 class="mb-0">{{ $countAdmins }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="mdi:account-tie" class="text-white text-2xl mb-0"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>

        {{-- Table --}}
        <div class="row gy-4 mt-1">
            <div class="col-xxl-7 col-xl-12">
                <div class="card h-100">
                    <div class="card-body p-24">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <ul class="nav border-gradient-tab nav-pills" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="pill"
                                        href="#upcoming">Upcoming</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#ongoing">Ongoing</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#past">Past</a></li>
                            </ul>
                            <a href="{{ route('admin.event.index') }}"
                                class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                                View All <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="upcoming">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table sm-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Start</th>
                                                <th>End</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($eventUpcoming as $event)
                                                <tr>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d F Y H:i') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d F Y H:i') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">No upcoming events</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ongoing">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table sm-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Start</th>
                                                <th>End</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($eventOngoing as $event)
                                                <tr>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d F Y H:i') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d F Y H:i') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">No ongoing events</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="past">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table sm-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Start</th>
                                                <th>End</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($eventPast as $event)
                                                <tr>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d F Y H:i') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d F Y H:i') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">No past events</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right side card --}}
            @can('isSuperAdmin')
                <div class="col-xxl-5 col-xl-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                                <h6 class="fw-bold text-lg mb-0">Admin Terbaru</h6>
                                <a href="{{ route('admin.user.index') }}"
                                    class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                                    View All <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                                </a>
                            </div>
                            <div class="mt-32">
                                @forelse($latestAdmins as $admin)
                                    <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="w-40-px h-40-px rounded-circle bg-neutral-200 d-flex justify-content-center align-items-center me-12">
                                                <iconify-icon icon="mdi:account" class="text-secondary-light"></iconify-icon>
                                            </div>
                                            <div>
                                                <h6 class="text-md mb-0 fw-medium">{{ $admin->name }}</h6>
                                                <span
                                                    class="text-sm text-secondary-light fw-medium">{{ $admin->email }}</span>
                                            </div>
                                        </div>
                                        <span class="text-primary-light text-sm flex-shrink-0">
                                            {{ $admin->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                @empty
                                    <p class="text-center text-muted mb-0">No admin found</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection

@push('afterAppScripts')
    <script src="{{ asset('assets/js/homeOneChart.js') }}"></script>
@endpush
