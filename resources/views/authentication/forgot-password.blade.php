<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8" x-data="{ method: 'email', submitting: false }">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Forgot Password</h2>

            <!-- Tab Switch -->
            <div class="flex border-b mb-6">
                <button type="button" @click="method = 'email'"
                    :class="method === 'email' ? 'border-indigo-600 text-indigo-600' :
                        'border-transparent text-gray-500 hover:text-gray-700'"
                    class="flex-1 text-center py-2 border-b-2 font-semibold transition">
                    Email
                </button>
                <button type="button" @click="method = 'phone'"
                    :class="method === 'phone' ? 'border-indigo-600 text-indigo-600' :
                        'border-transparent text-gray-500 hover:text-gray-700'"
                    class="flex-1 text-center py-2 border-b-2 font-semibold transition">
                    Nomor HP
                </button>
            </div>

            <form method="POST" action="{{ route('password.sendCode') }}" class="space-y-5"
                @submit.prevent="submitting = true; $el.submit()">
                @csrf
                <!-- Hidden input untuk method -->
                <input type="hidden" name="method" x-model="method">

                <!-- Error Handling -->
                @error('user')
                    <div class="flex items-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <svg class="fill-current w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0zm1 15H9v-2h2v2zm0-4H9V5h2v6z" />
                        </svg>
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                @enderror

                <!-- Input Email -->
                <div x-show="method === 'email'">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500"
                        :disabled="submitting">
                </div>

                <!-- Input Nomor HP -->
                <div x-show="method === 'phone'">
                    <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                        placeholder="+628xxxxxxxxxx"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500"
                        :disabled="submitting">
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-indigo-700 flex items-center justify-center"
                    :disabled="submitting">
                    <span x-show="!submitting">Kirim Kode OTP</span>
                    <span x-show="submitting" class="flex items-center">
                        <svg class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                            </path>
                        </svg>
                        Mengirim...
                    </span>
                </button>

                <div class="text-center mt-4">
                    <a href="{{ route('login.form') }}" class="text-sm text-indigo-600 hover:underline">
                        Kembali ke Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
