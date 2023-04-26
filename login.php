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
  </head>
  <body>
    <h1>Login to Collab</h1>
    <p>Don't have an account, signup <a href="index.php">here</a></p>

    <form method="post" action="login.php">
      <?php if(isset($_GET['login_error'])) { ?>
      <p class="error"><?php echo $_GET['login_error']; ?></p>
      <?php } ?>
      <label>Email:</label>
      <input id="email" type="email" name="email" required />
      <label>Password:</label>
      <input type="password" name="password" required />
      <p>Forgot password ? Reset it <span id="reset-password">here</span></p>
      <input
        id="reset-input"
        type="password"
        placeholder="type new password"
        class="noshow"
      />
      <button id="submit" type="submit">Login</button>
    </form>
      <button id="reset-btn" style="display: none">Reset Password</button>
  </body>
  <script>
    const reset = document.getElementById("reset-password");
    const email = document.getElementById("email");
    const resetInput = document.getElementById("reset-input");
    const resetBtn = document.getElementById("reset-btn");
    const submit = document.getElementById("submit");

    reset.addEventListener("click", () => {
      resetInput.classList.remove("noshow");
      submit.style.display = "none";
      resetBtn.style.display = "block";
    });
    
    email.addEventListener('keyup', ()=>{
      if(email.value){
      resetInput.classList.add("noshow");
      submit.style.display = "block";
      resetBtn.style.display = "none";
    }
    })
  </script>
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
    h1{
      color: #10a37f;
    }

    a, span {
      cursor: pointer;
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
      margin-top: 10px;
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
    .error {
      padding: 1rem;
      color: red;
      font-weight: bold;
    }
    .noshow {
      display: none;
    }

  </style>
</html>
