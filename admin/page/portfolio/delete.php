<?php
require_once '../includes/functions.php';

if (isset($_GET['id']) && deletePortfolio($_GET['id'])) {
      header('Location: index.php');
      exit;
} else {
      echo "Error deleting portfolio.";
}
