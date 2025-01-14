<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
        <div class="card">
                <h5 class="card-header" style="background-color:rgb(31, 143, 196); color: white;">Input Data Guru</h5>
                <div class="card-body">
                    <p class="card-text">
                    <form action="<?= base_url('guru/input'); ?>" method="post">
                        <div class="mb-3">
                            <label for="nips" class="form-label">NIPS</label>
                            <input type="number" class="form-control" id="nips" name="nips" placeholder="NIS">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label for="nuptk" class="form-label">NUPTK</label>
                            <input type="number" class="form-control" id="nuptk" name="nuptk" placeholder="nuptk">
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis kelamin</label>
                            <select class="form-select" name="jk" id="jk">
                                <option value="0">Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tempat" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tg_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
                        </div>
                        <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" name="agama" id="agama">
                                <option value="0">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tingkat" class="form-label">Tingkat</label>
                            <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="tingkat">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan">
                        </div>
                        <div class="mb-3">
                            <label for="mapel" class="form-label">Mapel</label>
                            <input type="text" class="form-control" id="mapel" name="mapel" placeholder="Mapel">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="kelas">
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                        </div>
                        <div class="mb-3">
                            <label for="sertifikat" class="form-label">Sertifikat</label>
                            <input type="text" class="form-control" id="sertifikat" name="sertifikat" placeholder="Sertifikat">
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