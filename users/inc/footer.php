<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
            <div class="row g-5">
                  <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Skills</h4>
                        <a class="btn btn-link" href="">HTML</a>
                        <a class="btn btn-link" href="">CSS</a>
                        <a class="btn btn-link" href="">BOOSTRAP</a>
                        <a class="btn btn-link" href="">PHP</a>
                        <a class="btn btn-link" href="">JAVA</a>
                        <a class="btn btn-link" href="">MYSQL</a>
                        <a class="btn btn-link" href="">ORACLE</a>
                  </div>
                  <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Other</h4>
                        <a class="btn btn-link" href="">VUE</a>
                        <a class="btn btn-link" href="">WORDPRESS</a>
                        <a class="btn btn-link" href="">LARAVEL</a>
                        <a class="btn btn-link" href="">AWS</a>
                        <a class="btn btn-link" href="">REACT</a>
                        <a class="btn btn-link" href="">TYPESCRIPT</a>
                        <a class="btn btn-link" href="">MONGODB</a>
                        <!-- <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div> -->
                  </div>
                  <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Gallery</h4>
                        <div class="row g-2 pt-2">
                              <?php
                              $logos = ['html', 'css', 'js', 'bootstrap', 'php', 'java', 'mysql', 'oracle', 'vue', 'wordpress', 'laravel', 'aws'];
                              foreach ($logos as $logo) {
                              ?>
                                    <div class="col-3">
                                          <img class="img-fluid bg-light p-1" src="../assets/users/img/logo/<?= $logo ?>.png" alt="">
                                    </div>
                              <?php  } ?>
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Newsletter</h4>
                        <p>Enthusiastic about developing and designing cutting-edge web and software solutions to solve real-world problems.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                              <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                              <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                  </div>
            </div>
      </div>
      <div class="container">
            <div class="copyright">
                  <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                              &copy; <a class="border-bottom" href="https://<?php echo  $_SERVER['SERVER_NAME']; ?>" target="_blank"><?php echo  $_SERVER['SERVER_NAME']; ?></a>, All Right Reserved.
                              Designed By <a class="border-bottom" href="https://<?php echo  $_SERVER['SERVER_NAME']; ?>" target="_blank">CHAMRERN TIENG</a><br><br>

                        </div>
                        <div class="col-md-6 text-center text-md-end">
                              <div class="footer-menu">
                                    <a href="">Home</a>
                                    <a href="">Cookies</a>
                                    <a href="">Help</a>
                                    <a href="">FQAs</a>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<!-- Footer End -->
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
<!-- Contact Us  Start -->
<div class="sbuttons">
      <a href="https://wa.me/967797762" target="_blank" class="sbutton whatsapp" tooltip="WhatsApp"><i class="fab fa-whatsapp"></i></a>
      <a href="https://www.facebook.com/profile.php?id=61552667695284&mibextid=kFxxJD" target="_blank" class="sbutton fb" tooltip="Facebook"><i class="fab fa-facebook-f"></i></a>
      <a href="https://t.me/TienG_ChamrerN" target="_blank" class="sbutton telegram" tooltip="Telegram"><i class="fab fa-telegram"></i></a>
      <a href="mailto:tiengchamrern2@gmail.com" target="_blank" class="sbutton gmail" tooltip="Email"><i class="fas fa-envelope"></i></a>
      <a target="_blank" class="sbutton mainsbutton" tooltip="Share"><i class="fas fa-share-alt"></i></a>
</div>
<!-- Contact Us  End -->
<!-- Theme Color  Start -->
<button class="toggle-btn" id="toggleSidebar">
      <i class="bi bi-palette"></i>
</button>

<div class="theme-sidebar" id="themeSidebar">
      <a id="themeColor"><i class="bi bi-palette"></i> Theme Color</a>
      <div class="theme-color">
            <a class="theme-option" data-theme="theme-color-1"><i class="far fa-lightbulb"></i> Light</a>
            <a class="theme-option" data-theme="theme-color-2"><i class="fas fa-desktop"></i> Dark</a>
            <a class="theme-option" data-theme="theme-color-3"><i class="fas fa-moon"></i> Light Blue</a>
      </div>
      <a id="themeStyle"><i class="bi bi-palette"></i> Theme Style</a>
      <div class="theme-style">
            <a class="theme-st" data-theme="theme-style-1"><i class="fab fa-ethereum"></i> Style 1</a>
            <a class="theme-st" data-theme="theme-style-2"><i class="fab fa-ethereum"></i> Style 2</a>
            <a class="theme-st" data-theme="theme-style-3"><i class="fab fa-ethereum"></i> Style 3</a>
            <a class="theme-st" data-theme="theme-style-4"><i class="fab fa-ethereum"></i> Style 4</a>
            <a class="theme-st" data-theme="theme-style-5"><i class="fab fa-ethereum"></i> Style 5</a>
            <a class="theme-st" data-theme="theme-style-6"><i class="fab fa-ethereum"></i> Style 6</a>
      </div>
</div>

<!-- Theme Color End -->