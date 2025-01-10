<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Transportasi Wisata</title>
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
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('logout') ?>">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('login') ?>">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4">Selamat Datang di Sistem Manajemen Transportasi Wisata</h1>
        
        <div class="row mb-4">
            <div class="col-md-6">
                <h2>Filter Rute</h2>
                <form id="filterForm">
                    <div class="mb-3">
                        <label for="distance" class="form-label">Jarak Maksimum (km)</label>
                        <input type="number" class="form-control" id="distance" name="distance">
                    </div>
                    <div class="mb-3">
                        <label for="area" class="form-label">Area</label>
                        <select class="form-select" id="area" name="area">
                            <option value="">Semua Area</option>
                            <?php foreach ($areas as $area): ?>
                                <option value="<?= $area['area'] ?>"><?= $area['area'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>

        <div id="routeList">
            <?= view('partials/route_list', ['routes' => $routes]) ?>
        </div>

        <h2 class="mt-4">Destinasi Populer</h2>
        <div class="row">
            <?php foreach ($destinations as $destination): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $destination['name'] ?></h5>
                            <p class="card-text">Lokasi: <?= $destination['location'] ?></p>
                            <a href="<?= site_url('tourism/destination/' . $destination['id']) ?>" class="btn btn-info">Detail Destinasi</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= site_url('tourism/filterRoutes') ?>',
                    method: 'GET',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#routeList').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
