import {config} from "../../../app_config.js"

async function fetchMovies(type) {
  const url = `https://api.themoviedb.org/3/search/movie?query=horor&include_adult=true&language=en-US&page=1`;
  const options = {
    method: "GET",
    headers: {
      accept: "application/json",
      Authorization:
        "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMTFkZmEyNjQ4ZmM1OTk0MTZkY2M5ODMwYWZmM2IxMyIsIm5iZiI6MTc0ODE5NjQzOC4yMTEsInN1YiI6IjY4MzM1YzU2MTNiOTFhMzdjYTJiNzIyMCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.9kmTunFIeMecPRfDvSa9Lyfl3lZ9W0LhVDg4K1lc8aE",
    },
  };

  return await fetch(url, options).then((res) => res.json())
}


async function getMovieData(type) {
  const data = await fetchMovies(type);
  return data.results;
}

function GenerateDiscoverSection(title, movie_list) {
  const main = document.getElementById("main");
  main.innerHTML = `
    <div class="movie_posters_section">
      <h1>Horor</h1>
      <div class="movie_poster_grid">${movie_list}</div>
    </div>
  `;
}

export async function GenerateMovieSection() {
  const movies = await getMovieData("movie");
  const movie_list = movies
  .map(
      (movie) => `
        <a href="${config["APP_URL "]}/yohanes/detail?id=${movie.id}" class="movie_poster"> 
          <figure class="backdrop" title="${movie.original_title}">
            <div class="backdrop_cover">
              <img src="https://image.tmdb.org/t/p/w500${movie.backdrop_path ?? movie.poster_path}" alt="${movie.original_title} backdrop">
            </div>
            <figcaption>${movie.original_title}</figcaption>
            </figure>
            </a>
        `
    )
    .join("");
  GenerateDiscoverSection("Movies", movie_list);
}

export async function GenerateTVSection() {
  const movies = await getMovieData("tv");
  const movie_list = movies
    .map(
      (movie) => `
      <a href="${config["APP_URL "]}/yohanes/detail?id=${movie.id}" class="movie_poster"> 
          <figure class="backdrop" title="${movie.original_name}">
            <div class="backdrop_cover">
              <img src="https://image.tmdb.org/t/p/w500${movie.backdrop_path}" alt="${movie.original_name} backdrop">
            </div>
            <figcaption>${movie.original_name}</figcaption>
          </figure>
        </a>
        `
    )
    .join("");
  GenerateDiscoverSection("TV / Series", movie_list);
}
