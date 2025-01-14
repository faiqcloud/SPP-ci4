<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container my-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header" style="background-color:rgb(31, 143, 196); color: white;">Input Data pangkal</h5>
                <div class="card-body">
                    <p class="card-text">
                    <form action="<?= base_url('pangkal/input'); ?>" method="post">
                        <div class="mb-3">
                            <label for="kpangkal" class="form-label">Kode Pembayaran</label>
                            <input type="text" class="form-control" id="kpangkal" name="kpangkal" placeholder="periode">
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" readonly>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalNIS">Pilih NIS</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="periode" class="form-label">periode</label>
                            <input type="text" class="form-control" id="periode" name="periode" placeholder="periode">
                        </div>
                        <div class="mb-3">
                            <label for="bpangkal" class="form-label">Pembayaran</label>
                            <input type="text" class="form-control" id="bpangkal" name="bpangkal" placeholder="periode">
                        </div>
                        <a href="<?= base_url('pangkal'); ?>" class="btn btn-primary">kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalNIS" tabindex="-1" aria-labelledby="modalNISLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNISLabel">Pilih NIS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($siswa as $row): ?>
                                    <tr>
                                        <td><?= $row['nis']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-select-nis"
                                                data-nis="<?= $row['nis']; ?>"
                                                data-nama="<?= $row['nama']; ?>">
                                                Pilih
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>