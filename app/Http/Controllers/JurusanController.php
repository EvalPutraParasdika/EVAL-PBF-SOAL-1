<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8080/jurusan');
        $data = $response->json(); // convert ke array

        return view('jurusan.index', ['jurusan' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Http::get('http://localhost:8080/jurusan');
        return view('jurusan.create', ['jurusan' => $jurusan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_jurusan' => 'required',
            'nama' => 'required',
        ]);

        Http::post('http://localhost:8080/jurusan', $validated);

        return redirect('/jurusan')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(string $id_jurusan)
    {
        $response = Http::get("http://localhost:8080/jurusan/{$id_jurusan}");
        $jurusan = $response->json();

        return view('jurusan.edit', ['jurusan' => $jurusan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_jurusan)
    {
        $validated = $request->validate([
            'id_jurusan' => 'required',
            'nama' => 'required',
        ]);

        Http::put("http://localhost:8080/jurusan/{$id_jurusan}", $validated);

        return redirect('/jurusan')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_jurusan)
    {
        Http::delete("http://localhost:8080/jurusan/{$id_jurusan}");

        return redirect('/jurusan')->with('success', 'Data berhasil dihapus');
    }
}
