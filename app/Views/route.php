<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Rute</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <a href="<?= site_url('tourism/schedule/' . $route['id']) ?>" class="btn btn-primary">Lihat Jadwal</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="<?= site_url('/') ?>" class="btn btn-secondary mt-4">Kembali ke Beranda</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>