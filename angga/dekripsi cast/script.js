const cards = document.querySelectorAll('.cast-card');
const descTitle = document.getElementById('descTitle');
const descText = document.getElementById('descText');

cards.forEach(card => {
  card.addEventListener('click', () => {
    cards.forEach(c => c.classList.remove('active'));
    card.classList.add('active');

    descTitle.textContent = card.getAttribute('data-title');
    descText.textContent = card.getAttribute('data-text');
  });
});