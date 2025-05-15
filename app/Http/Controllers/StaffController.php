<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8080/staff');
        $data = $response->json(); // convert ke array

        return view('staff.index', ['staff' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staff = Http::get('http://localhost:8080/staff');
        return view('staff.create', ['staff' => $staff]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NIP' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        Http::post('http://localhost:8080/staff', $validated);

        return redirect('/Staff')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(string $NIP)
    {
        $response = Http::get("http://localhost:8080/staff/{$NIP}");
        $staff = $response->json();
    
        return view('staff.edit', ['staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIP)
    {
        $validated = $request->validate([
            'NIP' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        Http::put("http://localhost:8080/staff/{$NIP}", $validated);

        return redirect('/Staff')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIP)
    {
        Http::delete("http://localhost:8080/staff/{$NIP}");

        return redirect('/staff')->with('success', 'Data berhasil dihapus');
    }
}
