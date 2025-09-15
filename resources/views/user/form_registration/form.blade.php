<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Registrasi - {{ $event->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registration-form.css') }}">
</head>

<body>

    <div class="container">
        @if ($event->banner)
            <div class="form-banner">
                <img src="{{ URL::temporarySignedRoute('protected.file', now()->addMinutes(3), ['token' => encrypt($event->banner)]) }}"
                    alt="Banner {{ $event->title }}">
            </div>
        @endif

        <div class="form-body">
            <h2 class="mb-4">Form Registrasi: {{ $event->title }}</h2>

            <form action="{{ route('registration.submit', ['link' => $event->registrationLink->link]) }}" method="POST"
                enctype="multipart/form-data" id="form-registrasi">
                @csrf

                {{-- Error Message --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>⚠ Terjadi Kesalahan:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Default Inputs --}}
                @foreach ($defaultInputs as $input)
                    <div class="mb-3">
                        <label>{{ $input['label'] }}</label>
                        <input type="{{ $input['type'] }}" name="{{ $input['name'] }}"
                            {{ $input['required'] ? 'required' : '' }} value="{{ old($input['name']) }}">
                        @error($input['name'])
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach

                {{-- Custom Inputs --}}
                @foreach ($customInputs as $input)
                    <div class="mb-3">
                        <label>{{ $input->name }}</label>

                        @if ($input->type === 'textarea')
                            <textarea name="custom[{{ $input->name }}]" {{ $input->is_required ? 'required' : '' }}>{{ old('custom.' . $input->name) }}</textarea>
                        @elseif ($input->type === 'select')
                            <select name="custom[{{ $input->name }}]" {{ $input->is_required ? 'required' : '' }}>
                                <option value="">-- Pilih --</option>
                                @foreach ($input->options as $option)
                                    <option value="{{ $option }}"
                                        {{ old('custom.' . $input->name) == $option ? 'selected' : '' }}>
                                        {{ $option }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="{{ $input->type }}" name="custom[{{ $input->name }}]"
                                {{ $input->is_required ? 'required' : '' }}
                                value="{{ old('custom.' . $input->name) }}">
                        @endif

                        @error('custom.' . $input->name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach

                <button type="submit" class="btn" id="btn-submit">
                    <span class="btn-text">Kirim</span>
                    <span class="spinner d-none">
                        <i class="fa fa-spinner fa-spin"></i>
                    </span>
                </button>
            </form>
        </div>

        <script>
            document.getElementById('form-registrasi').addEventListener('submit', function(e) {
                // cek dulu validasi HTML5
                if (!this.checkValidity()) {
                    return; // kalau form ada yg kosong required, jangan loading
                }

                const btn = document.getElementById('btn-submit');
                btn.disabled = true;
                btn.querySelector('.btn-text').innerText = "Loading...";
                btn.querySelector('.spinner').classList.remove('d-none');
            });
        </script>

    </div>

</body>

</html>
