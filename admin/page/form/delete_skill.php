<?php
require_once '../includes/functions.php';
if (isset($_POST['skill_id'])) {
      $skill_id = $_POST['skill_id'];
      if (empty($skill_id)) {
            echo 'Skill ID is missing';
            exit;
      }
      if (deleteSkill($skill_id)) {
            echo 'success';
      } else {
            echo 'failure';
      }
} else {
      echo 'No skill ID provided';
}
