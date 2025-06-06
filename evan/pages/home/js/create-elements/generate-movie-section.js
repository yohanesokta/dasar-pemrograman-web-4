import { fetchMovies } from "../fetch-movies.js";
import { config } from "../../../../../app_config.js";

export default async function GenerateMovieSection(type, title) {
  const data = await fetchMovies(type)
  const movies = data.results.slice(0, 4)
  return `
    <section class="movie_posters_section">
      <h2>${title}</h2>
      <div class="movie_poster_grid">
        ${movies
          .map(
            (movie) => `
            <a href="${config["APP_URL "]}/yohanes/detail?id=${movie.id}" rel="noopener noreferrer">
            <figure class="poster_card" title="${movie.title}">
              <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title}">
              <figcaption>
                <span class="poster_card_title">${movie.title}</span>
                <span class="poster_card_description">${movie.release_date}</span>
              </figcaption>
            </figure>
            </a>
            `
          )
          .join("")}
      </div>
    </section>
  `;
}