<?php
session_start();
include 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=Invalid email format");
        exit();
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->execute(['email' => $email]);
    if($stmt->rowCount() > 0) {
      header("Location: index.php?error=Email already taken");
      exit();
    }
    
    // Insert user into database
    insertUser($name, $email, $password, $role);

    // Login user
    $user = getUserByEmail($email);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_role'] = $user['role'];
    header("Location: dashboard.php");
    exit();
}
?>
