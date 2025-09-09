<?php
require "config.php";
require "classes/Student.php";

checkLogin();

$student = new Student($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student->add($_POST['id_number'], $_POST['name'], $_POST['age'], $_POST['email'], $_POST['course']);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>➕ Add Student</h1>
    <form method="POST">
        <label>ID Number</label>
        <input type="text" name="id_number" required>

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Age</label>
        <input type="number" name="age" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Course</label>
        <input type="text" name="course" required>

        <button type="submit">Save</button>
    </form>
    <p><a href="index.php" class="btn">⬅ Back</a></p>
</div>
</body>
</html>
