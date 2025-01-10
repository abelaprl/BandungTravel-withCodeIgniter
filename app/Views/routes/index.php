<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Routes</h1>
<a href="<?= base_url('routes/create') ?>" class="btn btn-primary mb-3">Add New Route</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Start Point</th>
            <th>End Point</th>
            <th>Distance</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($routes as $route): ?>
        <tr>
            <td><?= $route['name'] ?></td>
            <td><?= $route['start_point'] ?></td>
            <td><?= $route['end_point'] ?></td>
            <td><?= $route['distance'] ?> km</td>
            <td>
                <a href="<?= base_url('routes/edit/'.$route['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= base_url('routes/delete/'.$route['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>