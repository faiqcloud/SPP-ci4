<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container my-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header" style="background-color:rgb(31, 143, 196); color: white;">Input Data pangkal</h5>
                <div class="card-body">
                    <p class="card-text">
                    <form action="<?= base_url('pangkal/edit/'.($detail['kpangkal'] ?? ''));?>" method="post">
                        <div class="mb-3">
                            <label for="kpangkal" class="form-label">Kode Pembayaran</label>
                            <input type="text" class="form-control" id="kpangkal" name="kpangkal" placeholder="periode" value="<?= $detail['kpangkal']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" value="<?= $detail['nis']; ?>">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalNIS">Pilih NIS</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" readonly value="<?= $siswa['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="periode" class="form-label">periode</label>
                            <input type="text" class="form-control" id="periode" name="periode" placeholder="periode" readonly>
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

<?= $this->endSection(); ?>