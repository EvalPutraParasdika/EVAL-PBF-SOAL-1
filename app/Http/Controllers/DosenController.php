<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8080/dosen');
        $data = $response->json(); // convert ke array

        return view('dosen.index', ['dosen' => $data]);
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
            'nidn' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'prodi' => 'required',
        ]);

        Http::post('http://localhost:8080/dosen', $validated);

        return redirect('/dosen')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(string $id)
    {
        $response = Http::get("http://localhost:8080/mahasiswa/{$id}");
        $dosen = $response->json();
    
        return view('dosen.edit', ['dosen' => $dosen]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nidn' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'prodi' => 'required',
        ]);
    
        Http::put("http://localhost:8080/dosen/{$id}", $validated);
    
        return redirect('/dosen')->with('success', 'Data berhasil diupdate');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Http::delete("http://localhost:8080/dosen/{$id}");

        return redirect('/dosen')->with('success', 'Data berhasil dihapus');
   
    }
}
