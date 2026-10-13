<?php
include 'config.php';
$pet_id = (int)($_GET['pet_id'] ?? $_POST['pet_id'] ?? 0);
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $reason = trim($_POST['reason']);
    if ($name && $email && $phone && $address) {
        $stmt = mysqli_prepare($conn, "INSERT INTO adoptions (pet_id, applicant_name, email, phone, address, reason, status) VALUES (?, ?, ?, ?, ?, ?, 'Pending')");
        mysqli_stmt_bind_param($stmt, "isssss", $pet_id, $name, $email, $phone, $address, $reason);
        mysqli_stmt_execute($stmt);
        $message = "Application submitted successfully!";
    } else {
        $message = "Please fill all required fields.";
    }
}
$pet = null;
if ($pet_id) {
    $r = mysqli_query($conn, "SELECT * FROM pets WHERE id=$pet_id");
    $pet = mysqli_fetch_assoc($r);
}
include 'header.php';
?>
<h2>Pet Adoption Application</h2>
<?php if($message): ?><div class="alert"><?= htmlspecialchars($message) ?></div><?php endif; ?>
<form class="form-box" method="post">
  <input type="hidden" name="pet_id" value="<?= $pet_id ?>">
  <label>Pet</label>
  <select name="pet_id" required>
    <option value="">-- Select Pet --</option>
    <?php $r=mysqli_query($conn,"SELECT id,name FROM pets WHERE status='Available' ORDER BY name");
    while($p=mysqli_fetch_assoc($r)): ?>
      <option value="<?= $p['id'] ?>" <?= $pet_id==$p['id']?'selected':'' ?>><?= htmlspecialchars($p['name']) ?></option>
    <?php endwhile; ?>
  </select>
  <label>Applicant Name *</label><input name="name" required>
  <label>Email *</label><input type="email" name="email" required>
  <label>Phone *</label><input name="phone" required>
  <label>Address *</label><textarea name="address" required></textarea>
  <label>Why do you want to adopt?</label><textarea name="reason"></textarea>
  <button class="btn" type="submit">Submit Application</button>
</form>
<?php include 'footer.php'; ?>