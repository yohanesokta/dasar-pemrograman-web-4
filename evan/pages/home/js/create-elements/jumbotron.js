export default async function Jumbotron() {
  const movie = await fetch("http://www.omdbapi.com/?apikey=3ec3e062&t=lilo %26 stitch&y=2025").then(value => value.json())
  return `
    <header class="jumbotron">
      <div class="jumbotron_cta">
        <button class="button button_outline">
          <i class="fa-solid fa-play"></i>
          Play movie
        </button>
        <h1 class="jumbotron_title">${movie.Title}</h1>
        <p class="jumbotron_synopsis">${movie.Plot}</p>
      </div>
    </header>
  `;
}
