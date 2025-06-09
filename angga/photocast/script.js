const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const slidesContainer = document.querySelector('.slides');
let currentIndex = 0;
const totalSlides = slides.length;

function updateCarousel(index) {
  if (index < 0) index = totalSlides - 1;
  if (index >= totalSlides) index = 0;
  currentIndex = index;

  slidesContainer.style.transform = `translateX(-${index * 100}%)`;

  slides.forEach((slide, i) => {
    slide.setAttribute('aria-hidden', i !== index);
  });

  dots.forEach((dot, i) => {
    if (i === index) {
      dot.classList.add('active');
      dot.setAttribute('aria-selected', 'true');
      dot.setAttribute('tabindex', '0');
    } else {
      dot.classList.remove('active');
      dot.setAttribute('aria-selected', 'false');
      dot.setAttribute('tabindex', '-1');
    }
  });
}

prevBtn.addEventListener('click', () => {
  updateCarousel(currentIndex - 1);
});

nextBtn.addEventListener('click', () => {
  updateCarousel(currentIndex + 1);
});

dots.forEach((dot, idx) => {
  dot.addEventListener('click', () => {
    updateCarousel(idx);
  });
  dot.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      updateCarousel(idx);
    }
    if (e.key === 'ArrowRight') {
      e.preventDefault();
      updateCarousel((idx + 1) % totalSlides);
      dots[(idx + 1) % totalSlides].focus();
    }
    if (e.key === 'ArrowLeft') {
      e.preventDefault();
      updateCarousel((idx - 1 + totalSlides) % totalSlides);
      dots[(idx - 1 + totalSlides) % totalSlides].focus();
    }
  });
});

updateCarousel(0);