@extends('layout')

@section('title', 'Prodi')

@section('judul', 'Prodi')


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
                + Tambah Prodi
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Prodi</th>
                            <th>Nama</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodi as $prd)
                            <tr>
                                <!-- Modal Edit Prodi -->
                                <div class="modal fade" id="modalEdit{{ $prd['id_prodi'] }}" tabindex="-1"
                                    aria-labelledby="modalEditLabel{{ $prd['id_prodi'] }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('prodi.update', $prd['id_prodi']) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalEditLabel{{ $prd['id_prodi'] }}">Edit Prodi
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>ID Prodi</label>
                                                        <input type="text" name="id_prodi" class="form-control"
                                                            value="{{ $prd['id_prodi'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control"
                                                            value="{{ $prd['nama'] }}" required>
                                                    </div>
                                                    <select name="id_jurusan" class="form-control" required>
                                                        @foreach ($jurusan as $j)
                                                            <option value="{{ $j['id_jurusan'] }}" {{ $prd['id_prodi'] == $j['id_jurusan'] ? 'selected' : '' }}>
                                                                {{ $j['nama'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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

                                <td>{{ $prd['id_prodi'] }}</td>
                                <td>{{ $prd['nama'] }}</td>
                                <td>{{ $prd['nama_jurusan'] }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#modalEdit{{ $prd['id_prodi'] }}">Edit</button>

                                    <form action="{{ route('prodi.destroy', $prd['id_prodi']) }}" method="POST"
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
    <!-- Modal Tambah Prodi-->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('prodi.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Prodi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID Prodi</label>
                            <input type="text" name="id_prodi" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="" required>
                        </div>
                            <label>Jurusan</label>
                            <select name="id_jurusan" class="form-control" required>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j['id_jurusan'] }}">{{ $j['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Simpan</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      </div>
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