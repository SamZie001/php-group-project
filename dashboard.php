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
    <link rel="stylesheet" href="./styles/dashboard.css" />
  </head>
  <body>
      <nav>
        <ul>
          <li><a href="./dashboard.php">Dashboard</a></li>
          <li>
            <form action="./logout.php" method="post">
              <input type="submit" name="logout" value="Logout" />
            </form>
          </li>
        </ul>
      </nav>

      <h1>
        Welcome back,
        <?php echo get_user_by_id($_SESSION['user_id'])['name'];?>
        [<?php echo strtoupper($_SESSION['user_role']);   ?>]
      </h1>
      <?php if (isUserAdmin()): ?>
      <h2>Admin Content</h2>
      <ul class="content">
        <li><a href="./admin/admin_images.php">Administrator Images</a></li>
        <li><a href="./admin/admin_videos.php">Administrator Videos</a></li>
      </ul>
      <?php endif; ?>
      <?php if (isUserEditor()): ?>
      <h2>Editor Content</h2>
      <ul class="content">
        <li><a href="./editor/editor_articles.php">Editor Articles</a></li>
        <li><a href="./editor/editor_images.php">Editor Images</a></li>
      </ul>
      <?php endif; ?>
      <?php if (isUserRegular()): ?>
      <h2>Regular User Content</h2>
      <ul class="content">
        <li><a href="./regular/user_articles.php">Your regular Articles</a></li>
        <li><a href="./regular/user_images.php">Your regular Images</a></li>
        <li><a href="./regular/user_videos.php">Your regular Videos</a></li>
      </ul>
      <?php endif; ?>
  </body>
</html>
