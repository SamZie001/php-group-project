<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "phpgroupproject";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

function insertUser($name, $email, $password, $role) {
  global $pdo;
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashed_password, 'role' => $role]);
}

function getUserByEmail($email) {
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $stmt->execute(['email' => $email]);
  return $stmt->fetch();
}

?>
