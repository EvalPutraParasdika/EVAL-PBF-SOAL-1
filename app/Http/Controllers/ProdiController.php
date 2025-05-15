<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responseProdi = Http::get('http://localhost:8080/prodi');
        $responseJrs = Http::get('http://localhost:8080/jurusan');
    
        $dataProdi = $responseProdi->json();
        $dataJrs = $responseJrs->json();
    
        return view('prodi.index', [
            'prodi' => $dataProdi['data_prodi'],
            'jurusan' => $dataJrs // ini langsung karena jurusan dikirim tanpa key pembungkus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Http::get('http://localhost:8080/prodi');
        return view('prodi.create', ['prodi' => $prodi]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_prodi' => 'required',
            'nama' => 'required',
            'id_jurusan' => 'required'
        ]);

        Http::post('http://localhost:8080/prodi', $validated);

        
        return redirect('/prodi')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(string $id_prodi)
    {
        $response = Http::get("http://localhost:8080/prodi/{$id_prodi}");
        $prodi = $response->json();

        return view('prodi.edit', ['prodi' => $prodi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_prodi)
    {
        $validated = $request->validate([
            'id_prodi' => 'required',
            'nama' => 'required',
            'id_jurusan' => 'required'
        ]);

        Http::put("http://localhost:8080/prodi/{$id_prodi}", $validated);

        return redirect('/prodi')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_prodi)
    {
        Http::delete("http://localhost:8080/prodi/{$id_prodi}");

        return redirect('/prodi')->with('success', 'Data berhasil dihapus');
    }
}
