<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responseMhs = Http::get('http://localhost:8080/mahasiswa');
        $responseProdi = Http::get('http://localhost:8080/prodi');

        $dataMhs = $responseMhs->json();
        $dataProdi = $responseProdi->json();

        return view('mahasiswa.index', [
            'mahasiswa' => $dataMhs['data_mahasiswa'],
            'prodi' => $dataProdi['data_prodi'] // sesuaikan dengan struktur JSON dari API-mu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Http::get('http://localhost:8080/mahasiswa');
        return view('mahasiswa.create', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NIM' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'status' => 'required',
            'id_prodi' => 'required'
        ]);

        Http::post('http://localhost:8080/mahasiswa', $validated);

        return redirect('/mahasiswa')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $NIM)
    {
        $response = Http::get("http://localhost:8080/mahasiswa/{$NIM}");
        $mahasiswa = $response->json();

        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIM)
    {
        $validated = $request->validate([
            'NIM' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'status' => 'required',
            'id_prodi' => 'required'
        ]);

        Http::put("http://localhost:8080/mahasiswa/{$NIM}", $validated);

        return redirect('/mahasiswa')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIM)
    {
        Http::delete("http://localhost:8080/mahasiswa/{$NIM}");

        return redirect('/mahasiswa')->with('success', 'Data berhasil dihapus');
    }
}
