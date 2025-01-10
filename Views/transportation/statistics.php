<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1 class="mb-4">Statistik Destinasi Wisata</h1>

<div class="row">
    <div class="col-md-6">
        <h2>Grafik Batang Popularitas Destinasi</h2>
        <canvas id="barChart" width="400" height="200"></canvas>
    </div>
    <div class="col-md-6">
        <h2>Diagram Pie Popularitas Destinasi</h2>
        <canvas id="pieChart" width="400" height="200"></canvas>
    </div>
</div>

<h2 class="mt-4">Tabel Popularitas Destinasi</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama Destinasi</th>
            <th>Popularitas</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($popularDestinations as $destination): ?>
            <tr>
                <td><?= $destination['name'] ?></td>
                <td><?= number_format($destination['popularity'] * 100, 2) ?>%</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= site_url('/') ?>" class="btn btn-secondary mt-4">Kembali ke Beranda</a>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    var barCtx = document.getElementById('barChart').getContext('2d');
    var pieCtx = document.getElementById('pieChart').getContext('2d');

    var destinations = <?= json_encode(array_column($popularDestinations, 'name')) ?>;
    var popularities = <?= json_encode(array_column($popularDestinations, 'popularity')) ?>;

    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: destinations,
            datasets: [{
                label: 'Popularitas Destinasi',
                data: popularities,
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

    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: destinations,
            datasets: [{
                data: popularities,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ]
            }]
        }
    });
</script>
<?= $this->endSection() ?>

