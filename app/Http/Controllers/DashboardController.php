<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    // Menghitung jumlah Mahasiswa
    public function index()
    {
        // Ambil data dari API
        $responseMahasiswa = Http::get('http://localhost:8080/mahasiswa');
        $jumlahMahasiswa = count($responseMahasiswa->json());

        // Ambil data dari API
        $responseDosen = Http::get('http://localhost:8080/dosen');
        $jumlahDosen = count($responseDosen->json());

        return view('dashboard', compact('jumlahMahasiswa', 'jumlahDosen'));
    }
}
