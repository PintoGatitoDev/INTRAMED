let slideIndex = 0;
const slides = document.querySelectorAll('#carrusel div');

function showSlides() {
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = 'none';  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = 'flex';  
  setTimeout(showSlides, 4000); // Cambiar imagen cada 2 segundos
}

showSlides();
