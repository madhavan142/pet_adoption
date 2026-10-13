<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pet Adoption Management System</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header>
  <div class="container nav">
    <a class="logo" href="index.php">🐾 PetCare</a>
    <nav>
      <a href="index.php">Home</a>
      <a href="pets.php">Available Pets</a>
      <a href="adopt.php">Adopt</a>
      <a href="admin/login.php">Admin</a>
    </nav>
  </div>
</header>
<main class="container">
