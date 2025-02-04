<?php
require_once '../includes/auth_functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];

      if (loginUser($username, $password)) {
            // header("Location: ../admin/index.php");
            header("Location: " . pageUrl('dashboard'));
            exit;  // Prevent further execution
      } else {
            $error = "Invalid username or password!";
      }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
      <title>Login</title>
</head>

<body>
      <h2>Login</h2>
      <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
      <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
      </form>
      <p>Don't have an account? <a href="<?php echo pageUrl('register'); ?>">Register</a></p>
</body>

</html>