<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Schedules</h1>
<a href="<?= base_url('schedules/create') ?>" class="btn btn-primary mb-3">Add New Schedule</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Route</th>
            <th>Transport</th>
            <th>Departure Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($schedules as $schedule): ?>
        <tr>
            <td><?= $schedule['route_name'] ?></td>
            <td><?= $schedule['transport_name'] ?></td>
            <td><?= $schedule['departure_time'] ?></td>
            <td>
                <a href="<?= base_url('schedules/edit/'.$schedule['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= base_url('schedules/delete/'.$schedule['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>