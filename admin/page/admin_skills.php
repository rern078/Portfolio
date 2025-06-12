<?php
include("form/add_skills.php");
include("form/message.php");
$skills = getSkills();
?>
<div id="loading-indicator" style="display:none;">
      <!-- You can use any loading spinner, like FontAwesome's spinner -->
      <i class="fa fa-spinner fa-spin"></i> Deleting skill...
</div>

<div class="page-inner">
      <div class="page-header">
            <h3 class="fw-bold mb-3">Skills</h3>
            <ul class="breadcrumbs mb-3">
                  <li class="nav-home">
                        <a href="#">
                              <i class="icon-home"></i>
                        </a>
                  </li>
                  <li class="separator">
                        <i class="icon-arrow-right"></i>
                  </li>
                  <li class="nav-item">
                        <a href="#">Skills List</a>
                  </li>
                  <li class="separator">
                        <i class="icon-arrow-right"></i>
                  </li>
                  <li class="nav-item">
                        <a href="#">Table List</a>
                  </li>
            </ul>
      </div>
      <div class="row">
            <div class="col-md-12">
                  <div class="card">
                        <div class="card-header">
                              <h4 class="card-title"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#skillModal">Add New</button></h4>
                        </div>
                        <div class="card-body">
                              <div class="table-responsive">
                                    <table
                                          id="basic-datatables"
                                          class="display table table-striped table-hover">
                                          <thead>
                                                <tr>
                                                      <th>Skill Name</th>
                                                      <th>Category</th>
                                                      <th>Description</th>
                                                      <th>Proficiency Level</th>
                                                      <th>Image</th>
                                                      <th>Action</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                <?php foreach ($skills as $skill) : ?>
                                                      <tr>
                                                            <td><?= htmlspecialchars($skill['skill_name']) ?></td>
                                                            <td><?= htmlspecialchars($skill['category']) ?></td>
                                                            <td><?= htmlspecialchars($skill['description']) ?></td>
                                                            <td><?= htmlspecialchars($skill['proficiency_level']) ?>%</td>
                                                            <td>
                                                                  <?php if (!empty($skill['image_url'])) : ?>
                                                                        <img src="../<?= htmlspecialchars($skill['image_url']) ?>" width="50">
                                                                  <?php else : ?>
                                                                        No Image
                                                                  <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                  <a href="" class="btn btn-warning btn-sm">Edit</a>
                                                                  <a href="javascript:void(0);" class="btn btn-danger btn-sm delete-btn" data-id="<?= $skill['skill_id'] ?>" onclick="destroySkill(this)">Delete</a>
                                                            </td>
                                                      </tr>
                                                <?php endforeach; ?>
                                          </tbody>
                                    </table>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<script>
      function destroySkill(element) {
            var skill_id = $(element).data('id');

            if (confirm('Are you sure you want to delete this skill?')) {
                  $('#loading-indicator').show();

                  $.ajax({
                        url: 'page/form/delete_skill.php',
                        method: 'POST',
                        data: {
                              skill_id: parseInt(skill_id)
                        },
                        success: function(response) {
                              console.log('Server Response:', response.trim());
                              if (response.trim() === 'success') {
                                    alert('Skill deleted successfully');
                                    location.reload();
                              } else {
                                    alert('Failed to delete skill: ' + response.trim());
                              }
                        },
                        error: function(xhr, status, error) {
                              console.error('AJAX Error:', error);
                        }
                  });

            }
      }
</script>
<script>
      $(document).ready(function() {
            $("#basic-datatables").DataTable({});

            $("#multi-filter-select").DataTable({
                  pageLength: 5,
                  initComplete: function() {
                        this.api()
                              .columns()
                              .every(function() {
                                    var column = this;
                                    var select = $(
                                                '<select class="form-select"><option value=""></option></select>'
                                          )
                                          .appendTo($(column.footer()).empty())
                                          .on("change", function() {
                                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                                column
                                                      .search(val ? "^" + val + "$" : "", true, false)
                                                      .draw();
                                          });

                                    column
                                          .data()
                                          .unique()
                                          .sort()
                                          .each(function(d, j) {
                                                select.append(
                                                      '<option value="' + d + '">' + d + "</option>"
                                                );
                                          });
                              });
                  },
            });

            // Add Row
            $("#add-row").DataTable({
                  pageLength: 5,
            });

            var action =
                  '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $("#addRowButton").click(function() {
                  $("#add-row")
                        .dataTable()
                        .fnAddData([
                              $("#addName").val(),
                              $("#addPosition").val(),
                              $("#addOffice").val(),
                              action,
                        ]);
                  $("#addRowModal").modal("hide");
            });
      });
</script>