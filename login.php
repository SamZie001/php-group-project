<?php
session_start();
include 'functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $user = getUserByEmail($email);
    if($user) {
        // Verify password
        if(password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: login.php?login_error=Incorrect password");
            exit();
        }
    } else {
        header("Location: login.php?login_error=Email not found");
        exit();
    }
}
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Collab</title>
    <link rel="stylesheet" href="./styles/login.css" />
  </head>
  <body>
      <h1>Login to Collab</h1>
      <p>Don't have an account, signup <a href="index.php">here</a></p>

      <form method="post" action="login.php">
        <?php if(isset($_GET['login_error'])) { ?>
        <p class="error"><?php echo $_GET['login_error']; ?></p>
        <?php } ?>
        <label>Email:</label>
        <input type="email" name="email" required />
        <label>Password:</label>
        <input type="password" name="password" required />
        <button type="submit">Login</button>
      </form>
  </body>
</html>