<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Refraksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 flex justify-between items-center">
                        <form action="{{ route('ukurans.index') }}" method="GET" class="flex-grow mr-4">
                            <div class="flex">
                                <input type="text" name="search" placeholder="Cari nama pasien..." value="{{ $search ?? '' }}" class="flex-grow px-3 py-2 text-sm border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 text-sm rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Cari</button>
                            </div>
                        </form>
                        <a href="{{ route('ukurans.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Tambah Refraksi
                        </a>
                    </div>

                    @if($ukurans->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-2 px-4 border-b">Nama Pasien</th>
                                        <th class="py-2 px-4 border-b">Tanggal</th>
                                        <th class="py-2 px-4 border-b">Mata Kanan</th>
                                        <th class="py-2 px-4 border-b">Mata Kiri</th>
                                        <th class="py-2 px-4 border-b">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ukurans as $ukuran)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $ukuran->patient->name ?? 'Pasien tidak ditemukan' }}</td>
                                            <td class="py-2 px-4 border-b">{{ $ukuran->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="py-2 px-4 border-b">{{ $ukuran->right_sph }} / {{ $ukuran->right_cyl }} / {{ $ukuran->right_axis }}</td>
                                            <td class="py-2 px-4 border-b">{{ $ukuran->left_sph }} / {{ $ukuran->left_cyl }} / {{ $ukuran->left_axis }}</td>
                                            <td class="py-2 px-4 border-b">
                                                <a href="{{ route('ukurans.show', $ukuran) }}" class="text-blue-500 hover:underline">Lihat Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6">
                            {{ $ukurans->links() }}
                        </div>
                    @else
                        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                            <p class="font-bold">Perhatian</p>
                            <p>Tidak ada data refraksi yang tersedia saat ini.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
