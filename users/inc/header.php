<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
      </div>
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
      <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>CHAMRERN TIENG</h2>
      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                  <a href="/" class="nav-item nav-link active"><?php echo $lang['home']; ?></a>
                  <a href="<?php echo baseUrl('about-us'); ?>" class="nav-item nav-link"><?php echo $lang['about']; ?></a>
                  <a href="<?php echo baseUrl('courses'); ?>" class="nav-item nav-link">Courses</a>
                  <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu fade-down m-0">
                              <a href="<?php echo baseUrl('about-us'); ?>" class="dropdown-item">Education</a>
                              <a href="<?php echo baseUrl('about-us'); ?>" class="dropdown-item">Experience</a>
                              <a href="<?php echo baseUrl('about-us'); ?>" class="dropdown-item">Skills</a>
                              <a href="<?php echo baseUrl('about-us'); ?>" class="dropdown-item">Testimonial</a>
                              <a href="<?php echo baseUrl('404'); ?>" class="dropdown-item">404 Page</a>
                        </div>
                  </div>
                  <a href="<?php echo baseUrl('contact-us'); ?>" class="nav-item nav-link"><?php echo $lang['contact']; ?></a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
      </div>
</nav>
<!-- Navbar End -->