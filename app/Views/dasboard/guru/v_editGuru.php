<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
        <div class="card">
                <h5 class="card-header" style="background-color:rgb(31, 143, 196); color: white;">Edit Data Guru</h5>
                <div class="card-body">
                    <p class="card-text">
                    <form action="<?= base_url('guru/edit/'. ($guru['nips'] ?? '')); ?>" method="post">
                        <div class="mb-3">
                            <label for="nips" class="form-label">NIPS</label>
                            <input type="number" class="form-control" id="nips" name="nips" placeholder="NIPS" value="<?= $guru['nips']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $guru['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nuptk" class="form-label">NUPTK</label>
                            <input type="number" class="form-control" id="nuptk" name="nuptk" placeholder="nuptk" value="<?= $guru['nuptk']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis kelamin</label>
                            <select class="form-select" name="jk" id="jk">
                                <option value="0" >Pilih Jenis Kelamin</option>
                                <option value="laki-laki" <?php if($guru['jk']=='laki-laki') echo "selected"; ?>>Laki-Laki</option>
                                <option value="perempuan" <?php if($guru['jk']=='perempuan') echo "selected"; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tempat" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir" value="<?= $guru['tempat']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tg_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $guru['tgl_lahir']; ?>">
                        </div>
                        <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" name="agama" id="agama">
                                <option value="0">Pilih Agama</option>
                                <option value="Islam" <?php if($guru['agama']=='Islam') echo "selected"; ?>>Islam</option>
                                <option value="Kristen" <?php if($guru['agama']=='Kristen') echo "selected"; ?>>Kristen</option>
                                <option value="Hindu" <?php if($guru['agama']=='Hindu') echo "selected"; ?>>Hindu</option>
                                <option value="Budha" <?php if($guru['agama']=='Budha') echo "selected"; ?>>Budha</option>
                                <option value="Katolik" <?php if($guru['agama']=='Katolik') echo "selected"; ?>>Katolik</option>
                                <option value="Konghucu" <?php if($guru['agama']=='Konghucu') echo "selected"; ?>>Konghucu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tingkat" class="form-label">Tingkat</label>
                            <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="tingkat" value="<?= $guru['tingkat']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" value="<?= $guru['jurusan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="mapel" class="form-label">Mapel</label>
                            <input type="text" class="form-control" id="mapel" name="mapel" placeholder="Mapel" value="<?= $guru['mapel']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="kelas" value="<?= $guru['kelas']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="<?= $guru['jabatan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="sertifikat" class="form-label">Sertifikat</label>
                            <input type="text" class="form-control" id="sertifikat" name="sertifikat" placeholder="Sertifikat" value="<?= $guru['sertifikat']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection(); ?>