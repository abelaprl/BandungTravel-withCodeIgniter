<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1 class="mb-4">Detail Destinasi</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $destination['name'] ?></h5>
            <p class="card-text">Lokasi: <?= $destination['location'] ?></p>
            <p class="card-text"><?= $destination['description'] ?></p>
            <p class="card-text">Kategori: <?= ucfirst($destination['category']) ?></p>
        </div>
    </div>

    <a href="<?= site_url('transportation') ?>" class="btn btn-secondary mt-4">Kembali ke Beranda</a>
</div>
<?= $this->endSection() ?>

