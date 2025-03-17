<?php
require_once "../../../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $skill_name = $_POST["skill_name"];
      $category = $_POST["category"];
      $description = $_POST["description"];
      $proficiency_level = intval($_POST["proficiency_level"]);

      // Handle file upload
      $image_url = "";
      if (!empty($_FILES["image_url"]["name"])) {
            $target_dir = "../uploads/";
            if (!file_exists($target_dir)) {
                  mkdir($target_dir, 0777, true);
            }
            $file_name = basename($_FILES["image_url"]["name"]);
            $target_file = $target_dir . $file_name;
            $image_url = "uploads/" . $file_name; // Save path to store in DB

            if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
                  echo "File uploaded successfully.<br>";
            } else {
                  die("File upload failed.");
            }
      }

      // Insert data into database
      $stmt = $conn->prepare("INSERT INTO skills (skill_name, category, description, proficiency_level, image_url) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssis", $skill_name, $category, $description, $proficiency_level, $image_url);

      if ($stmt->execute()) {
            echo "Skill added successfully!";
            header("Location: ../form/add_skills.php?success=1");
            exit();
      } else {
            echo "Error: " . $stmt->error;
      }

      $stmt->close();
}

$conn->close();
