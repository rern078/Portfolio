<?php
session_start();  // This must be at the top of the page
// requireLogin();  // Redirects if not logged in
if (!isset($_SESSION['user_id'])) {
      // If session not set, redirect to login page
      // header("Location: " . pageUrl('logout'));
      header("Location: " . pageUrl('logout'));
      exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
      <title>Admin Panel</title>
</head>

<body>
      <h1>Welcome, <?= $_SESSION['username'] ?>!</h1>
      <a href="../auth/logout.php">Logout</a>
</body>

</html>