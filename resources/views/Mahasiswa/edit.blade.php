@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-warning">Edit Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.update', $mahasiswa['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" class="form-control" value="{{ $mahasiswa['nim'] }}" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $mahasiswa['nama'] }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $mahasiswa['email'] }}" required>
                </div>
                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" name="prodi" class="form-control" value="{{ $mahasiswa['prodi'] }}" required>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
