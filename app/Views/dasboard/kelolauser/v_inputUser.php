<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="container my-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header" style="background-color:rgb(31, 143, 196); color: white;">Input Data User</h5>
                <div class="card-body">
                    <p class="card-text">
                    <form action="<?= base_url('kuser/input'); ?>" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">level</label>
                            <select class="form-select" name="level" id="level">
                                <option value="0">Pilih level</option>
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                            </select>
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