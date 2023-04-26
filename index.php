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
  </head>
  <body>
    <main>
      <?php if(isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <h1>Welcome to Team Collab</h1>
      <p>
        Register to join the team as an <strong>admin</strong> , <strong>editor</strong> or a <strong>regular</strong> user or
        <a href="login.php">login</a> to view your dashboard
      </p>

      <form method="post" action="signup.php">
        <h2>Register</h2>
        <label>Name: </label>
        <input type="text" name="name" required />
        <label>Email: </label>
        <input type="email" name="email" required />
        <label>Password: </label>
        <input type="password" name="password" required />

          <p>Select your role </p>
        <div class="select-role">
          <label>Admin </label
          ><input name="role" type="radio" value="admin" required />

          <label>Editor </label
          ><input name="role" type="radio" value="editor" />

          <label>Regular </label
          ><input name="role" type="radio" value="regular" />
        </div>
        <button type="submit">Sign Up</button>
      </form>
    </main>
  </body>
  <style>
    body{
      background: #343541;
      color: #8e8ea0;
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Edu NSW ACT Foundation", cursive;
    }
    h1, strong{
      color: #10a37f;
      text-transform: capitalize;
    }
    a {
      color: skyblue;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline ;
    }
    button {
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 2px;
      cursor: pointer;
      border: none;
      width: 100%;
      padding: 1rem;
      transition: all 0.2s ease-in-out;
      background: #8e8ea0;
      color: #343541;
      
    }
    button:hover {
      background: #10a37f;
      color: #fff;
    }
    h1, h2{
      text-transform: uppercase;
    }
    h1,
    h2,
    p {
      line-height: 2em;
      text-align: center;
    }
    form {
      width: 350px;
      margin: 20px auto;
    }
    form input {
      width: 100%;
      padding: 0.7rem;
      margin-top: 10px;
      border: 1px solid #8e8ea0;
      margin-bottom: 20px;
      outline: none;
      background: #343541;
      color: #8e8ea0;
      transition: all 0.3s;
    }
    form input:focus{
      border-radius: 15px;
    }
    .select-role {
      display: flex;
      align-items: center;
      text-transform: uppercase;
    }
    .select-role input {
      transform: translateY(5px);
      cursor: pointer;
    }
    .error {
      padding: 1rem;
      color: red;
      font-weight: bold;
    }
  </style>
</html>
