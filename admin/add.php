<?php
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (addPortfolio($_POST['title'], $_POST['category'], $_POST['description'], $_POST['image'], $_POST['project_link'])) {
            header('Location: index.php');
            exit;
      } else {
            echo "Error adding portfolio.";
      }
}
?>

<form method="POST">
      <input type="text" name="title" placeholder="Title" required>
      <input type="text" name="category" placeholder="Category" required>
      <textarea name="description" placeholder="Description"></textarea>
      <input type="text" name="image" placeholder="Image URL">
      <input type="text" name="project_link" placeholder="Project Link">
      <button type="submit">Add Portfolio</button>
</form>