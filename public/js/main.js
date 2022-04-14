// When the user scrolls the page, execute myFunction
/*
    ==== STICKY NAVBAR ====
    Fungsi untuk menjalankan
    sticky navigation ketika
    scroll halaman ke bawah
*/
window.onscroll = function() {myFunction()};
var navbar = document.getElementById("navbar");

var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

