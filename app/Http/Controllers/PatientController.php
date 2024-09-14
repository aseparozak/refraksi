<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Menampilkan daftar pasien
    public function index(Request $request)
    {
        $search = $request->input('search');

        $patients = Patient::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10); // Menggunakan paginate untuk paginasi

        return view('patients.index', [
            'patients' => $patients,
            'search' => $search,
        ]);
    }

    // Menampilkan form tambah pasien
    public function create()
    {
        return view('patients.create');
    }

    // Menyimpan data pasien baru
    public function store(Request $request)
    {
        // Validasi dan simpan pasien
        $patient = Patient::create($request->all());

        // Redirect ke ukurans.create setelah menyimpan
        return redirect()->route('ukurans.create')->with('success', 'Pasien berhasil ditambahkan.');
    }

    // Menampilkan detail pasien
    public function show(Patient $patient)
    {
        $patient->load('ukurans');
        return view('patients.show', compact('patient'));
    }

    // Menampilkan form edit pasien
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patients.edit', compact('patient'));
    }

    // Update data pasien
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        $patient = Patient::find($id);
        $patient->update($request->all());

        return redirect()->route('patients.index')
                        ->with('success', 'Patient updated successfully.');
    }

    // Menghapus data pasien
    public function destroy($id)
    {
        Patient::find($id)->delete();
        return redirect()->route('patients.index')
                        ->with('success', 'Patient deleted successfully.');
    }
}