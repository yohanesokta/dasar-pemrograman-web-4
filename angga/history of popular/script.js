const films = [
  {
    title: "Spider-Man: No Way Home",
    year: 2021,
    image: "https://image.tmdb.org/t/p/w500/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg"
  },
  {
    title: "Interstellar",
    year: 2014,
    image: "https://image.tmdb.org/t/p/w500/rAiYTfKGqDCRIIqo664sY9XZIvQ.jpg"
  },
  {
    title: "Oppenheimer",
    year: 2023,
    image: "https://upload.wikimedia.org/wikipedia/id/4/4a/Oppenheimer_%28film%29.jpg"
  },
  {
    title: "Avengers: Endgame",
    year: 2019,
    image: "https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg"
  },
  {
    title: "The Batman",
    year: 2022,
    image: "https://image.tmdb.org/t/p/w500/74xTEgt7R36Fpooo50r9T25onhq.jpg"
  },
  {
    title: "Dune: Part Two",
    year: 2024,
    image: "https://upload.wikimedia.org/wikipedia/id/thumb/4/4d/Poster_film_dune_part_two.jpg/500px-Poster_film_dune_part_two.jpg"
  }
];

const grid = document.getElementById("film-grid");

films.forEach(film => {
  grid.innerHTML += `
    <div class="card">
      <img src="${film.image}" alt="${film.title}">
      <div class="card-content">
        <div class="card-title">${film.title}</div>
        <div class="card-info">🎬 ${film.year}</div>
      </div>
    </div>
  `;
});