<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Ukuran Pemeriksaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('ukurans.store') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="flex justify-between items-center py-2"> <!-- Menyusun elemen secara horizontal -->
                            <a href="{{ route('patients.create') }}" class="text-blue-600 hover:underline font-bold text-lg transition duration-300 transform hover:scale-25 bg-blue-100 p-2 rounded ml-2">
                                &#43;Pasien Baru
                            </a>
                        </div>
        
                        <div class="max-w-2xl mb-4">
                            <div class="flex items-center mb-4"> <!-- Menyusun elemen secara horizontal -->
                                <input type="text" id="searchPatient" placeholder="Cari Pasien Lama..." class="border rounded px-3 py-2 w-2/3  value="{{ $search ?? '' }}"">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" strokeLinecap="round" strokeWidth="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>

                            <div class="flex mb-2">
                                <select name="patient_id" id="patient_id" class="w-full border rounded px-3 py-2" required>
                                    <option value="">Pilih Pasien </option>
                                    @forelse($patients as $patient)
                                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                            {{ $patient->name }}
                                        </option>
                                    @empty
                                        <option value="" disabled style="color: red;">Tidak ada data pasien</option>
                                    @endforelse
                                </select>
                            </div>
                            @if($patients->isEmpty())
                                <div class="text-red-500 mt-2">Data tidak ditemukan</div>
                            @endif

                           
                        </div>
                       
                        <div class="mb-4">
                            <label for="keluhan" class="block text-l font-medium text-blue-700">Keluhan:</label>
                            <select name="keluhan" id="keluhan" class="w-2/3 border rounded px-2 py-1" required>
                                <option value="">Pilih Keluhan</option>
                                <option value="Melihat jauh kabur">Melihat jauh kabur</option>
                                <option value="Melihat dekat atau membaca kabur">Melihat dekat atau membaca kabur</option>
                                <option value="Melihat berbayang/silau">Melihat berbayang/silau</option>
                                <option value="Kacamata lama kabur">Kacamata lama kabur</option>
                                <option value="Kacamata lama tidak nyaman/pusing">Kacamata lama tidak nyaman/pusing</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="riwayat_penyakit" class="block text-l font-medium text-blue-700">Riwayat penyakit:</label>
                            <select name="riwayat_penyakit" id="riwayat_penyakit" class="w-2/3 border rounded px-2 py-1" required>
                                <option value="" class="text-gray-700 italic">Riwayat Penyakit</option>
                                <option value="Diabetes Melitus">Diabetes Melitus</option>
                                <option value="Hipertensi">Hipertensi</option>
                                <option value="Katarak">Katarak</option>
                                <option value="Glaukoma">Glaukoma</option>
                                <option value="Lainnya">Lainnya</option>
                                <option value="Tidak ada">Tidak ada</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="ukuran_kacamata_lama" class="block text-l font-medium text-blue-700">Ukuran Kacamata Lama/Terakhir:</label>
                            <input type="text" name="ukuran_kacamata_lama" id="ukuran_kacamata_lama" class="w-2/3 border rounded px-2 py-1">
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-px">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('ukurans.store') }}" method="POST" class="mb-4">
                        @csrf

                        <div class="mb-4">
                            <div class="flex justify-between items-center mb-4">
                                <label for="patient_id" class="block text-l font-medium text-blue-700">PemeriksaanRefraksi</label>
                                
                            </div>

                           
                        </div>
                        {{-- <div class="grid grid-cols-subgrid gap-4 col-span-3"> --}}
                        <div class=" max-w-2xl grid grid-cols-1 gap-2 mb-4">
                            <!-- Right Eye -->
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Right Eye</h3>
                                <div class="grid grid-cols-6 gap-2 bg-gray-100">
                                    <div>
                                        <label for="right_sph" class="block text-sm">Sph:</label>
                                        <input type="number" name="right_sph" id="right_sph" step="0.25" min="-25" max="25" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('right_sph') }}" >
                                    </div>
                                    <div>
                                        <label for="right_cyl" class="block text-sm">Cyl:</label>
                                        <input type="number" name="right_cyl" id="right_cyl" step="0.25" min="-6" max="0" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('right_cyl') }}" >
                                    </div>
                                    <div>
                                        <label for="right_axis" class="block text-sm">Axis:</label>
                                        <input type="number" name="right_axis" id="right_axis" step="1" min="0" max="180" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('right_axis') }}" >
                                    </div>
                                    <div>
                                        <label for="right_add" class="block text-sm">Add:</label>
                                        <input type="number" name="right_add" id="right_add" step="0.25" min="0.50" max="3.50" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('right_add') }}" >
                                    </div>
                                    <div>
                                        <label for="right_mpd" class="block text-sm">MPD:</label>
                                        <input type="number" name="right_mpd" id="right_mpd" step="1" min="20" max="40" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('right_mpd') }}" >
                                    </div>
                                    <div>
                                        <label for="right_visus" class="block text-sm">Visus CC:</label>
                                        <input type="number" name="right_visus" id="right_visus" step="1" min="0" max="35" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('right_visus') }}" >
                                    </div>
                                </div>
                            </div>

                            <!-- Left Eye -->
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Left Eye</h3>
                                <div class="grid grid-cols-6 gap-2 bg-yellow-100"> <!-- Ganti warna latar belakang menjadi kuning untuk sebelah kiri -->
                                    <div>
                                        <label for="left_sph" class="block text-sm">Sph:</label>
                                        <input type="number" name="left_sph" id="left_sph" step="0.25" min="-25" max="25" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('left_sph') }}" >
                                    </div>
                                    <div>
                                        <label for="left_cyl" class="block text-sm">Cyl:</label>
                                        <input type="number" name="left_cyl" id="left_cyl" step="0.25" min="-6" max="0" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('left_cyl') }}" >
                                    </div>
                                    <div>
                                        <label for="left_axis" class="block text-sm">Axis:</label>
                                        <input type="number" name="left_axis" id="left_axis" step="1" min="0" max="180" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('left_axis') }}" >
                                    </div>
                                    <div>
                                        <label for="left_add" class="block text-sm">Add:</label>
                                        <input type="number" name="left_add" id="left_add" step="0.25" min="0.50" max="3.50" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('left_add') }}" >
                                    </div>
                                    <div>
                                        <label for="left_mpd" class="block text-sm">MPD:</label>
                                        <input type="number" name="left_mpd" id="left_mpd" step="1" min="20" max="40" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('left_mpd') }}" >
                                    </div>
                                    <div>
                                        <label for="left_visus" class="block text-sm">Visus CC:</label>
                                        <input type="number" name="left_visus" id="left_visus" step="1" min="0" max="35" class="w-full border rounded px-2 py-1 text-sm" value="{{ old('left_visus') }}" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                            <button type="button" id="copyRightToLeft" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                                Copy Right to Left
                            </button>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mt-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const searchInput = document.getElementById('searchPatient');
                            const patientSelect = document.getElementById('patient_id');
                            const originalOptions = Array.from(patientSelect.options);

                            searchInput.addEventListener('input', function() {
                                const searchTerm = this.value.toLowerCase();
                                const filteredOptions = originalOptions.filter(option => 
                                    option.text.toLowerCase().includes(searchTerm)
                                );

                                patientSelect.innerHTML = '';
                                filteredOptions.forEach(option => patientSelect.add(option));

                                if (filteredOptions.length === 0) {
                                    const noResultOption = new Option('Tidak ada hasil yang cocok', '');
                                    noResultOption.disabled = true;
                                    patientSelect.add(noResultOption);
                                }
                            });

                            const copyButton = document.getElementById('copyRightToLeft');

                            copyButton.addEventListener('click', function() {
                                const fields = ['sph', 'cyl', 'axis', 'add', 'mpd', 'prisma', 'visus'];
                                fields.forEach(field => {
                                    const rightValue = document.getElementById(`right_${field}`).value;
                                    document.getElementById(`left_${field}`).value = rightValue;
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
