$(document).ready(function () {
      var savedTheme = sessionStorage.getItem("selectedTheme");

      if (savedTheme) {
            $("body").addClass(savedTheme);
      } else {
            $("body").addClass("theme-color-2");
            sessionStorage.setItem("selectedTheme", "theme-color-2");
      }

      $(".theme-option").click(function (e) {
            e.preventDefault();
            var selectedTheme = $(this).data("theme");
            $("body").removeClass("theme-color-1 theme-color-2 theme-color-3");
            $("body").addClass(selectedTheme);
            sessionStorage.setItem("selectedTheme", selectedTheme);
      });
});

// theme code 
$(document).ready(function () {
      let sidebar = $("#themeSidebar");
      let themeColor = $(".theme-color");
      let themeStyle = $(".theme-style");

      themeColor.hide();
      themeStyle.hide();

      $("#toggleSidebar").click(function (event) {
            event.stopPropagation();
            let sidebarRight = parseInt(sidebar.css("right")); // Convert to number

            if (sidebarRight < 0) {
                  sidebar.css("right", "0");
            } else {
                  sidebar.css("right", "-200px");
                  themeColor.hide();
                  themeStyle.hide();
            }
      });

      $(document).click(function (event) {
            if (!$(event.target).closest("#themeSidebar, #toggleSidebar").length) {
                  let sidebarRight = parseInt(sidebar.css("right"));
                  if (sidebarRight === 0) { // Only hide if open
                        sidebar.css("right", "-200px");
                        themeColor.hide();
                        themeStyle.hide();
                  }
            }
      });

      $("#themeColor").click(function (event) {
            event.stopPropagation();
            themeColor.slideToggle(200);
            themeStyle.hide();
      });

      $("#themeStyle").click(function (event) {
            event.stopPropagation();
            themeStyle.slideToggle(200);
            themeColor.hide();
      });

      $(".theme-option").click(function () {
            let selectedTheme = $(this).data("theme");
            $("body").attr("data-theme", selectedTheme);
            localStorage.setItem("selectedTheme", selectedTheme);

            $(".theme-option").removeClass("active");
            $(this).addClass("active");

            sidebar.css("right", "-200px");
            themeColor.hide();
            themeStyle.hide();
      });

      $(".theme-st").click(function () {
            let selectedStyle = $(this).data("theme");
            $("body").attr("data-style", selectedStyle);
            localStorage.setItem("selectedStyle", selectedStyle);

            $(".theme-st").removeClass("active");
            $(this).addClass("active");

            sidebar.css("right", "-200px");
            themeColor.hide();
            themeStyle.hide();
      });

      let savedTheme = localStorage.getItem("selectedTheme");
      let savedStyle = localStorage.getItem("selectedStyle");

      if (savedTheme) {
            $("body").attr("data-theme", savedTheme);
            $(".theme-option[data-theme='" + savedTheme + "']").addClass("active");
      }

      if (savedStyle) {
            $("body").attr("data-style", savedStyle);
            $(".theme-st[data-theme='" + savedStyle + "']").addClass("active");
      }
});

// theme style 

$(document).ready(function () {
      function setActiveThemeFromStorage() {
            const savedTheme = sessionStorage.getItem('theme');
            if (savedTheme) {
                  $('[data-theme="' + savedTheme + '"]').addClass('active');
                  if (savedTheme === 'theme-style-1') {
                        $('#animation').show();
                        $('#constellationCanvas').hide();
                        $('#particles').hide();
                        $('#connecting-dots').hide();
                        loadScript('assets/users/js/style1-canvas.js');
                  } else if (savedTheme === 'theme-style-2') {
                        $('#animation').hide();
                        $('#constellationCanvas').show();
                        $('#particles').hide();
                        $('#connecting-dots').hide();
                        loadScript('assets/users/js/style2-canvas.js');
                  } else if (savedTheme === 'theme-style-3') {
                        $('#animation').hide();
                        $('#constellationCanvas').hide();
                        $('#particles').show();
                        $('#connecting-dots').hide();
                        loadScript('assets/users/js/style3-canvas.js');
                  } else if (savedTheme === 'theme-style-4') {
                        $('#animation').hide();
                        $('#constellationCanvas').hide();
                        $('#particles').hide();
                        $('#connecting-dots').show();
                        loadScript('assets/users/js/style4-canvas.js');
                  }
            } else {
                  $('[data-theme="theme-style-1"]').addClass('active');
                  $('#animation').show();
                  $('#constellationCanvas').hide();
                  $('#particles').hide();
                  $('#connecting-dots').hide();
                  loadScript('assets/users/js/style1-canvas.js');
            }
      }
      setActiveThemeFromStorage();

      // Click event for Style 1
      $('[data-theme="theme-style-1"]').on('click', function () {
            console.log('Style 1 selected');
            $('.theme-st').removeClass('active');
            $(this).addClass('active');
            sessionStorage.setItem('theme', 'theme-style-1');

            $('#animation').show();
            $('#constellationCanvas').hide();
            $('#particles').hide();
            $('#connecting-dots').hide();

            loadScript('assets/users/js/style1-canvas.js');
      });

      // Click event for Style 2
      $('[data-theme="theme-style-2"]').on('click', function () {
            console.log('Style 2 selected');
            $('.theme-st').removeClass('active');
            $(this).addClass('active');
            sessionStorage.setItem('theme', 'theme-style-2');

            $('#animation').hide();
            $('#constellationCanvas').show();
            $('#particles').hide();
            $('#connecting-dots').hide();

            loadScript('assets/users/js/style2-canvas.js');
      });

      // Click event for Style 3
      $('[data-theme="theme-style-3"]').on('click', function () {
            console.log('Style 3 selected');
            $('.theme-st').removeClass('active');
            $(this).addClass('active');
            sessionStorage.setItem('theme', 'theme-style-3');

            $('#animation').hide();
            $('#constellationCanvas').hide();
            $('#particles').show();
            $('#connecting-dots').hide();

            loadScript('assets/users/js/style3-canvas.js');
      });

      // Click event for Style 4
      $('[data-theme="theme-style-4"]').on('click', function () {
            console.log('Style 4 selected');
            $('.theme-st').removeClass('active');
            $(this).addClass('active');
            sessionStorage.setItem('theme', 'theme-style-4');

            $('#animation').hide();
            $('#constellationCanvas').hide();
            $('#particles').hide();
            $('#connecting-dots').show();

            loadScript('assets/users/js/style4-canvas.js');
      });

      function loadScript(src) {
            if ($('script[src="' + src + '"]').length == 0) {
                  var script = document.createElement('script');
                  script.src = src;
                  script.async = true;
                  script.onload = function () {
                        console.log('Script loaded: ' + src);
                  };
                  document.head.appendChild(script);
            } else {
                  console.log('Script already loaded: ' + src);
            }
      }
});




