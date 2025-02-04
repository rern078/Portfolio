<?php
require_once 'config.php';

// ✅ Add Portfolio Item
function addPortfolio($title, $category, $description, $image, $project_link)
{
      global $pdo;
      $sql = "INSERT INTO portfolio (title, category, description, image, project_link) VALUES (?, ?, ?, ?, ?)";
      $stmt = $pdo->prepare($sql);
      return $stmt->execute([$title, $category, $description, $image, $project_link]);
}

// ✅ Get All Portfolio Items
function getPortfolio()
{
      global $pdo;
      $sql = "SELECT * FROM portfolio ORDER BY created_at DESC";
      return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// ✅ Get Portfolio Item by ID (For Editing)
function getPortfolioById($id)
{
      global $pdo;
      $stmt = $pdo->prepare("SELECT * FROM portfolio WHERE id = ?");
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
}

// ✅ Update Portfolio Item
function updatePortfolio($id, $title, $category, $description, $image, $project_link)
{
      global $pdo;
      $sql = "UPDATE portfolio SET title = ?, category = ?, description = ?, image = ?, project_link = ? WHERE id = ?";
      $stmt = $pdo->prepare($sql);
      return $stmt->execute([$title, $category, $description, $image, $project_link, $id]);
}

// ✅ Delete Portfolio Item
function deletePortfolio($id)
{
      global $pdo;
      $sql = "DELETE FROM portfolio WHERE id = ?";
      $stmt = $pdo->prepare($sql);
      return $stmt->execute([$id]);
}
