import { fetchMovies } from "../fetch-movies.js";

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
            <figure class="backdrop" title="${movie.title}">
              <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title} backdrop">
              <figcaption>
                <span class="backdrop_title">${movie.title}</span>
                <span class="backdrop_description">${movie.release_date}</span>
              </figcaption>
            </figure>
            `
          )
          .join("")}
      </div>
    </section>
  `;
}