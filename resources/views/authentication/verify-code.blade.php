<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Kode</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Verifikasi Kode</h2>

            {{-- Alert Status --}}
            @if (session('status'))
            <div class="flex items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <svg class="fill-current w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm1 15H9v-2h2v2zm0-4H9V5h2v6z"/>
                </svg>
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
            @endif

            {{-- Alert Error OTP --}}
            @error('otp')
            <div class="flex items-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <svg class="fill-current w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm1 15H9v-2h2v2zm0-4H9V5h2v6z"/>
                </svg>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
            @enderror

            <form method="POST" action="{{ route('password.verify') }}" class="space-y-5">
                @csrf
                <label class="block text-sm font-medium text-gray-700">Masukkan Kode OTP</label>
                <input type="text" name="otp" value="{{ old('otp') }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">

                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-indigo-700">
                    Verifikasi
                </button>
            </form>
        </div>
    </div>
</body>

</html>
