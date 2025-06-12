<?php
require_once 'config.php';
// session_start();

// ✅ URl config
function baseUrl($path = '')
{
      // return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $path;
      return '/' . $path;
}
// ✅ language
function getCurrentLang()
{
      $default_lang = 'en';
      $supported_langs = ['en', 'cn', 'th'];
      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
      $segments = explode('/', trim($uri, '/'));
      $lang = isset($segments[0]) ? $segments[0] : $default_lang;
      if (in_array($lang, $supported_langs)) {
            return $lang;
      } else {
            return $default_lang;
      }
}
$current_lang = getCurrentLang();

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



// ✅ Add Skill Item
function addSkills($skill_name, $category, $description, $proficiency_level, $image_url)
{
      global $pdo;
      try {
            $sql = "INSERT INTO skills (skill_name, category, description, proficiency_level, image_url) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([$skill_name, $category, $description, $proficiency_level, $image_url]);
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }
}

// ✅ Fetch Skills from Database
function getSkills()
{
      global $pdo;
      try {
            $sql = "SELECT * FROM skills ORDER BY skill_id DESC"; // Fetch all skills
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }
}
// ✅ Delete Skill by ID
function deleteSkill($skill_id)
{
      global $pdo;

      try {
            if (!is_numeric($skill_id) || $skill_id <= 0) {
                  error_log("Invalid skill_id: " . $skill_id);
                  return false;
            }

            $check_sql = "SELECT * FROM skills WHERE skill_id = :skill_id";
            $check_stmt = $pdo->prepare($check_sql);
            $check_stmt->bindParam(':skill_id', $skill_id, PDO::PARAM_INT);
            $check_stmt->execute();

            if ($check_stmt->rowCount() === 0) {
                  error_log("Skill ID not found: " . $skill_id);
                  return false;
            }

            $sql = "DELETE FROM skills WHERE skill_id = :skill_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':skill_id', $skill_id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                  return true;
            } else {
                  error_log("Delete failed for skill_id: " . $skill_id);
                  return false;
            }
      } catch (PDOException $e) {
            error_log("PDO Exception: " . $e->getMessage());
            return false;
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

// ✅ Get SEO Settings
function getSeoSettings($page = 'default')
{
      global $pdo;
      try {
            $stmt = $pdo->prepare("SELECT * FROM setting_seo WHERE id = 1");
            $stmt->execute();
            $seo = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$seo) {
                  // Return default values if no SEO settings found
                  return [
                        'page_title' => 'My Portfolio',
                        'meta_description' => 'Welcome to my portfolio website',
                        'meta_keywords' => 'portfolio, web development, design',
                        'og_title' => 'My Portfolio',
                        'og_description' => 'Welcome to my portfolio website',
                        'og_image' => '',
                        'twitter_card' => 'summary',
                        'twitter_title' => 'My Portfolio',
                        'twitter_description' => 'Welcome to my portfolio website',
                        'twitter_image' => '',
                        'canonical_url' => '',
                        'robots_meta' => 'index,follow'
                  ];
            }
            return $seo;
      } catch (PDOException $e) {
            error_log("Error fetching SEO settings: " . $e->getMessage());
            return null;
      }
}

// ✅ Get Social Media Links
function getSocialMediaLinks()
{
      global $pdo;
      try {
            $stmt = $pdo->prepare("SELECT * FROM social_media WHERE is_active = 1 ORDER BY display_order ASC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
            error_log("Error fetching social media links: " . $e->getMessage());
            return [];
      }
}
