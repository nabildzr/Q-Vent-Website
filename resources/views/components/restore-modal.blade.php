@props(['id', 'action', 'title' => 'Konfirmasi Restore', 'message' => 'Apakah Anda yakin ingin mengembalikan data ini?'])

<div class="modal fade" id="restoreModal-{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <p>{{ $message }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ $action }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Ya, Restore</button>
                </form>
            </div>
        </div>
    </div>
</div>
