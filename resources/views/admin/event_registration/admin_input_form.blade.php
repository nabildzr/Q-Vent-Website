@extends('layouts.layout')

@section('title', 'Pengaturan Input Registrasi')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Pengaturan Input Registrasi</x-slot:title>
            <x-slot:icon>solar:settings-broken</x-slot:icon>
        </x-breadcrumb>

        <form action="{{ route('admin.event.input.update', $event->id) }}" method="POST" id="input-form">
            {{-- CSRF token untuk keamanan --}}
            @csrf
            <input type="hidden" id="deleted_input_ids" name="deleted_input_ids" value="">

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Default Input</strong>
                    <a href="{{ route('admin.event.show', $event->id) }}"
                        class="w-32-px h-32-px bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                        title="Kembali">
                        <iconify-icon icon="lucide:arrow-left"></iconify-icon>
                    </a>
                </div>

                <div class="card-body row">
                    @php
                        $defaultFields = [
                            'input_document' => 'Dokumen',
                            'input_first_name' => 'Nama Depan',
                            'input_last_name' => 'Nama Belakang',
                            'input_email' => 'Email',
                            'input_phone_number' => 'No HP',
                        ];
                    @endphp

                    @foreach ($defaultFields as $field => $label)
                        <div class="col-md-6 mb-3">
                            <label class="form-label d-flex justify-content-between align-items-center">
                                {{ $label }}
                                <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="checkbox" name="{{ $field }}"
                                        id="{{ $field }}" {{ $defaultInputs->$field ? 'checked' : '' }}>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Custom Input</strong>
                    <div>
                        <button type="button" class="btn btn-sm btn-secondary me-2" onclick="resetInputs()">Reset</button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="clearAllInputs()">Clear All</button>
                    </div>
                </div>

                <div class="card-body" id="custom-input-container">
                    @foreach ($customInputs as $input)
                        <div class="row mb-3 custom-input-group">
                            <input type="hidden" name="custom_inputs[{{ $input->id }}][status]" value="0">
                            <div class="col-md-4">
                                <input type="text" name="custom_inputs[{{ $input->id }}][name]"
                                    value="{{ $input->name }}" class="form-control" placeholder="Nama Input">
                            </div>
                            <div class="col-md-3">
                                <select name="custom_inputs[{{ $input->id }}][type]" class="form-select">
                                    <option value="text" {{ $input->type == 'text' ? 'selected' : '' }}>Text</option>
                                    <option value="number" {{ $input->type == 'number' ? 'selected' : '' }}>Number</option>
                                    <option value="date" {{ $input->type == 'date' ? 'selected' : '' }}>Date</option>
                                    <option value="textarea" {{ $input->type == 'textarea' ? 'selected' : '' }}>Textarea
                                    </option>
                                    <option value="file" {{ $input->type == 'file' ? 'selected' : '' }}>File Upload
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-5 mt-6">
                                <div class="d-flex align-items-center justify-content-start gap-2">
                                    <div class="form-switch switch-primary d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox"
                                            name="custom_inputs[{{ $input->id }}][status]" value="1"
                                            {{ $input->status ? 'checked' : '' }}>
                                    </div>
                                    <button type="button"
                                        class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                        onclick="removeInputRow(this)">
                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="px-3 pb-3">
                    <button type="button" class="btn btn-outline-primary-600 radius-8 px-20 py-11 w-100"
                        onclick="addCustomInput()">+ Tambah
                        Input</button>
                    <button class="btn btn-success mt-12" type="submit">Simpan Pengaturan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('beforeAppScripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let customInputIndex = 999;
        let deletedInputIds = [];
        let originalHTML = ''; // untuk reset

        document.addEventListener('DOMContentLoaded', () => {
            // Simpan kondisi awal untuk reset
            const container = document.getElementById('custom-input-container');
            originalHTML = container.innerHTML;
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif

        function addCustomInput() {
            const container = document.getElementById('custom-input-container');
            const group = document.createElement('div');
            group.classList.add('row', 'mb-3', 'custom-input-group');
            group.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="custom_inputs[new_${customInputIndex}][name]" class="form-control" placeholder="Nama Input">
            </div>
            <div class="col-md-3">
                <select name="custom_inputs[new_${customInputIndex}][type]" class="form-select">
                    <option value="text">Text</option>
                    <option value="number">Number</option>
                    <option value="date">Date</option>
                    <option value="textarea">Textarea</option>
                    <option value="file">File Upload</option>
                </select>
            </div>
            <div class="col-md-3 mt-6">
                <div class="d-flex align-items-center justify-content-start gap-2">
                    <div class="form-switch switch-primary d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" name="custom_inputs[new_${customInputIndex}][status]" value="1" checked>
                    </div>
                    <button type="button"
                        class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                        onclick="removeInputRow(this)">
                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                    </button>
                </div>
            </div>
        `;
            container.appendChild(group);
            customInputIndex++;
        }

        function removeInputRow(button) {
            Swal.fire({
                text: 'Yakin ingin menghapus input ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const row = button.closest('.custom-input-group');
                    const nameAttr = row.querySelector('input, select')?.getAttribute('name');
                    const match = nameAttr?.match(/\[([^\]]+)\]/);

                    if (match) {
                        const rawId = match[1];
                        if (!isNaN(rawId)) {
                            deletedInputIds.push(rawId);
                            updateDeletedIdsInput();
                        }
                    }

                    row.remove();
                }
            });
        }

        function clearAllInputs() {
            Swal.fire({
                text: 'Yakin ingin menghapus SEMUA input?',
                text: 'Tindakan ini tidak dapat dibatalkan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus semua',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const container = document.getElementById('custom-input-container');
                    const inputs = container.querySelectorAll('.custom-input-group');

                    inputs.forEach(row => {
                        const nameAttr = row.querySelector('input, select')?.getAttribute('name');
                        const match = nameAttr?.match(/\[([^\]]+)\]/);
                        if (match) {
                            const rawId = match[1];
                            if (!isNaN(rawId)) {
                                deletedInputIds.push(rawId);
                            }
                        }
                        row.remove();
                    });

                    updateDeletedIdsInput();

                    Swal.fire('Berhasil!', 'Semua input berhasil dihapus.', 'success');
                }
            });
        }

        function resetInputs() {
            Swal.fire({
                text: 'Yakin ingin mereset input ke kondisi awal?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, reset',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const container = document.getElementById('custom-input-container');
                    container.innerHTML = originalHTML;
                    deletedInputIds = [];
                    updateDeletedIdsInput();

                    Swal.fire('Berhasil!', 'Input berhasil direset.', 'success');
                }
            });
        }

        function updateDeletedIdsInput() {
            document.getElementById('deleted_input_ids').value = deletedInputIds.join(',');
        }

        document.getElementById('input-form').addEventListener('submit', function(e) {
            e.preventDefault(); // blokir submit dulu

            Swal.fire({
                title: 'Simpan Pengaturan?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.submit();
                }
            });
        });
    </script>

@endsection
