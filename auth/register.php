<?php
require_once '../includes/auth_functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      if (registerUser($username, $email, $password)) {
            // After successful registration, log the user in
            if (loginUser($username, $password)) {
                  // header("Location: ../admin/index.php");
                  header("Location: " . pageUrl('index'));
                  exit; 
            } else {
                  $error = "Login failed after registration.";
            }
      } else {
            $error = "Registration failed! Please try again.";
      }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <title>Register</title>
</head>

<body>
      <h2>Register</h2>
      <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
      <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
      </form>
      <p>Already have an account? <a href="/login">Login</a></p>
</body>

</html>