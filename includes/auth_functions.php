<?php
require_once 'config.php';
require_once 'pageFile.php';

// ✅ Register User
function registerUser($username, $email, $password)
{
      global $pdo;
      $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Secure hashing
      $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
      $stmt = $pdo->prepare($sql);
      return $stmt->execute([$username, $email, $hashed_password]);
}

// ✅ Login User
function loginUser($username, $password)
{
      global $pdo;
      $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
      $stmt->execute([$username]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$user) {
            die("❌ User not found!");  // Debugging
      }

      if (!password_verify($password, $user['password'])) {
            die("❌ Password incorrect!");  // Debugging
      }

      session_start();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];

      // Redirect after login
      // header("Location: ../admin/index.php");  // Check if this is correct
      header("Location: " . baseUrl('index'));
      exit;  // Always add exit after header
}



// ✅ Check if User is Logged In
function checkLogin()
{
      return isset($_SESSION['user_id']);
}

// ✅ Redirect to Login if Not Logged In
function requireLogin()
{
      if (!checkLogin()) {
            header("Location: /auth/login.php");
            exit;
      }
}
