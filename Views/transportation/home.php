<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1 class="mb-4">Sistem Manajemen Transportasi Wisata</h1>
    
    <?php if (isset($preference)): ?>
        <div class="alert alert-info">
            Preferensi Anda: <?= ucfirst($preference) ?>
        </div>
    <?php endif; ?>

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
        <?= view('transportation/route_list', ['routes' => $routes, 'preference' => $preference]) ?>
    </div>

    <h2 class="mt-4">Destinasi Populer</h2>
    <div class="row">
        <?php foreach ($destinations as $destination): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $destination['name'] ?></h5>
                        <p class="card-text">Lokasi: <?= $destination['location'] ?></p>
                        <a href="<?= site_url('transportation/destination/' . $destination['id']) ?>" class="btn btn-info">Detail Destinasi</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#filterForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= site_url('transportation/filterRoutes') ?>',
                method: 'GET',
                data: $(this).serialize(),
                success: function(response) {
                    $('#routeList').html(response);
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>

