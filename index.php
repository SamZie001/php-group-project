<?php
session_start();
include 'functions.php';

if(isset($_SESSION['user_id'])) {
  header('Location: dashboard.php');
  exit();
}
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Team Collab</title>
    <link rel="stylesheet" href="./styles/home.css" />
  </head>
  <body>
    <div class="home">
      <h1>Welcome to Team Collab</h1>
      <?php if(isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <form method="post" action="signup.php">
        <h2>Sign Up</h2>
        <p>
          Already don't have an account ? login <a href="login.php">here</a>
        </p>
        <label>Name:</label>
        <input type="text" name="name" required />
        <label>Email:</label>
        <input type="email" name="email" required />
        <label>Password:</label>
        <input type="password" name="password" required />

        <div class="select-role">
          <label>Admin</label>
          <input id="role" name="role" type="radio" value="admin" required/>

          <label>Editor</label>
          <input id="role" name="role" type="radio" value="editor" />

          <label>Regular</label>
          <input id="role" name="role" type="radio" value="regular" />
        </div>
        <button type="submit">Sign Up</button>
      </form>
    </div>
  </body>
</html>
