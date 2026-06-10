<div class="toast-container position-fixed bottom-0 end-0 p-3" aria-live="polite" aria-atomic="true">
    @if (session('status'))
        <div class="toast align-items-center text-bg-success border-0" role="status" data-autoshow>
            <div class="d-flex">
                <div class="toast-body">{{ session('status') }}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Tutup notifikasi"></button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="toast align-items-center text-bg-danger border-0" role="alert" data-autoshow>
            <div class="d-flex">
                <div class="toast-body">{{ session('error') }}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Tutup notifikasi"></button>
            </div>
        </div>
    @endif
</div>
