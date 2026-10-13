<?php include 'auth.php';
if(isset($_GET['delete'])) { $id=(int)$_GET['delete']; mysqli_query($conn,"DELETE FROM pets WHERE id=$id"); header("Location: pets.php"); exit; }
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=trim($_POST['name']);$type=$_POST['type'];$breed=trim($_POST['breed']);$age=(int)$_POST['age'];$gender=$_POST['gender'];$description=trim($_POST['description']);
  $stmt=mysqli_prepare($conn,"INSERT INTO pets(name,type,breed,age,gender,description,status) VALUES(?,?,?,?,?,?,'Available')");
  mysqli_stmt_bind_param($stmt,"ssisss",$name,$type,$breed,$age,$gender,$description);mysqli_stmt_execute($stmt);
}
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Manage Pets</title><link rel="stylesheet" href="../assets/style.css"></head><body><main class="container">
<h1>Manage Pets</h1><a class="btn" href="dashboard.php">Dashboard</a>
<form class="form-box" method="post"><h2>Add New Pet</h2><input name="name" placeholder="Pet name" required>
<select name="type"><option>Dog</option><option>Cat</option></select><input name="breed" placeholder="Breed" required><input type="number" name="age" min="0" placeholder="Age" required>
<select name="gender"><option>Male</option><option>Female</option></select><textarea name="description" placeholder="Description"></textarea><button class="btn">Add Pet</button></form>
<div class="pet-grid"><?php $r=mysqli_query($conn,"SELECT * FROM pets ORDER BY id DESC");while($p=mysqli_fetch_assoc($r)): ?>
<div class="pet-card"><h3><?=htmlspecialchars($p['name'])?></h3><p><?=htmlspecialchars($p['breed'])?> | <?=$p['age']?> years</p><p>Status: <?=$p['status']?></p><a class="btn" href="?delete=<?=$p['id']?>" onclick="return confirm('Delete this pet?')">Delete</a></div>
<?php endwhile;?></div></main></body></html>