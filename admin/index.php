<?php
ob_start();
session_start();
if (!isset($_SESSION['user_id'])) {
      header("Location: ../auth/login.php");
      exit();
}
include_once("../includes/admin_function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <title>Admin Dashboard</title>
      <?php include("../admin/dashboard/title.php") ?>
</head>

<body>
      <div class="wrapper">
            <?php include("../admin/dashboard/sidebar.php") ?>
            <div class="main-panel">
                  <?php include("../admin/dashboard/header.php") ?>

                  <div class="container" id="main-container">
                        <?php
                        $allowed_pages = ['index', 'skills', 'experience'];
                        $page = isset($_GET['page']) ? $_GET['page'] : 'index';

                        if (!in_array($page, $allowed_pages)) {
                              $page = 'index';
                        }

                        $file = "../admin/page/admin_$page.php";
                        if (file_exists($file)) {
                              include($file);
                        } else {
                              echo "<p>Page not found!</p>";
                        }
                        ?>
                  </div>

                  <?php include("../admin/dashboard/footer.php") ?>
            </div>
      </div>
</body>

</html>