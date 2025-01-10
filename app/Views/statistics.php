<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Destinasi Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('/') ?>">Wisata Transport</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('/') ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= site_url('statistics') ?>">Statistik</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>