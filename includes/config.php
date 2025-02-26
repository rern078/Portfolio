<?php
$host = 'localhost';
$db = 'iPortfolio';
$user = 'root';  // Change if necessary
$pass = '';      // Change if necessary

// infinity free
// $host = 'sql107.infinityfree.com';
// $db = 'if0_38247056_iportfolio';
// $user = 'if0_38247056';  // Change if necessarys
// $pass = 'NOCicaZQPjELHcP';      // Change if necessarys

try {
      $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
      die("Database connection failed: " . $e->getMessage());
}
