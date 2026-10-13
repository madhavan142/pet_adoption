<?php
include 'config.php';
$id = (int)($_GET['id'] ?? 0);
$result = mysqli_query($conn, "SELECT * FROM pets WHERE id=$id");
$pet = mysqli_fetch_assoc($result);
include 'header.php';
if (!$pet) { echo '<div class="alert error">Pet not found.</div>'; include 'footer.php'; exit; }
?>
<div class="details">
  <div class="large-pet-image"><?= $pet['type']==='Cat' ? '🐱' : '🐶' ?></div>
  <div>
    <h2><?= htmlspecialchars($pet['name']) ?></h2>
    <p><b>Type:</b> <?= htmlspecialchars($pet['type']) ?></p>
    <p><b>Breed:</b> <?= htmlspecialchars($pet['breed']) ?></p>
    <p><b>Age:</b> <?= (int)$pet['age'] ?> years</p>
    <p><b>Gender:</b> <?= htmlspecialchars($pet['gender']) ?></p>
    <p><?= nl2br(htmlspecialchars($pet['description'])) ?></p>
    <a class="btn" href="adopt.php?pet_id=<?= (int)$pet['id'] ?>">Adopt <?= htmlspecialchars($pet['name']) ?></a>
  </div>
</div>
<?php include 'footer.php'; ?>