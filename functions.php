<?php
  include_once 'db.php';

  function register_user($name, $email, $password) {
      global $pdo;
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
      $stmt->execute([$name, $email, $hashed_password]);
      return $stmt->rowCount() > 0;
  }

  function is_email_unique($email) {
      global $pdo;
      $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
      $stmt->execute([$email]);
      return $stmt->rowCount() == 0;
  }

  function get_user_by_email($email) {
      global $pdo;
      $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
      $stmt->execute([$email]);
      return $stmt->fetch();
  }

  function get_user_by_id($id) {
      global $pdo;
      $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
      $stmt->execute([$id]);
      return $stmt->fetch();
  }

  function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
  }

  function isUserAdmin() {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
        return true;
    } else {
        return false;
    }
  }

  function isUserEditor() {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'editor') {
        return true;
    } else {
        return false;
    }
  }

  function isUserRegular() {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'regular') {
        return true;
    } else {
        return false;
    }
  }
  
?>
