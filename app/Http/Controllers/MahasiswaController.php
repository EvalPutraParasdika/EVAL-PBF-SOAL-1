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
        $response = Http::get('http://localhost:8080/mahasiswa');
        $data = $response->json(); // convert ke array

        return view('mahasiswa.index', ['mahasiswa' => $data]);
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
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'prodi' => 'required',
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
    public function edit(string $id)
    {
        $response = Http::get("http://localhost:8080/mahasiswa/{$id}");
        $mahasiswa = $response->json();
    
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'prodi' => 'required',
        ]);
    
        Http::put("http://localhost:8080/mahasiswa/{$id}", $validated);
    
        return redirect('/mahasiswa')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Http::delete("http://localhost:8080/mahasiswa/{$id}");

        return redirect('/mahasiswa')->with('success', 'Data berhasil dihapus');
    }
}
