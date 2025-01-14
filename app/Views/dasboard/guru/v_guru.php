<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
  <div class="d-flex my-3">
    <div class="me-auto p-2">
      <h2>Data Guru</h2>
    </div>
    <div class="p-2">
      <a href="<?= base_url('guru/export'); ?>" class="btn btn-success">Cetak Excel</a>
    </div>
    <div class="p-2">
      <a href="<?= base_url('guru/input'); ?>" class="btn btn-success">Tambah Data</a>
    </div>
  </div>
  <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('pesan'); ?>
    </div>
  <?php endif; ?>
  <div class="card mb-4">
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>NIPS</th>
            <th>Nama</th>
            <th>NUPTK</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Agama</th>
            <th>Pendidikan Terkahir</th>
            <th>Mapel</th>
            <th>Kelas</th>
            <th>Jabatan</th>
            <th>Sertifikat</th>
            <th>action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>NIPS</th>
            <th>Nama</th>
            <th>NUPTK</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Agama</th>
            <th>Pendidikan Terkahir</th>
            <th>Mapel</th>
            <th>Kelas</th>
            <th>Jabatan</th>
            <th>Sertifikat</th>
            <th>action</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach($data as $guru) : ?>
          <tr>
            <td><?= $guru['nips']; ?></td>
            <td><?= $guru['nama']; ?></td>
            <td><?= $guru['nuptk']; ?></td>
            <td><?= $guru['jk']; ?></td>
            <td><?= $guru['tempat']; ?>, <?= $guru['tgl_lahir']; ?></td>
            <td><?= $guru['agama']; ?></td>
            <td><?= $guru['tingkat']; ?>, <?= $guru['jurusan']; ?></td>
            <td><?= $guru['mapel']; ?></td>
            <td><?= $guru['kelas']; ?></td>
            <td><?= $guru['jabatan']; ?></td>
            <td><?= $guru['sertifikat']; ?></td>
            <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-trash3-fill"></i>
              </button>
              <a href="<?= base_url('guru/edit/'.($guru['nips'] ?? '')); ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Anda Yakin Menghapus Data ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" onclick="window.location.href='<?= base_url('guru/delete/'.($guru['nips'] ?? '')); ?>">Hapus</button>
        </div>
      </div>
    </div>
  </div>

  <?= $this->endsection(); ?>