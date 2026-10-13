<?php include 'auth.php';
if(isset($_GET['action'],$_GET['id'])){
  $id=(int)$_GET['id'];$status=$_GET['action']==='approve'?'Approved':'Rejected';
  mysqli_query($conn,"UPDATE adoptions SET status='$status' WHERE id=$id");
  if($status==='Approved'){ $r=mysqli_query($conn,"SELECT pet_id FROM adoptions WHERE id=$id");$a=mysqli_fetch_assoc($r);mysqli_query($conn,"UPDATE pets SET status='Adopted' WHERE id=".$a['pet_id']);}
  header("Location: applications.php");exit;
}
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Applications</title><link rel="stylesheet" href="../assets/style.css"></head><body><main class="container">
<h1>Adoption Applications</h1><a class="btn" href="dashboard.php">Dashboard</a>
<table style="width:100%;margin-top:20px;background:white;padding:10px;border-collapse:collapse"><tr><th>Pet</th><th>Applicant</th><th>Phone</th><th>Status</th><th>Action</th></tr>
<?php $r=mysqli_query($conn,"SELECT a.*,p.name pet_name FROM adoptions a JOIN pets p ON p.id=a.pet_id ORDER BY a.id DESC");while($a=mysqli_fetch_assoc($r)):?>
<tr><td><?=htmlspecialchars($a['pet_name'])?></td><td><?=htmlspecialchars($a['applicant_name'])?></td><td><?=htmlspecialchars($a['phone'])?></td><td><?=htmlspecialchars($a['status'])?></td><td><?php if($a['status']==='Pending'):?><a href="?action=approve&id=<?=$a['id']?>">Approve</a> | <a href="?action=reject&id=<?=$a['id']?>">Reject</a><?php else:?>Completed<?php endif;?></td></tr>
<?php endwhile;?></table></main></body></html>