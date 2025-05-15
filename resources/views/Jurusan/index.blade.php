@extends('layout')

@section('title', 'Jurusan')

@section('judul', 'Jurusan')


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
    <!-- Tombol buka modal tambah -->
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
      + Tambah Jurusan
    </button>
    </div>
    <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
        <th>ID Jurusan</th>
        <th>Nama</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        @foreach ($jurusan as $jrs)
      <tr>
      <!-- Modal Edit Jurusan -->
      <div class="modal fade" id="modalEdit{{ $jrs['id_jurusan'] }}" tabindex="-1"
        aria-labelledby="modalEditLabel{{ $jrs['id_jurusan'] }}" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <form action="{{ route('jurusan.update', $jrs['id_jurusan']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditLabel{{ $jrs['id_jurusan'] }}">Edit Jurusan
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
          <label>ID Jurusan</label>
          <input type="text" name="id_jurusan" class="form-control" value="{{ $jrs['id_jurusan'] }}"
          required>
          </div>
          <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="{{ $jrs['nama'] }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
        </form>
        </div>
        </div>
      </div>

      <td>{{ $jrs['id_jurusan'] }}</td>
      <td>{{ $jrs['nama'] }}</td>
      <td>
        <!-- Tombol Edit -->
        <button class="btn btn-sm btn-warning" data-toggle="modal"
        data-target="#modalEdit{{ $jrs['id_jurusan'] }}">Edit</button>

        <form action="{{ route('jurusan.destroy', $jrs['id_jurusan']) }}" method="POST"
        style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
  <!-- Modal Tambah Jurusan -->
  <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('jurusan.store') }}" method="POST">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <label>ID Jurusan</label>
        <input type="text" name="id_jurusan" class="form-control" value="" required>
        </div>
        <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="" required>
        </div>
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