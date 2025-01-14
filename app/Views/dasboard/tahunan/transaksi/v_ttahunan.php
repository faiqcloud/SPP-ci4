<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <div class="d-flex my-3">
        <div class="me-auto p-2">
            <h2>Data Detail tahunan</h2>
        </div>
        <div class="p-2">
            <a href="<?= base_url('tahunan/input'); ?>" class="btn btn-success">Tambah Data</a>
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
                        <th>No</th>
                        <th>Kode</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Periode</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Periode</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 0;
                    foreach ($detail as $tahunan) :
                        $no++ ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $tahunan['ktahunan']; ?></td>
                            <td><?= $tahunan['nis']; ?></td>
                            <td><?= $tahunan['nama']; ?></td>
                            <td><?= $tahunan['periode']; ?></td>
                            <td><?= $tahunan['btahunan']; ?></td>
                            <td><?= $tahunan['tgl_tahunan']; ?></td>
                            <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                                <a href="<?= base_url('tahunan/edit/' . ($tahunan['ktahunan'] ?? '')); ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
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
                    <a href="<?= base_url('tahunan/delete/' . ($tahunan['ktahunan'] ?? '')); ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endsection(); ?>