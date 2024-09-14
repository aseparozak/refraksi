<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Detail Refraksi') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-2">
                    <div class="flex justify-between items-center border-b pb-4">
                        <div>
                            <a href="{{ route('ukurans.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Kembali</a>
                            <button onclick="window.print()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300 ml-2">Cetak</button>
                        </div>
                    </div>
                    
                    <!-- Konten yang akan dicetak -->
                    <div id="printable-content" class="space-y-2">
                        <!-- Informasi Pelanggan -->
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">{{ $ukuran->patient->name ?? 'Pasien tidak ditemukan' }}</h3>
                            <p class="text-sm text-gray-600">{{ $ukuran->patient->address ?? 'Alamat tidak ditemukan' }}</p>
                            <p class="text-sm text-gray-600">{{ $ukuran->patient->phone_number ?? 'Nomor HP tidak ditemukan' }}</p>
                            <p class="text-xs text-gray-600">{{ $ukuran->created_at->format('d/m/Y H:i') }}</p>
                        </div>

                        <h1 class="font-bold text-blue-500">Anamnesa</h1>
                        <div class="space-y-2">
                            <div class="bg-gray-50 p-4 rounded-md">
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <span class="text-gray-600">Keluhan:</span>
                                        <span class="font-medium">{{ $ukuran->keluhan }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Riwayat Penyakit:</span>
                                        <span class="font-medium">{{ $ukuran->riwayat_penyakit }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Ukuran Kacamata Lama:</span>
                                        <span class="font-medium">{{ $ukuran->ukuran_kacamata_lama ?? 'Tidak ada' }}</span>
                                    </div>
                                </div>
                            </div>
                            <h1 class="font-bold text-blue-500">Hasil Refraksi</h1>
                            @foreach(['right' => 'Mata Kanan', 'left' => 'Mata Kiri'] as $side => $label)
                                <div class="bg-gray-50 p-4 rounded-md">
                                    <h4 class="font-semibold mb-3 text-gray-700">{{ $label }}</h4>
                                    <div class="grid grid-cols-3 gap-x-2 text-sm">
                                        <div class="flex flex-col">
                                            <span class="text-gray-600">Sph</span>
                                            <span class="font-medium">{{ $ukuran->{$side . '_sph'} }}</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-gray-600">Cyl</span>
                                            <span class="font-medium">{{ $ukuran->{$side . '_cyl'} }}</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-gray-600">Axis</span>
                                            <span class="font-medium">{{ $ukuran->{$side . '_axis'} }}</span>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-x-2 text-sm mt-2">
                                        <div class="flex flex-col">
                                            <span class="text-gray-600">Add</span>
                                            <span class="font-medium">{{ $ukuran->{$side . '_add'} }}</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-gray-600">MPD</span>
                                            <span class="font-medium">{{ $ukuran->{$side . '_mpd'} }}</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-gray-600">Visus</span>
                                            <span class="font-medium">{{ $ukuran->{$side . '_visus'} }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #printable-content, #printable-content * {
                visibility: visible;
            }
            #printable-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 80mm;
                padding: 5mm;
                font-size: 10pt;
                line-height: 1.2;
                color: #000000 !important; // Memastikan teks hitam pekat
                -webkit-print-color-adjust: exact;
            }
            .bg-gray-50 {
                background-color: #ffffff !important;
                -webkit-print-color-adjust: exact;
            }
            .text-blue-500, .text-gray-600, .text-gray-700 {
                color: #000000 !important; // Mengubah semua teks menjadi hitam pekat
                -webkit-print-color-adjust: exact;
            }
            .font-medium, .font-semibold, .font-bold {
                font-weight: bold !important; // Membuat teks lebih tebal
            }
            .rounded-md {
                border-radius: 0 !important;
            }
            .grid {
                display: block !important;
            }
            .grid-cols-2, .grid-cols-6 {
                display: block !important;
            }
            .gap-4, .gap-x-4 {
                gap: 0 !important;
            }
            .space-y-2 > * + * {
                margin-top: 0.25rem !important;
            }
            .p-4 {
                padding: 0.25rem !important;
            }
            .mb-3 {
                margin-bottom: 0.25rem !important;
            }
            h1, h4 {
                font-size: 12pt !important;
                margin-top: 0.5rem !important;
                margin-bottom: 0.25rem !important;
            }
            .flex {
                display: block !important;
            }
            .flex-col {
                margin-bottom: 0.25rem !important;
            }
            .grid-cols-3 {
                display: grid !important;
                grid-template-columns: repeat(3, 1fr) !important;
            }
            .gap-x-2 {
                column-gap: 0.5rem !important;
            }
            .mt-2 {
                margin-top: 0.5rem !important;
            }
            .flex-col {
                display: flex !important;
                flex-direction: column !important;
            }

            #printable-content .mb-4 {
                margin-bottom: 1rem !important;
            }

            #printable-content h3 {
                font-size: 12pt !important;
                font-weight: bold !important;
                margin-bottom: 0.25rem !important;
                color: #000000 !important; // Memastikan judul hitam pekat
            }

            #printable-content p {
                margin-bottom: 0.125rem !important;
                color: #000000 !important; // Memastikan paragraf hitam pekat
            }

            // Menambahkan gaya untuk mempertebal garis tabel jika ada
            table, th, td {
                border: 1px solid #000000 !important;
                border-collapse: collapse !important;
            }
        }
    </style>
</x-app-layout>