<?php
require_once '../includes/functions.php';
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
            $image_url = "uploads/" . $file_name;

            // if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
            //       echo "File uploaded successfully.<br>";
            // } else {
            //       die("File upload failed.");
            // }
      }

      if (addSkills($skill_name, $category, $description, $proficiency_level, $image_url)) {
            // header("Location: " . baseUrl('admin'));
            exit();
      } else {
            $error = "Registration failed. Try again!";
      }
}
?>

<div class="modal fade" id="skillModal" tabindex="-1" aria-labelledby="skillModalLable" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h1 class="modal-title fs-5" id="skillModalLable">Add New Skill</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                              <div class="mb-3">
                                    <label for="skill_name" class="col-form-label">Skill Name</label>
                                    <input type="text" class="form-control" name="skill_name" id="skill_name">
                              </div>
                              <div class="mb-3">
                                    <label for="category" class="col-form-label">Category</label>
                                    <input type="text" class="form-control" name="category" id="category">
                              </div>
                              <div class="mb-3">
                                    <label for="description" class="col-form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description"></textarea>
                              </div>
                              <div class="mb-3">
                                    <label for="proficiency_level" class="col-form-label">Proficiency Level</label>
                                    <input type="range" class="form-range" name="proficiency_level" id="proficiency_level" min="0" max="100" step="1" oninput="updateProficiencyValue(this.value)">
                                    <span class="text-center d-block" id="proficiency_value">50%</span>
                              </div>
                              <div class="mb-3 form-group-img">

                                    <label for="image_url" class="attachment">
                                          <div class="row btn-file">
                                                <div class="btn-file__preview"></div>
                                                <div class="btn-file__actions">
                                                      <div class="btn-file__actions__item col-xs-12 text-center">
                                                            <div class="btn-file__actions__item--shadow">
                                                                  <i class="fa fa-plus fa-lg fa-fw" aria-hidden="true"></i>
                                                                  <div class="visible-xs-block"></div>
                                                                  Select file
                                                            </div>
                                                      </div>
                                                </div>
                                                <input name="image_url" type="file" id="image_url" accept="image/*">
                                          </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                  </form>
            </div>
      </div>
</div>
<script>
      jQuery(($) => {
            $('.attachment input[type="file"]')
                  .on('change', (event) => {
                        let el = $(event.target).closest('.attachment').find('.btn-file');

                        el
                              .find('.btn-file__actions__item')
                              .css({
                                    'padding': '135px'
                              });

                        el
                              .find('.btn-file__preview')
                              .css({
                                    'background-image': 'url(' + window.URL.createObjectURL(event.target.files[0]) + ')'
                              });
                  });
      });

      function updateProficiencyValue(value) {
            document.getElementById("proficiency_value").innerText = value + "%";
      }
</script>