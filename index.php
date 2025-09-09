<?php
require "config.php";
require "classes/Student.php";

checkLogin();

$student = new Student($pdo);
$students = $student->getAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Record</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>📚 Student Record</h1>
    <p>
        <a href="create_student.php" class="btn">➕ Add Student</a>
        <a href="home.php" class="btn">🏠 Home</a>
        <a href="logout.php" class="btn btn-danger">🚪 Logout</a>
    </p>
    <table>
        <tr>
            <th>ID</th><th>ID Number</th><th>Name</th><th>Age</th><th>Email</th><th>Course</th><th>Action</th>
        </tr>
        <?php foreach ($students as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= htmlspecialchars($s['id_number']) ?></td>
            <td><?= htmlspecialchars($s['name']) ?></td>
            <td><?= htmlspecialchars($s['age']) ?></td>
            <td><?= htmlspecialchars($s['email']) ?></td>
            <td><?= htmlspecialchars($s['course']) ?></td>
            <td>
    <a href="edit_student.php?id=<?= $s['id'] ?>" class="btn btn-edit">✏ Edit</a>
    <a href="delete_student.php?id=<?= $s['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete this student?');">🗑 Delete</a>
</td>

        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
