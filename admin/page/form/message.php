 <!-- ✅ Success Alert -->
 <?php if (!empty($success)) : ?>
       <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success!</strong> <?= $success; ?>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
 <?php endif; ?>

 <!-- ❌ Error Alert -->
 <?php if (!empty($error)) : ?>
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error!</strong> <?= $error; ?>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
 <?php endif; ?>

