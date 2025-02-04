<?php
require_once '../includes/functions.php';

if (isset($_GET['id'])) {
      $portfolio = getPortfolioById($_GET['id']);
      if (!$portfolio) die("Portfolio not found!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (updatePortfolio($_POST['id'], $_POST['title'], $_POST['category'], $_POST['description'], $_POST['image'], $_POST['project_link'])) {
            header('Location: index.php');
            exit;
      } else {
            echo "Error updating portfolio.";
      }
}
?>

<form method="POST">
      <input type="hidden" name="id" value="<?= $portfolio['id'] ?>">
      <input type="text" name="title" value="<?= $portfolio['title'] ?>" required>
      <input type="text" name="category" value="<?= $portfolio['category'] ?>" required>
      <textarea name="description"><?= $portfolio['description'] ?></textarea>
      <input type="text" name="image" value="<?= $portfolio['image'] ?>">
      <input type="text" name="project_link" value="<?= $portfolio['project_link'] ?>">
      <button type="submit">Update Portfolio</button>
</form>