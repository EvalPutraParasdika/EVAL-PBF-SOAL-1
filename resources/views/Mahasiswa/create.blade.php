@extends('layout')
@extends('layouts.app')
@section('title', 'Mahasiswa')
@section('judul', 'Mahasiswa')

@section('isi')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" name="prodi" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
            </form> 
        </div>
    </div>
</div>
@endsection
