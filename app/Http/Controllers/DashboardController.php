<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data mahasiswa
        $responseMahasiswa = Http::get('http://localhost:8080/mahasiswa');
        $jumlahMahasiswa = is_array($responseMahasiswa->json()) ? count($responseMahasiswa->json()) : 0;

        // Ambil data staff
        $responseStaff = Http::get('http://localhost:8080/staff');
        $jumlahStaff = is_array($responseStaff->json()) ? count($responseStaff->json()) : 0;

        // Ambil data jurusan
        $responseJurusan = Http::get('http://localhost:8080/jurusan');
        $jumlahJurusan = is_array($responseJurusan->json()) ? count($responseJurusan->json()) : 0;

        // Ambil data prodi
        $responseProdi = Http::get('http://localhost:8080/prodi');
        $jumlahProdi = is_array($responseProdi->json()) ? count($responseProdi->json()) : 0;

        // Ambil data pengajuan
        $responsePengajuan = Http::get('http://localhost:8080/pengajuan');
        $jumlahPengajuan = is_array($responsePengajuan->json()) ? count($responsePengajuan->json()) : 0;

        return view('dashboard', compact(
            'jumlahMahasiswa',
            'jumlahStaff',
            'jumlahJurusan',
            'jumlahProdi',
            'jumlahPengajuan'
        ));
    }
}
