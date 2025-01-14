<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <div id="printableContent">
        <table class="my-3">
            <tbody>
                <tr>
                    <td>Nama </td>
                    <td> : <?= $siswa['nama']; ?></td>
                </tr>
                <tr>
                    <td>NIS </td>
                    <td> : <?= $siswa['nis']; ?></td>
                </tr>
                <tr>
                    <td>NISN </td>
                    <td> : <?= $siswa['nisn']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin </td>
                    <td> : <?= $siswa['jk']; ?></td>
                </tr>
            </tbody>
        </table>

        <div class="card mb-4">
            <div class="card-body">
                <h4>Pembayaran spp</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>kode transaksi</th>
                            <th>periode</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($spp as $dspp) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $dspp['kspp']; ?></td>
                                <td><?= $dspp['periode']; ?></td>
                                <td><?= $dspp['tgl_spp']; ?></td>
                                <td><?= $dspp['bspp']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-center">Total Bayar</td>
                            <td><?= $mspp['totbspp']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="table-info text-center"><?= $mspp['status']; ?></td>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


        <div class="card mb-4">
            <div class="card-body">
                <h4>Pembayaran tahunan</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>kode transaksi</th>
                            <th>periode</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tahunan as $dtahunan) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $dtahunan['ktahunan']; ?></td>
                                <td><?= $dtahunan['periode']; ?></td>
                                <td><?= $dtahunan['tgl_tahunan']; ?></td>
                                <td><?= $dtahunan['btahunan']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-center">Total Bayar</td>
                            <td><?= $mtahunan['totbtahunan']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="table-info text-center"><?= $mtahunan['status']; ?></td>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h4>Pembayaran pangkal</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>kode transaksi</th>
                            <th>periode</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pangkal as $dpangkal) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $dpangkal['kpangkal']; ?></td>
                                <td><?= $dpangkal['periode']; ?></td>
                                <td><?= $dpangkal['tgl_pangkal']; ?></td>
                                <td><?= $dpangkal['bpangkal']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-center">Total Bayar</td>
                            <td><?= $mpangkal['totbpangkal']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="table-info text-center"><?= $mpangkal['status']; ?></td>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


    </div>





    <div class="text-center mt-4 no-print">
        <button onclick="printContent()" class="btn btn-primary">Cetak PDF</button>
        <a href="<?= base_url('vuser'); ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<script>
    function printContent() {
        var printContents = document.getElementById('printableContent').outerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title>Cetak</title></head><body>" + printContents + "</body></html>";
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

<?= $this->endsection(); ?>