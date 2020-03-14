$(document).ready(function() {
    feather.replace();

    $(".page-title").addClass("animated fadeInUp");

    $(window).on("load", function() {
        $(".flexslider").flexslider({
            animation: "slide",
            controlNav: false
        });
    });

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
