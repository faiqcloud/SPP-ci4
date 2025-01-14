<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <div class="d-flex my-3">
        <div class="me-auto p-2">
            <h2>Data SPP</h2>
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
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Periode</th>
                        <th>Beban Pembayaran</th>
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
                        <th>Beban Pembayaran</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 0;
                    foreach ($dataspp as $spp) :
                        $no++ ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $spp['nis']; ?></td>
                            <td><?= $spp['nama']; ?></td>
                            <td><?= $spp['periode']; ?></td>
                            <td><?= $bebanSpp; ?></td>
                            <td><?= $spp['totbspp']; ?></td>
                            <td><?= $spp['status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex alignment-content-center">
    <a href="<?= base_url('spp/detail'); ?>" class="btn btn-primary">detail</a>
    </div>
    <?= $this->endsection(); ?>