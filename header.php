<?php
session_start();
    include('functions.php');
    if (!isUserLoggedIn()) {
      header('Location: index.php?error=Log in to access this page');
    }
?>



<!DOCTYPE html>
<html>
  <head>
    <title>Content ready...</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <nav>
      <ul>
      <li>
          <?php echo get_user_by_id($_SESSION['user_id'])['name'];?>: [<?php echo strtoupper($_SESSION['user_role']);   ?>]
        </li>
        <li><a href="../dashboard.php">Dashboard</a></li>
        <li>
          <form action="../logout.php" method="post">
            <input type="submit" name="logout" value="Logout" />
          </form>
        </li>
      </ul>
    </nav>
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
          font-family: "Courier New", Courier, monospace;
        }
        h1,
        h2,
        p {
          text-align: center;
          color: #333;
        }
        a {
          text-decoration: none;
          color: inherit;
        }
        nav {
          box-shadow: 0px 2px 40px 1px #8e8ea0;
          width: 100%;
          margin-bottom: 30px;
          padding: 10px;
        }
        nav ul {
          padding: 10px;
          width: 1100px;
          margin: 0 auto;
          list-style-type: none;
          display: flex;
          justify-content: space-around;
          align-items: center;
        }
        nav ul li,
        nav ul input {
          font-weight: bold;
          font-size: 15px;
          padding: 5px;
          border: none;
          transition: 0.2s all;
        }
        nav ul li:not(:first-child),
        nav ul input {
          cursor: pointer;
          color: skyblue;
        }
        nav ul li:not(:first-child):hover,
        nav ul input:hover {
          color: #10a37f;
        }
        nav ul input {
          background: transparent;
          border: none;
          outline: none;
        }
      </style>
</html>
