@extends('layout')

@section('title', 'Dosen')

@section('judul', 'Dosen')


@section('isi')


    <div class="card shadow mb-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert"
                style="background: rgba(40, 167, 69, 0.2); border: 1px solid rgba(40, 167, 69, 0.5); color: #155724;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"
                style="background: rgba(220, 53, 69, 0.2); border: 1px solid rgba(220, 53, 69, 0.5); color: #721c24;">
                {{ session('error') }}
            </div>
        @endif
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <!-- Tombol buka modal tambah -->
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
                + Tambah Dosen
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>NIDN</th>
                            <th>Email</th>
                            <th>Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen as $dsn)
                            <tr>
                                <!-- Modal Edit dosen -->
                                <div class="modal fade" id="modalEdit{{ $dsn['id'] }}" tabindex="-1"
                                    aria-labelledby="modalEditLabel{{ $dsn['id'] }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('dosen.update', $dsn['id']) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalEditLabel{{ $dsn['id'] }}">Edit Dosen
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control"
                                                            value="{{ $dsn['nama'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NIDN</label>
                                                        <input type="text" name="nidn" class="form-control"
                                                            value="{{ $dsn['nidn'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $dsn['email'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Prodi</label>
                                                        <input type="text" name="prodi" class="form-control"
                                                            value="{{ $dsn['prodi'] }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <td>{{ $dsn['id'] }}</td>
                                <td>{{ $dsn['nama'] }}</td>
                                <td>{{ $dsn['nidn'] }}</td>
                                <td>{{ $dsn['email'] }}</td>
                                <td>{{ $dsn['prodi'] }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#modalEdit{{ $dsn['id'] }}">Edit</button>

                                    <form action="{{ route('dosen.destroy', $dsn['id']) }}" method="POST"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Dosen -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('dosen.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Dosen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>NIDN</label>
                            <input type="text" name="nidn" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Prodi</label>
                            <input type="text" name="prodi" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<script>
    // Menghilangkan alert otomatis setelah 2 detik
    setTimeout(function () {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500);
        });
    }, 2000);
</script>