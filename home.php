<?php
require "config.php";
checkLogin();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>Welcome, <?= $_SESSION['user'] ?> 🎉</h1>

    <!-- Button Row -->
    <div style="margin-bottom:20px;">
        <a href="index.php" class="btn btn-primary">📋 Manage Students</a>
        <a href="create_student.php" class="btn btn-success">➕ Add Student</a>
    </div>

    <a href="logout.php" class="btn btn-danger">🚪 Logout</a>
</div>
</body>
</html>
