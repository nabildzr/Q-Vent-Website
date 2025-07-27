@if (session('success'))
    <div class="alert alert-success bg-success-100 text-success-600 border-success-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-12 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
        role="alert">
        <div class="d-flex align-items-center gap-2">
            <iconify-icon icon="akar-icons:double-check" class="icon text-xl"></iconify-icon>
            {{ session('success') }}
        </div>
        <button class="remove-button text-success-600 text-xxl line-height-1"> <iconify-icon
                icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-12 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
        role="alert">
        <div class="d-flex align-items-center gap-2">
            <iconify-icon icon="akar-icons:cross" class="icon text-xl"></iconify-icon>
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
        <button class="remove-button text-danger-600 text-xxl line-height-1"> <iconify-icon
                icon="iconamoon:sign-times-light" class="icon"></iconify-icon></button>
    </div>
@endif