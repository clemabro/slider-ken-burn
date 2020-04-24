var slideIndex = 1;
var interval;

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");

  if (n > slides.length) {
        slideIndex = 1
    }

  if (n < 1) {
      slideIndex = slides.length
    }

  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  $(slides[slideIndex-1]).fadeIn();
  
  // Change les image toutees x secondes 
  // A enlever lorsque l'on aura l'animation
  clearInterval(interval);
  interval = setInterval(function(){plusSlides(+1)}, 4000);
}

$( document ).ready(function() {
    showSlides(slideIndex);
    interval = setInterval(function(){plusSlides(+1)}, 4000);
});