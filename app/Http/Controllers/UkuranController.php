<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use App\Models\Patient;
use App\Models\KeluhanUtama; // Pastikan model KeluhanUtama sudah dibuat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UkuranController extends Controller
{
    public function index(Request $request)
    {
        \Log::info('UkuranController@index dipanggil');
        $search = $request->input('search');
        $ukurans = Ukuran::with('patient')
                         ->when($search, function ($query) use ($search) {
                             return $query->whereHas('patient', function ($q) use ($search) {
                                 $q->where('name', 'like', "%{$search}%");
                             });
                         })
                         ->latest()
                         ->paginate(10);

        return view('ukurans.index', compact('ukurans', 'search'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'keluhan' => 'required|string',
            'riwayat_penyakit' => 'required|string',
            'ukuran_kacamata_lama' => 'nullable|string',
            'right_sph' => 'nullable|numeric|between:-25,25',
            'right_cyl' => 'nullable|numeric|between:-6,0',
            'right_axis' => 'nullable|numeric|between:0,180',
            'right_add' => 'nullable|numeric|between:0.50,3.50',
            'right_mpd' => 'nullable|numeric|between:20,40',
            'right_prisma' => 'nullable|numeric',
            'right_visus' => 'nullable|numeric',
            'left_sph' => 'nullable|numeric|between:-25,25',
            'left_cyl' => 'nullable|numeric|between:-6,0',
            'left_axis' => 'nullable|numeric|between:0,180',
            'left_add' => 'nullable|numeric|between:0.50,3.50',
            'left_mpd' => 'nullable|numeric|between:20,40',
            'left_prisma' => 'nullable|numeric',
            'left_visus' => 'nullable|numeric|between:0,35',
        ]);

        Ukuran::create($validatedData);

        return redirect()->route('ukurans.create')->with('success', 'Ukuran pemeriksaan berhasil disimpan.');
    }

    public function show(Ukuran $ukuran)
    {
        $ukuran->load('patient');
        return view('ukurans.show', compact('ukuran'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('ukurans.create', compact('patients'));
    }
}
