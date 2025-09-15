@extends('layouts.layout')

@section('title', 'Edit Attendee')

@section('content')
<div class="dashboard-main-body">
    <x-breadcrumb>
        <x-slot:title>Edit Attendee</x-slot:title>
        <x-slot:icon>lucide:edit</x-slot:icon>
    </x-breadcrumb>

    @include('layouts.feedback')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Attendee</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.attendee.update', $attendee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control"
                        value="{{ old('first_name', $attendee->first_name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control"
                        value="{{ old('last_name', $attendee->last_name) }}">
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                        value="{{ old('phone_number', $attendee->phone_number) }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $attendee->email) }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
