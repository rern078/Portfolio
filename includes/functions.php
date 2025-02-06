<?php
require_once 'config.php';
session_start();

// ✅ URl config
function baseUrl($path = '')
{
      // return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $path;
      return '/' . $path;
}
// ✅ language

$default_lang = 'en';
$available_langs = ['en', 'cn', 'th'];

$request_uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($request_uri, '/'));

$lang_from_url = $segments[0];

if (in_array($lang_from_url, $available_langs)) {
      $_SESSION['lang'] = $lang_from_url;

      array_shift($segments);
      $request_uri = '/' . implode('/', $segments);
} elseif (!isset($_SESSION['lang'])) {
      $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
      $_SESSION['lang'] = in_array($browser_lang, $available_langs) ? $browser_lang : $default_lang;
}

$current_lang = $_SESSION['lang'];

if ($current_lang !== $lang_from_url) {
      $new_url = '/' . $current_lang . $request_uri;
      header("Location: $new_url");
      exit;
}

// ✅ Register User
function registerUser($username, $email, $password)
{
      global $pdo;
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
      return $stmt->execute([$username, $email, $hashedPassword]);
}

// ✅ Login User
function loginUser($email, $password)
{
      global $pdo;
      $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
      $stmt->execute([$email]);
      $user = $stmt->fetch();

      if ($user) {
            echo "User found in database.<br>";
            if (password_verify($password, $user['password'])) {
                  echo "Password matches!<br>";
                  $_SESSION['user_id'] = $user['id'];
                  $_SESSION['username'] = $user['username'];
                  $_SESSION['role'] = $user['role']; // Optional, if roles exist
                  return true;
            } else {
                  echo "Password does not match.<br>";
            }
      } else {
            echo "User not found.<br>";
      }
      return false;
}



// ✅ Add Portfolio Item
function addPortfolio($title, $category, $description, $image, $project_link)
{
      global $pdo;
      try {
            $sql = "INSERT INTO portfolio (title, category, description, image, project_link) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([$title, $category, $description, $image, $project_link]);
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }
}

// ✅ Get All Portfolio Items (with Pagination Support)
function getPortfolio($limit = null, $offset = 0)
{
      global $pdo;
      try {
            $sql = "SELECT * FROM portfolio ORDER BY created_at DESC";
            if ($limit) {
                  $sql .= " LIMIT :limit OFFSET :offset";
                  $stmt = $pdo->prepare($sql);
                  $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                  $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                  $stmt->execute();
                  return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }
}

// ✅ Get Portfolio Item by ID (For Editing)
function getPortfolioById($id)
{
      global $pdo;
      try {
            $stmt = $pdo->prepare("SELECT * FROM portfolio WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }
}

// ✅ Get Portfolio Items by Category
function getPortfolioByCategory($category, $limit = null, $offset = 0)
{
      global $pdo;
      try {
            $sql = "SELECT * FROM portfolio WHERE category = ? ORDER BY created_at DESC";
            if ($limit) {
                  $sql .= " LIMIT :limit OFFSET :offset";
            }

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $category);
            if ($limit) {
                  $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                  $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }
}

// ✅ Update Portfolio Item
function updatePortfolio($id, $title, $category, $description, $image, $project_link)
{
      global $pdo;
      try {
            if (!empty($image)) {
                  $sql = "UPDATE portfolio SET title = ?, category = ?, description = ?, image = ?, project_link = ? WHERE id = ?";
                  $stmt = $pdo->prepare($sql);
                  return $stmt->execute([$title, $category, $description, $image, $project_link, $id]);
            } else {
                  $sql = "UPDATE portfolio SET title = ?, category = ?, description = ?, project_link = ? WHERE id = ?";
                  $stmt = $pdo->prepare($sql);
                  return $stmt->execute([$title, $category, $description, $project_link, $id]);
            }
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }
}

// ✅ Delete Portfolio Item
function deletePortfolio($id)
{
      global $pdo;
      try {
            $sql = "DELETE FROM portfolio WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([$id]);
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }
}
