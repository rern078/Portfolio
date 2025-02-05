<?php
require_once '../includes/functions.php';
// require_once '../includes/pageFile.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $username = trim($_POST["username"]);
      $email = trim($_POST["email"]);
      $password = $_POST["password"];

      if (registerUser($username, $email, $password)) {
            // header("Location: ../admin/index.php");
            header("Location: " . baseUrl('admin'));
            exit();
      } else {
            $error = "Registration failed. Try again!";
      }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <title>Register</title>
      <link rel="stylesheet" href="../assets/admin/css/main.css">
</head>

<body>
      <div class="reigster-container">
            <h2>Register</h2>
            <?php if (!empty($error)) echo "<p class='error-message'>$error</p>"; ?>
            <form action="" method="POST">
                  <input type="text" name="username" placeholder="Username" required><br>
                  <input type="email" name="email" placeholder="Email" required><br>
                  <input type="password" name="password" placeholder="Password" required><br>
                  <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="<?php echo baseUrl('login'); ?>">Login</a></p>
      </div>
</body>

</html>