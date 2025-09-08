<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8" x-data="{ loading: false }">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Reset Password</h2>

            {{-- Alert Error --}}
            @if ($errors->any())
                <div class="flex items-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <svg class="fill-current w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm1 15H9v-2h2v2zm0-4H9V5h2v6z" />
                    </svg>
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif

            {{-- Alert Status --}}
            @if (session('status'))
                <div class="flex items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <svg class="fill-current w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm1 15H9v-2h2v2zm0-4H9V5h2v6z" />
                    </svg>
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.reset') }}" class="space-y-5" @submit="loading = true">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <input type="password" name="password" required
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" required
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-indigo-700 flex justify-center items-center"
                    :disabled="loading">
                    <span x-cloak x-show="!loading">Simpan Password</span>
                    <span x-cloak x-show="loading" class="flex items-center space-x-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                        <span>Loading...</span>
                    </span>
                </button>
            </form>
        </div>
    </div>
</body>

</html>
