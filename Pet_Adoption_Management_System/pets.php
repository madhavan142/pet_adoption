<?php
include 'config.php';
include 'header.php';
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$sql = "SELECT * FROM pets WHERE status='Available'";
if ($q !== '') {
    $safe = mysqli_real_escape_string($conn, $q);
    $sql .= " AND (name LIKE '%$safe%' OR breed LIKE '%$safe%' OR type LIKE '%$safe%')";
}
$sql .= " ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<h2>Available Pets</h2>
<form class="search" method="get">
  <input type="text" name="q" placeholder="Search by name, breed or type" value="<?= htmlspecialchars($q) ?>">
  <button class="btn" type="submit">Search</button>
</form>
<div class="pet-grid">
<?php while($pet = mysqli_fetch_assoc($result)): ?>
  <div class="pet-card">
    <div class="pet-image"><?= $pet['type']==='Cat' ? '🐱' : '🐶' ?></div>
    <h3><?= htmlspecialchars($pet['name']) ?></h3>
    <p><b>Type:</b> <?= htmlspecialchars($pet['type']) ?></p>
    <p><b>Breed:</b> <?= htmlspecialchars($pet['breed']) ?></p>
    <p><b>Age:</b> <?= (int)$pet['age'] ?> years</p>
    <a class="btn" href="pet_details.php?id=<?= (int)$pet['id'] ?>">View Details</a>
  </div>
<?php endwhile; ?>
</div>
<?php include 'footer.php'; ?>