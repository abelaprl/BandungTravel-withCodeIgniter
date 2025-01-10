<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1 class="mb-4">Detail Destinasi</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $destination['name'] ?></h5>
        <p class="card-text">Lokasi: <?= $destination['location'] ?></p>
        <p class="card-text">Deskripsi: <?= $destination['description'] ?></p>
        <p class="card-text">Popularitas: <?= number_format($destination['popularity'] * 100, 2) ?>%</p>
    </div>
</div>

<h2 class="mt-4">Grafik Popularitas Destinasi</h2>
<canvas id="popularityChart" width="400" height="200"></canvas>

<a href="<?= site_url('/') ?>" class="btn btn-secondary mt-4">Kembali ke Beranda</a>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    var ctx = document.getElementById('popularityChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($popularDestinations, 'name')) ?>,
            datasets: [{
                label: 'Popularitas Destinasi',
                data: <?= json_encode(array_column($popularDestinations, 'popularity')) ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 1
                }
            }
        }
    });
</script>
<?= $this->endSection() ?>

