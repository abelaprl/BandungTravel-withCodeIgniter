<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandung Travel Recommendations - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Recommended Destinations</h1>
        <div class="row">
            <?php foreach ($destinations as $destination): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $destination['name'] ?></h5>
                            <p class="card-text"><?= substr($destination['description'], 0, 100) ?>...</p>
                            <a href="/destination/<?= $destination['id'] ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-4">
            <a href="<?= site_url('transportation') ?>" class="btn btn-success">Lanjut ke Manajemen Transportasi</a>
        </div>
        <div class="mt-2">
            <a href="<?= site_url('logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>

