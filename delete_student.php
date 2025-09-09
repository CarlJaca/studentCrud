<?php
require "config.php";
require "classes/Student.php";

$student = new Student($pdo);

if (isset($_GET['id'])) {
    $student->delete($_GET['id']);
}

header("Location: index.php");
exit();
