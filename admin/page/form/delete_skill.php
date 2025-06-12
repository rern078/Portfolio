<?php
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (!isset($_POST['skill_id']) || empty($_POST['skill_id'])) {
            die('missing_skill_id');
      }

      $skill_id = intval($_POST['skill_id']);

      if ($skill_id <= 0) {
            die('invalid_skill_id');
      }

      if (deleteSkill($skill_id)) {
            echo 'success';
      } else {
            echo 'failed_to_delete';
      }
} else {
      echo 'invalid_request';
}
