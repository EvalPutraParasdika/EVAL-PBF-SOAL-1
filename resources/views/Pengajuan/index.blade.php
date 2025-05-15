@extends('layout')

@section('title', 'Pengajuan')

@section('judul', 'Pengajuan')


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
      + Tambah Pengajuan
    </button>
    </div>
    <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Semester</th>
        <th>Tgl Pengajuan</th>
        <th>Semester Cuti</th>
        <th>Tgl Mulai Cuti</th>
        <th>Tgl Selesai Cuti</th>
        <th>Alasan</th>
        <th>Dokumen</th>
        <th>Status Pengajuan</th>
        <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pengajuan as $pngj)
      <tr>
      <!-- Modal Edit Mahasiswa -->
      <div class="modal fade" id="modalEdit{{ $pngj['id_pengajuan'] }}" tabindex="-1"
        aria-labelledby="modalEditLabel{{ $pngj['id_pengajuan'] }}" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <form action="{{ route('pengajuan.update', $pngj['id_pengajuan']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditLabel{{ $pngj['id_pengajuan'] }}">Edit Mahasiswa
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
          <label>NIM</label>
          <input type="text" name="NIM" class="form-control" value="{{ $pngj['NIM'] }}" required>
          </div>
          <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="{{ $pngj['nama'] }}" required>
          </div>
          <div class="form-group">
          <label>Kelas</label>
          <input type="text" name="kelas" class="form-control" value="{{ $pngj['kelas'] }}" required>
          </div>
          <div class="form-group">
          <label>Semester</label>
          <input type="text" name="semester" class="form-control" value="{{ $pngj['semester'] }}"
          required>
          </div>
          <div class="form-group">
          <label>Tgl Pengajuan</label>
          <input type="date" name="tgl_pengajuan" class="form-control"
          value="{{ $pngj['tgl_pengajuan'] }}" required>
          </div>
          <div class="form-group">
          <label>Semester Cuti</label>
          <input type="text" name="semester_cuti" class="form-control"
          value="{{ $pngj['semester_cuti'] }}" required>
          </div>
          <div class="form-group">
          <label>Tgl Mulai Cuti</label>
          <input type="date" name="tgl_mulai_cuti" class="form-control"
          value="{{ $pngj['tgl_mulai_cuti'] }}" required>
          </div>
          <div class="form-group">
          <label>Tgl Selesai Cuti</label>
          <input type="date" name="tgl_selesai_cuti" class="form-control"
          value="{{ $pngj['tgl_selesai_cuti'] }}" required>
          </div>
          <div class="form-group">
          <label>Alasan</label>
          <input type="text" name="alasan" class="form-control" value="{{ $pngj['alasan'] }}" required>
          </div>
          <div class="form-group">
          <label>Dokumen</label>
          <input type="text" name="dokumen" class="form-control" value="{{ $pngj['dokumen'] }}" required>
          </div>
          <div class="form-group">
          <label>Status Pengajuan</label>
          <select name="status_pengajuan" class="form-control">
          <option value="Menunggu" {{ $pngj['status_pengajuan'] == 'Menunggu' ? 'selected' : '' }}>
          Menunggu</option>
          <option value="Disetujui" {{ $pngj['status_pengajuan'] == 'Disetujui' ? 'selected' : '' }}>
          Disetujui
          </option>
          <option value="Ditolak" {{ $pngj['status_pengajuan'] == 'Ditolak' ? 'selected' : '' }}>Ditolak
          </option>
          </select>
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

      <td>{{ $pngj['NIM'] }}</td>
      <td>{{ $pngj['nama'] }}</td>
      <td>{{ $pngj['kelas'] }}</td>
      <td>{{ $pngj['semester'] }}</td>
      <td>{{ $pngj['tgl_pengajuan'] }}</td>
      <td>{{ $pngj['semester_cuti'] }}</td>
      <td>{{ $pngj['tgl_mulai_cuti'] }}</td>
      <td>{{ $pngj['tgl_selesai_cuti'] }}</td>
      <td>{{ $pngj['alasan'] }}</td>
      <td>{{ $pngj['dokumen'] }}</td>
      <td>{{ $pngj['status_pengajuan'] }}</td>
      <td>
        <!-- Tombol Edit -->
        <button class="btn btn-sm btn-warning" data-toggle="modal"
        data-target="#modalEdit{{ $pngj['id_pengajuan'] }}">Edit</button>

        <form action="{{ route('pengajuan.destroy', $pngj['id_pengajuan']) }}" method="POST"
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
  <!-- Modal Tambah Mahasiswa -->
  <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('pengajuan.store') }}" method="POST">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>NIM</label>
          <input type="text" name="NIM" class="form-control" value="" required>
          </div>
          <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="" required>
          </div>
          <div class="form-group">
          <label>Kelas</label>
          <input type="kelas" name="kelas" class="form-control" value="" required>
          </div>
          <div class="form-group">
          <label>Semester</label>
          <input type="text" name="semester" class="form-control" value=""
          required>
          </div>
          <div class="form-group">
          <label>Tgl Pengajuan</label>
          <input type="date" name="tgl_pengajuan" class="form-control"
          value="" required>
          </div>
          <div class="form-group">
          <label>Semester Cuti</label>
          <input type="text" name="semester_cuti" class="form-control"
          value="" required>
          </div>
          <div class="form-group">
          <label>Tgl Mulai Cuti</label>
          <input type="date" name="tgl_mulai_cuti" class="form-control"
          value="" required>
          </div>
          <div class="form-group">
          <label>Tgl Selesai Cuti</label>
          <input type="date" name="tgl_selesai_cuti" class="form-control"
          value="" required>
          </div>
          <div class="form-group">
          <label>Alasan</label>
          <input type="text" name="alasan" class="form-control" value="" required>
          </div>
          <div class="form-group">
          <label>Dokumen</label>
          <input type="text" name="dokumen" class="form-control" value="" required>
          </div>
          <div class="form-group">
          <label>Status Pengajuan</label>
          <select name="status_pengajuan" class="form-control" disabled>
          <option value="menunggu" {{ $pngj['status_pengajuan'] == 'Menunggu' ? 'selected' : '' }}>
          Menunggu</option>
          </select>
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      <div class="modal-footer">
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