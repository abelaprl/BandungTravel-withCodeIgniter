<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1 class="mb-4">Detail Rute</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $route['start_point'] ?> - <?= $route['end_point'] ?></h5>
            <p class="card-text">Jarak: <?= $route['distance'] ?> km</p>
            <p class="card-text">Estimasi Waktu: <?= $route['estimated_time'] ?> menit</p>
            <p class="card-text">Area: <?= $route['area'] ?></p>
        </div>
    </div>

    <h2 class="mt-4">Pilihan Transportasi</h2>
    <div class="row">
        <?php foreach ($transports as $transport): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $transport['type'] ?></h5>
                        <p class="card-text">Kapasitas: <?= $transport['capacity'] ?> orang</p>
                        <a href="<?= site_url('transportation/schedule/' . $route['id']) ?>" class="btn btn-primary">Lihat Jadwal</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="<?= site_url('transportation') ?>" class="btn btn-secondary mt-4">Kembali ke Beranda</a>
</div>
<?= $this->endSection() ?>

