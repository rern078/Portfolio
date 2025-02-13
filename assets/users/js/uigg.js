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
      let sidebar = $("#socialSidebar");
      $("#toggleSidebar").click(function (event) {
            event.stopPropagation();
            sidebar.css("right", sidebar.css("right") === "-200px" ? "0" : "-200px");
      });
      $(document).click(function (event) {
            if (!$(event.target).closest("#socialSidebar, #toggleSidebar").length) {
                  sidebar.css("right", "-200px");
            }
      });
      $("#socialSidebar a").click(function () {
            sidebar.css("right", "-200px");
            $("#socialSidebar a").removeClass("active");
            $(this).addClass("active");
      });
});

