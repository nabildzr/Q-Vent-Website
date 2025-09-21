<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Terima Kasih - {{ $event->title }}</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans bg-[#f7f9fc] min-h-screen flex items-center justify-center p-4">

    <div
        class="flex flex-col md:flex-row items-center bg-white rounded-xl shadow-lg w-full max-w-3xl gap-6 p-6 md:p-10 text-center md:text-left">

        @if ($showQr)
            <div class="flex justify-center md:justify-start">
                <img src="{{ $qrData }}" alt="QR Code"
                    class="w-44 max-w-[180px] border-4 border-blue-600 rounded-lg shadow-sm">
            </div>
        @endif

        <div class="flex-1 space-y-3">
            <h2 class="text-xl md:text-2xl font-semibold text-gray-900">Terima kasih telah mengisi form</h2>
            <p class="text-lg font-bold text-gray-800">event "{{ $event->title }}"</p>
            <p class="text-blue-600 text-sm md:text-base">
                {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('l, d F Y H:i') }}
            </p>

            <div class="mt-5 flex flex-col md:flex-row gap-3 md:gap-4">
                @if ($showQr)
                    @php
                        $namePart = Str::slug($attendee->first_name ?: $attendee->last_name ?: 'peserta', '_');
                        $fileName = 'QR_' . $attendee->id . '_' . $namePart . '_' . $attendee->code . '.png';
                    @endphp
                    <a href="{{ $qrData }}" download="{{ $fileName }}"
                        class="px-5 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition w-full md:w-auto text-center">
                        Download QR Code
                    </a>
                @endif

                <a href="{{ url()->previous() }}"
                    class="px-5 py-2.5 rounded-lg bg-gray-600 text-white text-sm font-medium hover:bg-gray-700 transition w-full md:w-auto text-center">
                    Kembali ke Form
                </a>
            </div>
        </div>
    </div>
</body>

</html>
