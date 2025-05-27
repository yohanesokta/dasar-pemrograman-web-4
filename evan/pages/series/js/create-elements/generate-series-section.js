import { fetchMovies } from "../fetch-movies.js";

(async function GenerateSeriesSection() {
  const data = await fetchMovies()
  const movies = data.results.slice()
  const main = document.getElementById("main");
  main.innerHTML = `
    <div class="movie_posters_section">
      <h1>Series Movie</h1>
      <div class="movie_poster_grid">
        ${movies
          .map(
            (movie) => `
          <figure class="backdrop" title="${movie.name}">
            <div class="backdrop_cover">
              <img src="https://image.tmdb.org/t/p/w500${movie.backdrop_path}" alt="${movie.name} backdrop">
            </div>
            <figcaption>${movie.name}</figcaption>
          </figure>
        `
          )
          .join("")}
      </div>
    </div>
  `;
})()