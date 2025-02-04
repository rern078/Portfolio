<?php
require_once '../includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $email = trim($_POST["email"]);
      $password = $_POST["password"];

      if (loginUser($email, $password)) {
            header("Location: ../admin/index.php");
            exit();
      } else {
            $error = "Invalid login credentials!";
      }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link rel="stylesheet" href="../assets/admin/css/main.css">
      <style>

      </style>
</head>

<body>
      <div class="login-container">
            <h2>Login</h2>
            <?php if (!empty($error)) echo "<p class='error-message'>$error</p>"; ?>
            <form action="" method="POST">
                  <input type="email" name="email" placeholder="Email" required><br>
                  <input type="password" name="password" placeholder="Password" required><br>
                  <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="<?php echo pageUrl('register'); ?>">Register</a></p>
      </div>
</body>

</html>