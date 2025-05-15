<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8080/pengajuan');
        $data = $response->json(); // convert ke array

        return view('pengajuan.index', ['pengajuan' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengajuan = Http::get('http://localhost:8080/pengajuan');
        return view('pengajuan.create', ['pengajuan' => $pengajuan]);
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
            'tgl_pengajuan' => 'required',
            'semester_cuti' => 'required',
            'tgl_mulai_cuti' => 'required',
            'tgl_selesai_cuti' => 'required',
            'alasan' => 'required',
            'dokumen' => 'required',
            'status_pengajuan' => 'required'
        ]);

        Http::post('http://localhost:8080/pengajuan', $validated);

        return redirect('/pengajuan')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(string $id_pengajuan)
    {
        $response = Http::get("http://localhost:8080/pengajuan/{$id_pengajuan}");
        $pengajuan = $response->json();
    
        return view('pengajuan.edit', ['pengajuan' => $pengajuan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pengajuan)
    {
        // dd($request->all()); 
        $validated = $request->validate([
            'NIM' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'tgl_pengajuan' => 'required',
            'semester_cuti' => 'required',
            'tgl_mulai_cuti' => 'required',
            'tgl_selesai_cuti' => 'required',
            'alasan' => 'required',
            'dokumen' => 'required',
            'status_pengajuan' => 'required|in:Menunggu,Disetujui,Ditolak'
        ]);

        Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->put("http://localhost:8080/pengajuan/{$id_pengajuan}", $validated);
        

        return redirect('/pengajuan')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pengajuan)
    {
        Http::delete("http://localhost:8080/pengajuan/{$id_pengajuan}");

        return redirect('/pengajuan')->with('success', 'Data berhasil dihapus');
    }
}
