<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Bandung Travel Recommendations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Welcome to Bandung Travel Recommendations</h1>
        <form action="<?= site_url('recommendation/save-preferences') ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="preference" class="form-label">Travel Preference</label>
                <select class="form-select" id="preference" name="preference" required>
                    <option value="">Select your travel preference</option>
                    <option value="nature">Nature & Adventure</option>
                    <option value="culture">Cultural & Heritage</option>
                    <option value="culinary">Food & Culinary</option>
                    <option value="shopping">Shopping & Entertainment</option>
                    <option value="religious">Religious & Spiritual</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Get Started</button>
        </form>
        <p class="mt-3">Already have an account? <a href="<?= site_url('recommendation/login') ?>">Login here</a></p>
    </div>
</body>
</html>

