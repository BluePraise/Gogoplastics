$(document).ready((function(){feather.replace(),window.onscroll=function(){i()};var e=document.querySelector(".site-header"),c=e.offsetTop;function i(){window.pageYOffset>c?e.classList.add("sticky"):e.classList.remove("sticky")}i(),$(".hamburger").on("click",(function(){$(this).toggleClass("is-active"),$(e).find(".menu-wrap").slideToggle()}))})),$(window).on("load",(function(){try{"1"!=localStorage.getItem("cookie-enable")&&setTimeout((function(){$(".cc-window").removeClass("cc-invisible")}),500),$(".cc-dismiss").click((function(e){$(this).closest(".cc-window").addClass("cc-invisible"),localStorage.setItem("cookie-enable","1")}))}catch(e){return!1}}));