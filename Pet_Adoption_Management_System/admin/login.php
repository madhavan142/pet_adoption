<?php
session_start();
if (isset($_SESSION['admin'])) { header("Location: dashboard.php"); exit; }
$error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if ($_POST['username']==='admin' && $_POST['password']==='admin123') {
        $_SESSION['admin']='admin';
        header("Location: dashboard.php"); exit;
    }
    $error='Invalid username or password.';
}
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Admin Login</title><link rel="stylesheet" href="../assets/style.css"></head>
<body><main class="container"><div class="form-box"><h2>Admin Login</h2>
<?php if($error): ?><div class="alert error"><?= $error ?></div><?php endif; ?>
<form method="post"><label>Username</label><input name="username" required><label>Password</label><input type="password" name="password" required><button class="btn">Login</button></form>
<p>Demo: <b>admin</b> / <b>admin123</b></p><a href="../index.php">← Back to Home</a></div></main></body></html>