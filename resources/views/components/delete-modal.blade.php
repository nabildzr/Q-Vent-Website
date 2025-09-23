<div class="modal fade" id="deleteModal-{{ $id }}" tabindex="-1"
    aria-labelledby="deleteModalLabel-{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header py-16 px-24 border-0">
                <h1 class="modal-title fs-5" id="deleteModalLabel-{{ $id }}">
                    {{ $title ?? 'Konfirmasi Hapus' }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-24">
                <p>{{ $message ?? 'Apakah Anda yakin ingin menghapus item ini secara permanen?' }}</p>
            </div>
            <div class="modal-footer py-16 px-24 border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ $action }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        {{ $buttonText ?? 'Hapus Permanen' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>