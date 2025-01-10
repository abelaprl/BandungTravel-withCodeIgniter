<h2>Daftar Rute</h2>
<div class="row">
    <?php
    $filteredRoutes = $routes;
    if (isset($preference)) {
        $filteredRoutes = array_filter($routes, function($route) use ($preference) {
            return stripos($route['area'], $preference) !== false;
        });
    }
    ?>
    <?php if (empty($filteredRoutes)): ?>
        <div class="col-12">
            <p>Tidak ada rute yang sesuai dengan filter.</p>
        </div>
    <?php else: ?>
        <?php foreach ($filteredRoutes as $route): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $route['start_point'] ?> - <?= $route['end_point'] ?></h5>
                        <p class="card-text">Jarak: <?= $route['distance'] ?> km</p>
                        <p class="card-text">Estimasi Waktu: <?= $route['estimated_time'] ?> menit</p>
                        <p class="card-text">Area: <?= $route['area'] ?></p>
                        <a href="<?= site_url('transportation/route/' . $route['id']) ?>" class="btn btn-primary">Detail Rute</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

