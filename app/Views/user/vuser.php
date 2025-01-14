<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="background">
    <div class="overlay"></div>
</div>
<div class="container-fluid px-4">
    <div class="container content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-bordered shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center">Halo <?= esc($namaSiswa); ?>!</h5>
                        <p class="card-text">Selamat datang di halaman beranda sekolah. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa reiciendis quia fuga, modi mollitia quam odit optio ad! Harum repellendus illum vel ea cumque repellat culpa maxime corrupti nobis neque.</p>
                        <a class="btn btn-primary" href="<?= base_url('cetak/laporan/' . ($data['nis'] ?? '')); ?>">Cetak keuangan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>


