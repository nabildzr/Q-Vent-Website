@extends('layouts.layout')

@section('title', 'Custom Input Registrasi')

@section('content')
    <div class="dashboard-main-body">
        <x-breadcrumb>
            <x-slot:title>Custom Input Registrasi</x-slot:title>
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
                                    @if ($field === 'input_first_name')
                                        <input class="form-check-input" type="checkbox" name="{{ $field }}"
                                            id="{{ $field }}" checked disabled>
                                        <input type="hidden" name="{{ $field }}" value="1">
                                    @else
                                        <input class="form-check-input" type="checkbox" name="{{ $field }}"
                                            id="{{ $field }}"
                                            {{ isset($defaultInputs->$field)
                                                ? ($defaultInputs->$field
                                                    ? 'checked'
                                                    : '')
                                                : (!in_array($field, $offByDefault)
                                                    ? 'checked'
                                                    : '') }}>
                                    @endif
                                </div>
                            </label>
                        </div>
                    @endforeach
                    <div class="col-md-6 mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            Tampilkan QR Setelah Registrasi
                            <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                <input class="form-check-input" type="checkbox" id="show_qr_toggle" name="show_qr"
                                    value="1" {{ $defaultInputs->show_qr ? 'checked' : '' }}>
                            </div>
                        </label>
                    </div>
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
                                    <option value="select" {{ $input->type == 'select' ? 'selected' : '' }}>Select (Satu
                                        Pilihan)</option>
                                    <option value="select_multiple"
                                        {{ $input->type == 'select_multiple' ? 'selected' : '' }}>Select (Banyak Pilihan)
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

                            @if ($input->type == 'select' || $input->type == 'select_multiple')
                                <div class="col-md-12 mt-13">
                                    <input type="text" name="custom_inputs[{{ $input->id }}][options]"
                                        value="{{ $input->options }}" class="form-control"
                                        placeholder="Pisahkan opsi dengan koma, contoh: Pria, Wanita, Lainnya">
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
                <div class="px-3 pb-3">
                    <button type="button" class="btn btn-outline-primary-600 radius-8 px-20 py-11 w-100"
                        onclick="addCustomInput()">+ Tambah
                        Input</button>
                    <button class="btn btn-success mt-12" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<!-- Modal Konfirmasi Simpan -->
<div class="modal fade" id="saveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header">
                <h5 class="modal-title">Simpan Perubahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menyimpan perubahan input registrasi?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button id="confirmSave" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Input -->
<div class="modal fade" id="deleteInputModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Input</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="deleteInputMessage">Apakah Anda yakin ingin menghapus input ini?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button id="confirmDeleteInput" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Clear All -->
<div class="modal fade" id="clearAllModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Semua Input</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus semua input?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button id="confirmClearAll" class="btn btn-danger">Hapus Semua</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Reset -->
<div class="modal fade" id="resetModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header">
                <h5 class="modal-title">Reset Input</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mereset input ke kondisi awal?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button id="confirmReset" class="btn btn-primary">Reset</button>
            </div>
        </div>
    </div>
</div>

