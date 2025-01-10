<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $destination['name'] ?> - Destination Details</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container mt-5">
       <h1 class="mb-4"><?= $destination['name'] ?></h1>
       <div class="card">
           <div class="card-body">
               <h5 class="card-title">Location: <?= $destination['location'] ?></h5>
               <p class="card-text"><?= $destination['description'] ?></p>
               <p class="card-text"><strong>Category:</strong> <?= ucfirst($destination['category']) ?></p>
           </div>
       </div>
       <a href="<?= site_url('recommendation/dashboard/' . session()->get('preference')) ?>" class="btn btn-primary mt-3">Back to Dashboard</a>
   </div>
</body>
</html>

