<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('template'); ?>/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url('template'); ?>/css/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <?= $this->include('layout/header'); ?>

    <main>
        <?= $this->renderSection('content'); ?>
    </main>
    <?= $this->include('layout/footer'); ?>
    <script>
        // Event listener saat tombol 'Pilih' ditekan
        document.addEventListener('DOMContentLoaded', function() {
            // Delegasi event ke tombol "Pilih"
            document.querySelector('#datatablesSimple').addEventListener('click', function(event) {
                if (event.target.classList.contains('btn-select-nis')) {
                    const nis = event.target.getAttribute('data-nis');
                    const nama = event.target.getAttribute('data-nama');

                    // Isi input form
                    document.getElementById('nis').value = nis;
                    document.getElementById('nama').value = nama;

                    // Tutup modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('modalNIS'));
                    modal.hide();
                }
            });
        });
        document.querySelector('#datatablesSimple').addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-select-nis')) {
                console.log('Tombol Pilih ditekan:', event.target);
                // Debug data yang diterima
                console.log('NIS:', event.target.getAttribute('data-nis'));
                console.log('Nama:', event.target.getAttribute('data-nama'));
            }
        });
        $(document).ready(function() {
            $('#datatablesSimple').DataTable({
                responsive: true
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('template'); ?>/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('template'); ?>/assets/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('template'); ?>/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('template'); ?>/js/datatables-simple-demo.js"></script>
</body>

</html>