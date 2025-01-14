<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container my-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Input Data Siswa</h5>
                <div class="card-body">
                    <p class="card-text">
                    <form action="<?= base_url('siswa/edit/' . ($siswa['id_user'] ?? '')); ?>" method="post">
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="number" class="form-control" id="nis" name="nis" placeholder="NIS" value="<?= $siswa['nis']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $siswa['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="number" class="form-control" id="nisn" name="nisn" placeholder="NISN" value="<?= $siswa['nisn']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis kelamin</label>
                            <select class="form-select" name="jk" id="jk">
                                <option value="0">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" <?php if($siswa['jk']=='laki-laki') echo "selected"; ?>>Laki-Laki</option>
                                <option value="perempuan"<?php if($siswa['jk']=='perempuan') echo "selected"; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" value="<?= $siswa['kelas']; ?>">
                        </div>
                        <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" name="agama" id="agama">
                                <option value="0">Pilih Agama</option>
                                <option value="Islam" <?php if($siswa['agama']=='Islam') echo "selected"; ?>>Islam</option>
                                <option value="Kristen" <?php if($siswa['agama']=='Kristen') echo "selected"; ?>>Kristen</option>
                                <option value="Hindu" <?php if($siswa['agama']=='Hindu') echo "selected"; ?>>Hindu</option>
                                <option value="Budha" <?php if($siswa['agama']=='Budha') echo "selected"; ?>>Budha</option>
                                <option value="Katolik" <?php if($siswa['agama']=='Katolik') echo "selected"; ?>>Katolik</option>
                                <option value="Konghucu" <?php if($siswa['agama']=='Konghucu') echo "selected"; ?>>Konghucu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tempat" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir" value="<?= $siswa['tempat']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Lahir" value="<?= $siswa['tanggal']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="sekolah" class="form-label">Asal Sekolah</label>
                            <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Asal Sekolah" value="<?= $siswa['sekolah']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pekortu" class="form-label">Pekerjaan Orang Tua</label>
                            <input type="text" class="form-control" id="pekortu" name="pekortu" placeholder="Pekerjaan Orang Tua" value="<?= $siswa['pekortu']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ayah" class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" id="ayah" name="ayah" placeholder="Nama Ayah" value="<?= $siswa['ayah']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ibu" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="ibu" name="ibu" placeholder="Nama Ibu" value="<?= $siswa['ibu']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>