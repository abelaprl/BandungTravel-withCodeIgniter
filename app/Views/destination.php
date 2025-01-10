<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Destinasi</title>
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
                        <a class="nav-link" href="<?= site_url('statistics') ?>">Statistik</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>