<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Registrasi - {{ $event->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans px-4 py-8 md:px-6">

    <div class="max-w-2xl mx-auto">
        @if ($event->banner)
            <div class="mb-6 rounded-xl overflow-hidden shadow-md">
                <img src="{{ URL::temporarySignedRoute('protected.file', now()->addMinutes(3), ['token' => encrypt($event->banner)]) }}"
                    alt="Banner {{ $event->title }}"
                    class="w-full h-56 object-cover object-center transition-transform duration-300 hover:scale-[1.02]">
            </div>
        @endif

        <div
            class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-200 border-t-8 border-blue-500 p-6 md:p-8">
            <h2 class="text-2xl font-medium text-gray-800 mb-6">Form Registrasi: {{ $event->title }}</h2>

            <form action="{{ route('registration.submit', ['link' => $event->registrationLink->link]) }}" method="POST"
                enctype="multipart/form-data" id="form-registrasi" class="space-y-6">
                @csrf

                {{-- Error Message --}}
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm shadow-sm">
                        <strong class="font-semibold">⚠ Terjadi Kesalahan:</strong>
                        <ul class="list-disc pl-6 mt-2 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Default Inputs --}}
                @foreach ($defaultInputs as $input)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ $input['label'] }}</label>
                        <input type="{{ $input['type'] }}" name="{{ $input['name'] }}"
                            {{ $input['required'] ? 'required' : '' }} value="{{ old($input['name']) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none placeholder-gray-400" />
                        @error($input['name'])
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

                {{-- Custom Inputs --}}
                @foreach ($customInputs as $input)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ $input->name }}</label>

                        @if ($input->type === 'textarea')
                            <textarea name="custom[{{ $input->name }}]" {{ $input->is_required ? 'required' : '' }}
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none placeholder-gray-400">{{ old('custom.' . $input->name) }}</textarea>
                        @elseif ($input->type === 'select')
                            @php $choices = array_map('trim', explode(',', $input->options ?? '')); @endphp
                            <select name="custom[{{ $input->name }}]" {{ $input->is_required ? 'required' : '' }}
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none">
                                <option value="">-- Pilih --</option>
                                @foreach ($choices as $choice)
                                    @if ($choice !== '')
                                        <option value="{{ $choice }}"
                                            {{ old('custom.' . $input->name) == $choice ? 'selected' : '' }}>
                                            {{ $choice }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        @elseif ($input->type === 'select_multiple')
                            @php
                                $choices = array_map('trim', explode(',', $input->options ?? ''));
                                $oldValues = old('custom.' . $input->name, []);
                            @endphp
                            <div class="flex flex-wrap gap-3">
                                @foreach ($choices as $choice)
                                    @if ($choice !== '')
                                        <label class="flex items-center space-x-2">
                                            <input type="checkbox" name="custom[{{ $input->name }}][]"
                                                value="{{ $choice }}"
                                                {{ in_array($choice, $oldValues) ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">{{ $choice }}</span>
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <input type="{{ $input->type }}" name="custom[{{ $input->name }}]"
                                {{ $input->is_required ? 'required' : '' }}
                                value="{{ old('custom.' . $input->name) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none placeholder-gray-400" />
                        @endif

                        @error('custom.' . $input->name)
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

                <button type="submit"
                    class="w-full flex justify-center items-center bg-blue-600 text-white font-medium py-3 rounded-lg shadow-sm hover:bg-blue-700 transition-all duration-200 disabled:opacity-60 disabled:cursor-not-allowed"
                    id="btn-submit">
                    <span class="btn-text">Kirim</span>
                    <span class="spinner hidden ml-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                        </svg>
                    </span>
                </button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('form-registrasi').addEventListener('submit', function(e) {
            if (!this.checkValidity()) return;
            const btn = document.getElementById('btn-submit');
            btn.disabled = true;
            btn.querySelector('.btn-text').innerText = "Loading...";
            btn.querySelector('.spinner').classList.remove('hidden');
        });
    </script>
</body>

</html>
