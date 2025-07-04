import { fetchMovies } from "../fetch-movies.js";
import {config} from "../../../../../app_config.js"

async function getMovieData(type) {
  const data = await fetchMovies(type.replace(" ", "_").toLowerCase());
  return data.results;
}

function GenerateMovieListSection(title, movie_list) {
  const main = document.getElementById("main");
  main.innerHTML = `
    <div class="movie_posters_section">
      <h1>${title}</h1>
      <div class="movie_poster_grid">${movie_list}</div>
    </div>
  `;
}

export async function GenerateMovieSection(type) {
  const movies = await getMovieData(type);
  const movie_list = movies
  .map(
      (movie) => `
        <a href="${config["APP_URL "]}/yohanes/detail?id=${movie.id}" class="movie_poster"> 
          <figure class="backdrop" title="${movie.original_title}">
            <div class="backdrop_cover">
              <img src="https://image.tmdb.org/t/p/w500${movie.backdrop_path}" alt="${movie.original_title} backdrop">
            </div>
            <figcaption>${movie.original_title}</figcaption>
          </figure>
        </a>
        `
    )
    .join("");
  GenerateMovieListSection(type, movie_list);
}

