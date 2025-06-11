import { config } from "../../../../../app_config.js"
export default async function Jumbotron() {
  const movie = await fetch("http://www.omdbapi.com/?apikey=3ec3e062&t=lilo %26 stitch&y=2025").then(value => value.json())
  return `
    <header class="jumbotron">
      <div class="jumbotron_cta">
        <a href="${config["APP_URL "]}/Rachelia/Pages/putar%20film/?id=552524" class="button button_outline">
          <i class="fa-solid fa-play"></i>
          Play movie
        </a>
        <h1 class="jumbotron_title">${movie.Title}</h1>
        <p class="jumbotron_synopsis">${movie.Plot}</p>
      </div>
    </header>
  `;
}
