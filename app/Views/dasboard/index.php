<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                <h5 class="card-title">Laporan Data Siswa</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url('siswa'); ?>">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Laporan Data Guru</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url('guru'); ?>">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                <h5 class="card-title">Laporan Pembayaran</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="text-white stretched-link" href="<?= base_url('spp'); ?>">More Information</a>
                    <div class="text-white"><i class="fas fa-arrow-circle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endsection(); ?>