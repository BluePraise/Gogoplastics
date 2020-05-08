$(document).ready(function() {
    feather.replace();


    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {
        fixedHeader();
    };

    // Get the header
    var header = document.querySelector(".site-header");

    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function fixedHeader() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
    fixedHeader();

    $(".hamburger").on("click", function() {
        $(this).toggleClass("is-active");
        $(header)
            .find(".menu-wrap")
            .slideToggle();
    });

});

$(window).on("load", function() {
    try {
        if (localStorage.getItem("cookie-enable") != "1") {
            setTimeout(function() {
                $(".cc-window").removeClass("cc-invisible");
            }, 500);
        }

    $(".cc-dismiss").click(function(e) {
      $(this)
        .closest(".cc-window")
        .addClass("cc-invisible");

      localStorage.setItem("cookie-enable", "1");
    });
  } catch (e) {
    return false;
  }

  $(".flexslider").flexslider({
        animation: "slide",
        controlNav: false
    });
});

