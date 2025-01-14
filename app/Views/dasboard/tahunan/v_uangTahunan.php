<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
  <div class="d-flex my-3">
    <div class="me-auto p-2">
      <h2>Data Uang Tahunan</h2>
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-body">

      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Periode</th>
            <th>Tanggal Pembayaran</th>
            <th>Jumlah Pembayaran</th>
            <th>Status</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Periode</th>
            <th>Tanggal Pembayaran</th>
            <th>Jumlah Pembayaran</th>
            <th>Status</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no = 0;
          foreach ($datatahunan as $tahunan) :
            $no++ ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $tahunan['nis']; ?></td>
              <td><?= $tahunan['nama']; ?></td>
              <td><?= $tahunan['periode']; ?></td>
              <td><?= $bebantahunan; ?></td>
              <td><?= $tahunan['totbtahunan']; ?></td>
              <td><?= $tahunan['status']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <?= $this->endsection(); ?>