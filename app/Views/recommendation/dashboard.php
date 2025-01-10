<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Recommended Destinations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Your Recommended Destinations</h1>
        
        <?php if (isset($preference)): ?>
            <div class="alert alert-info">
                Your preference: <?= ucfirst($preference) ?>
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#updatePreferenceModal">
                    Update Preference
                </button>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php foreach ($destinations as $destination): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $destination['name'] ?></h5>
                            <p class="card-text"><?= substr($destination['description'], 0, 100) ?>...</p>
                            <a href="<?= site_url('recommendation/destination/' . $destination['id']) ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-4">
            <a href="<?= site_url('transportation') ?>" class="btn btn-success">Go to Transportation Management</a>
            <a href="<?= site_url('recommendation/logout') ?>" class="btn btn-danger mt-2">Logout</a>
        </div>
    </div>

    <!-- Update Preference Modal -->
    <div class="modal fade" id="updatePreferenceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Your Travel Preference</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?= site_url('recommendation/update-preference') ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="newPreference" class="form-label">New Preference</label>
                            <select class="form-select" id="newPreference" name="preference" required>
                                <option value="nature" <?= $preference === 'nature' ? 'selected' : '' ?>>Nature & Adventure</option>
                                <option value="culture" <?= $preference === 'culture' ? 'selected' : '' ?>>Cultural & Heritage</option>
                                <option value="culinary" <?= $preference === 'culinary' ? 'selected' : '' ?>>Food & Culinary</option>
                                <option value="shopping" <?= $preference === 'shopping' ? 'selected' : '' ?>>Shopping & Entertainment</option>
                                <option value="religious" <?= $preference === 'religious' ? 'selected' : '' ?>>Religious & Spiritual</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Preference</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

