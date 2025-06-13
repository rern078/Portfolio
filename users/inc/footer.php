<!-- Footer Start -->
<div id="footer-container" class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
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
      <?php
      $social_links = getSocialMediaLinks();
      foreach ($social_links as $social) {
            $icon_class = '';
            switch (strtolower($social['platform'])) {
                  case 'whatsapp':
                        $icon_class = 'fab fa-whatsapp';
                        break;
                  case 'facebook':
                        $icon_class = 'fab fa-facebook-f';
                        break;
                  case 'telegram':
                        $icon_class = 'fab fa-telegram';
                        break;
                  case 'email':
                        $icon_class = 'fas fa-envelope';
                        break;
                  default:
                        $icon_class = $social['icon'] ?? 'fas fa-link';
            }
      ?>
            <a href="<?php echo htmlspecialchars($social['url']); ?>" target="_blank" class="sbutton <?php echo strtolower($social['platform']); ?>" tooltip="<?php echo htmlspecialchars($social['platform']); ?>">
                  <i class="<?php echo $icon_class; ?>"></i>
            </a>
      <?php } ?>
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
<!-- <style>
      #footer-container {
            position: fixed;
            bottom: 0;
            left: 0;
            transition: transform 0.3s ease;
            transform: translateY(100%);
      }

      #footer-container.show {
            transform: translateY(0);
      }
</style> -->
<!-- Theme Color End -->
<!-- <script>
      let lastScrollTop = 0;
      const footer = document.getElementById('footer-container');

      window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                  // Scrolling down
                  footer.classList.add('show');
            } else {
                  // Scrolling up
                  footer.classList.remove('show');
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
      });
</script> -->

<!-- Start of LiveChat (www.livechat.com) code -->
<script>
      window.__lc = window.__lc || {};
      window.__lc.license = 19199135;
      window.__lc.integration_name = "manual_onboarding";
      window.__lc.product_name = "livechat";;
      (function(n, t, c) {
            function i(n) {
                  return e._h ? e._h.apply(null, n) : e._q.push(n)
            }
            var e = {
                  _q: [],
                  _h: null,
                  _v: "2.0",
                  on: function() {
                        i(["on", c.call(arguments)])
                  },
                  once: function() {
                        i(["once", c.call(arguments)])
                  },
                  off: function() {
                        i(["off", c.call(arguments)])
                  },
                  get: function() {
                        if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                        return i(["get", c.call(arguments)])
                  },
                  call: function() {
                        i(["call", c.call(arguments)])
                  },
                  init: function() {
                        var n = t.createElement("script");
                        n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
                  }
            };
            !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
      }(window, document, [].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/19199135/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->