$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    autoplay: true,
    autoplayTimeout: 2500,
    autoplayHoverPause: false,
    loop: true,
    items: 1,
  });
});

const close = document.querySelector(".close");
const bodyAlert = document.querySelector(".alert");

close.addEventListener("click", function () {
  bodyAlert.classList.toggle("hidden");
});
