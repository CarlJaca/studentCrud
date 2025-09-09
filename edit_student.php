<?php
// edit_student.php
require "config.php";
require "classes/Student.php";

// ensure user is logged in (if you use checkLogin in config.php)
if (function_exists('checkLogin')) {
    checkLogin();
}

// Instantiate Student object (this is the missing piece)
$studentObj = new Student($pdo);

// If no id provided in GET and not a POST update, redirect back
if (!isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

// Handle update when the form is submitted (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = $_POST['id'] ?? null;
    $id_num   = trim($_POST['id_number'] ?? '');
    $name     = trim($_POST['name'] ?? '');
    $age      = (int)($_POST['age'] ?? 0);
    $email    = trim($_POST['email'] ?? '');
    $course   = trim($_POST['course'] ?? '');

    if ($id) {
        $studentObj->update($id, $id_num, $name, $age, $email, $course);
    }

    header("Location: index.php");
    exit();
}

// If GET, load student data for the form
$id = $_GET['id'];
$student = $studentObj->getById($id);

if (!$student) {
    // student not found
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container login-box">
    <h1>✏ Edit Student</h1>

    <form method="POST" novalidate>
        <!-- keep id hidden for update -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($student['id']) ?>">

        <label for="id_number">ID Number</label>
        <input id="id_number" name="id_number" type="text" value="<?= htmlspecialchars($student['id_number']) ?>" required>

        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="<?= htmlspecialchars($student['name']) ?>" required>

        <label for="age">Age</label>
        <input id="age" name="age" type="number" value="<?= htmlspecialchars($student['age']) ?>" required>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="<?= htmlspecialchars($student['email']) ?>" required>

        <label for="course">Course</label>
        <input id="course" name="course" type="text" value="<?= htmlspecialchars($student['course']) ?>" required>

        <button type="submit" class="btn btn-primary">💾 Update</button>
        <a href="index.php" class="btn btn-warning" style="display:inline-block;margin-left:8px;">⬅ Back</a>
    </form>
</div>
</body>
</html>
