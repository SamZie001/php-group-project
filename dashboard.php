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
    <title>Dashboard</title>
  </head>
  <body>
    <nav>
      <ul>
        <li>
          <?php echo get_user_by_id($_SESSION['user_id'])['name'];?>: [<?php echo strtoupper($_SESSION['user_role']);   ?>]
        </li>
        <li><a href="./dashboard.php">Dashboard</a></li>
        <li>
          <form action="./logout.php" method="post">
            <input type="submit" name="logout" value="Logout" />
          </form>
        </li>
      </ul>
    </nav>

    <h1>Welcome back</h1>
    <br />
    <p>Navigate through your resources and have a nice time</p>
    <?php if (isUserAdmin()): ?>
    <div class="content">
      <a href="./admin/admin_images.php">Administrator Images</a>
      <a href="./admin/admin_videos.php">Administrator Videos</a>
    </div>
    <?php endif; ?>
    <?php if (isUserEditor()): ?>
    <div class="content">
      <a href="./editor/editor_articles.php">Editor Articles</a>
      <a href="./editor/editor_images.php">Editor Images</a>
    </div>
    <?php endif; ?>
    <?php if (isUserRegular()): ?>
    <div class="content">
      <a href="./regular/user_articles.php">Articles for you</a>
      <a href="./regular/user_images.php">Images for you</a>
      <a href="./regular/user_videos.php">Videos for you</a>
    </div>
    <?php endif; ?>
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
    .content {
      list-style: none;
      display: grid;
      grid-gap: 20px;
      width: 500px;
      margin: 0 auto;
      margin-top: 30px;
    }

    .content a {
      font-size: 1.2rem;
      display: flex;
      align-items: center;
      font-weight: bold;
      border: 2px solid #8e8ea0;
      height: 75px;
      padding: 12px 15px;
      margin-bottom: 12px;
      border-radius: 5px;
      color: #8e8ea0;
      transition: 0.2s all;
    }
    .content a:hover {
      border-color:#10a37f;
      color: #10a37f;
      rotate: 1deg;
    }
  </style>
</html>
