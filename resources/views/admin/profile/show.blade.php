@extends('layouts.layout')

@section('title', 'Profile - ' . $user->name)

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Profile</x-slot:title>
            <x-slot:icon>solar:shield-user-broken</x-slot:icon>
        </x-breadcrumb>

        @include('layouts.feedback')

        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                    <img src="{{ asset('assets/images/user-grid/user-grid-bg1.png') }}" alt=""
                        class="w-100 object-fit-cover">
                    <div class="pb-24 ms-16 mb-24 me-16 mt--100">
                        <div
                            class="d-flex flex-column align-items-center justify-content-center text-center border border-top-0 border-start-0 border-end-0">
                            @php
                                $avatarUrl = $user->avatar_url
                                    ? $user->avatar_url
                                    : 'https://ui-avatars.com/api/?name=' . urlencode($user->name);
                            @endphp
                            <img src="{{ $avatarUrl }}" alt="Profile"
                                class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover"
                                onerror="this.onerror=null;this.src='{{ asset('assets/images/user.png') }}';">
                            <h6 class="mb-0 mt-16">{{ $user->name }}</h6>
                            <span class="text-secondary-light mb-16">{{ $user->email }}</span>
                        </div>
                        <div class="mt-24">
                            <h6 class="text-xl mb-16">Personal Info</h6>
                            <ul>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Full Name</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $user->name }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $user->email }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Phone Number</span>
                                    <span class="w-70 text-secondary-light fw-medium">:
                                        {{ $user->phone_number ?? '-' }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Role</span>
                                    <span class="w-70 text-secondary-light fw-medium">:
                                        {{ ucwords(str_replace('_', ' ', $user->role)) }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body p-24">
                        <div class="text-center mb-24">
                            <img src="{{ $avatarUrl }}" alt="Profile"
                                class="w-36 h-36 rounded-full border-4 border-white shadow-lg object-cover"
                                onerror="this.onerror=null; this.src='{{ asset('assets/images/user.png') }}';">
                        </div>

                        <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center px-24 active" id="pills-edit-profile-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab"
                                    aria-controls="pills-edit-profile" aria-selected="true">
                                    Edit Profile
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center px-24" id="pills-change-password-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-change-password" type="button"
                                    role="tab" aria-controls="pills-change-password" aria-selected="false">
                                    Change Password
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel"
                                aria-labelledby="pills-edit-profile-tab">
                                <form action="{{ route('admin.profile.update') }}" method="POST" class="row g-3">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Full Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $user->name) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Phone</label>
                                        <input type="text" name="phone_number" class="form-control"
                                            value="{{ old('phone_number', $user->phone_number) }}">
                                    </div>

                                    <div class="col-12 d-flex justify-content-end gap-2 mt-3">
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="pills-change-password" role="tabpanel"
                                aria-labelledby="pills-change-password-tab">
                                <form action="{{ route('admin.profile.password') }}" method="POST" class="row g-3 mt-3">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Current Password</label>
                                        <div class="input-group">
                                            <input type="password" name="current_password" class="form-control pe-5" required
                                                id="current_password">
                                            <span class="input-group-text bg-white border-start-0" style="cursor:pointer; margin-left:-40px; z-index:10;" onclick="togglePassword('current_password', this)">
                                                <span class="iconify" data-icon="mdi:eye" data-width="20"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">New Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" class="form-control pe-5" required
                                                id="new_password">
                                            <span class="input-group-text bg-white border-start-0" style="cursor:pointer; margin-left:-40px; z-index:10;" onclick="togglePassword('new_password', this)">
                                                <span class="iconify" data-icon="mdi:eye" data-width="20"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" class="form-control pe-5" required
                                                id="password_confirmation">
                                            <span class="input-group-text bg-white border-start-0" style="cursor:pointer; margin-left:-40px; z-index:10;" onclick="togglePassword('password_confirmation', this)">
                                                <span class="iconify" data-icon="mdi:eye" data-width="20"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end gap-2 mt-3">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('beforeAppScripts')
    <script>
        function togglePassword(fieldId, iconWrapper) {
            const input = document.getElementById(fieldId);
            const icon = iconWrapper.querySelector('.iconify');

            if (input.type === "password") {
                input.type = "text";
                icon.setAttribute('data-icon', 'mdi:eye-off');
            } else {
                input.type = "password";
                icon.setAttribute('data-icon', 'mdi:eye');
            }
        }
    </script>
@endsection