@section('beforeAppScripts')
    <script>
        let deletedInputIds = [];
        let targetRowToDelete = null;
        let originalHTML = '';
        let customInputIndex = 999;

        document.addEventListener('DOMContentLoaded', () => {
            const emailCheckbox = document.getElementById('input_email');
            const phoneCheckbox = document.getElementById('input_phone_number');
            const showQrToggle = document.getElementById('show_qr_toggle');

            function updateShowQrState() {
                const emailActive = emailCheckbox.checked;
                const phoneActive = phoneCheckbox.checked;

                if (!emailActive && !phoneActive) {
                    // Kalau email & phone OFF, paksa show QR ON & disable
                    showQrToggle.checked = true;
                    showQrToggle.disabled = true;
                } else {
                    // Kalau salah satu ada, bisa di ON/OFF
                    showQrToggle.disabled = false;
                }

                // Jika email/phone baru saja diaktifkan, matikan show QR otomatis
                if (emailActive || phoneActive) {
                    showQrToggle.checked = false;
                }
            }

            emailCheckbox.addEventListener('change', updateShowQrState);
            phoneCheckbox.addEventListener('change', updateShowQrState);

            // Jalankan sekali saat load page
            updateShowQrState();
        });

        // Konfirmasi simpan
        document.getElementById('confirmSave').addEventListener('click', function() {
            document.getElementById('input-form').submit();
        });

        // Tambah custom input baru
        function addCustomInput() {
            const container = document.getElementById('custom-input-container');
            const group = document.createElement('div');
            group.classList.add('row', 'mb-3', 'custom-input-group');
            group.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="custom_inputs[new_${customInputIndex}][name]" class="form-control" placeholder="Nama Input">
            </div>
            <div class="col-md-3">
                <select name="custom_inputs[new_${customInputIndex}][type]" class="form-select" onchange="toggleOptionsField(this, ${customInputIndex})">
                    <option value="text">Text</option>
                    <option value="number">Number</option>
                    <option value="date">Date</option>
                    <option value="textarea">Textarea</option>
                    <option value="file">File Upload</option>
                    <option value="select">Select (Satu Pilihan)</option>
                    <option value="select_multiple">Select (Banyak Pilihan)</option>
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
            <div class="col-md-12 mt-2 d-none" id="options-field-${customInputIndex}">
                <input type="text" 
                    name="custom_inputs[new_${customInputIndex}][options]" 
                    class="form-control"
                    placeholder="Pisahkan opsi dengan koma, contoh: Pria, Wanita, Lainnya">
            </div>
        `;
            container.appendChild(group);
            customInputIndex++;
        }

        function toggleOptionsField(select, index) {
            const field = document.getElementById(`options-field-${index}`);
            if (select.value === 'select' || select.value === 'select_multiple') {
                field.classList.remove('d-none');
            } else {
                field.classList.add('d-none');
            }
        }

        function removeInputRow(button) {
            targetRowToDelete = button.closest('.custom-input-group');
            new bootstrap.Modal(document.getElementById('deleteInputModal')).show();
        }

        document.getElementById('confirmDeleteInput').addEventListener('click', function() {
            if (targetRowToDelete) {
                const nameAttr = targetRowToDelete.querySelector('input, select')?.getAttribute('name');
                const match = nameAttr?.match(/\[([^\]]+)\]/);

                if (match) {
                    const rawId = match[1];
                    if (!isNaN(rawId)) {
                        deletedInputIds.push(rawId);
                        updateDeletedIdsInput();
                    }
                }
                targetRowToDelete.remove();
            }
            bootstrap.Modal.getInstance(document.getElementById('deleteInputModal')).hide();
        });

        function clearAllInputs() {
            new bootstrap.Modal(document.getElementById('clearAllModal')).show();
        }

        document.getElementById('confirmClearAll').addEventListener('click', function() {
            const container = document.getElementById('custom-input-container');
            container.querySelectorAll('.custom-input-group').forEach(row => row.remove());
            deletedInputIds = [];
            updateDeletedIdsInput();
            bootstrap.Modal.getInstance(document.getElementById('clearAllModal')).hide();
        });

        // Reset input ke kondisi awal
        function resetInputs() {
            new bootstrap.Modal(document.getElementById('resetModal')).show();
        }

        document.getElementById('confirmReset').addEventListener('click', function() {
            const container = document.getElementById('custom-input-container');
            container.innerHTML = originalHTML;
            deletedInputIds = [];
            updateDeletedIdsInput();
            bootstrap.Modal.getInstance(document.getElementById('resetModal')).hide();
        });

        // Update hidden input deleted ids
        function updateDeletedIdsInput() {
            document.getElementById('deleted_input_ids').value = deletedInputIds.join(',');
        }
    </script>
@endsection
