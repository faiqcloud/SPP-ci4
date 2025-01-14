<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
  <div class="d-flex my-3">
    <div class="me-auto p-2">
      <h2>Data User</h2>
    </div>
    <div class="p-2">
      <a href="<?= base_url('kuser/input'); ?>" class="btn btn-success">Tambah Data</a>
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>ID User</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID User</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no = 0;
          foreach ($datauser as $user):
            $no++ ?>
            <tr>
              <td><?= $user['id']; ?></td>
              <td><?= $user['username']; ?></td>
              <td><?= $user['password']; ?></td>
              <td><?= $user['level']; ?></td>
              <td>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="bi bi-trash3-fill"></i>
                </button>
                <a href="<?= base_url('kuser/edit/'.($user['id']??'')); ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
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
          <button type="button" class="btn btn-danger" onclick="window.location.href='<?= base_url('kuser/delete/'.($user['id'] ?? '')); ?>';">Hapus</button>
        </div>
      </div>
    </div>
  </div>

  <?= $this->endsection(); ?>