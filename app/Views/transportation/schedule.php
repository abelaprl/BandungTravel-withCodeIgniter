<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1 class="mb-4">Jadwal Perjalanan</h1>
    <h2 class="mb-3"><?= $route['start_point'] ?> - <?= $route['end_point'] ?></h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Waktu Keberangkatan</th>
                <th>Waktu Tiba</th>
                <th>Jenis Kendaraan</th>
                <th>Kapasitas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
                <tr>
                    <td><?= $schedule['departure_time'] ?></td>
                    <td><?= $schedule['arrival_time'] ?></td>
                    <td><?= $schedule['type'] ?></td>
                    <td><?= $schedule['capacity'] ?> orang</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= site_url('transportation/route/' . $route['id']) ?>" class="btn btn-secondary mt-4">Kembali ke Detail Rute</a>
</div>
<?= $this->endSection() ?>

