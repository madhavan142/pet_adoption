<?php include 'auth.php'; ?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Admin Dashboard</title><link rel="stylesheet" href="../assets/style.css"></head>
<body><main class="container">
<h1>Admin Dashboard</h1>
<p><a class="btn" href="pets.php">Manage Pets</a> <a class="btn" href="applications.php">Adoption Applications</a> <a class="btn" href="logout.php">Logout</a></p>
<div class="cards">
<div class="info-card"><h2><?= mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) c FROM pets"))['c'] ?></h2><p>Total Pets</p></div>
<div class="info-card"><h2><?= mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) c FROM pets WHERE status='Available'"))['c'] ?></h2><p>Available Pets</p></div>
<div class="info-card"><h2><?= mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) c FROM adoptions"))['c'] ?></h2><p>Applications</p></div>
</div></main></body></html>