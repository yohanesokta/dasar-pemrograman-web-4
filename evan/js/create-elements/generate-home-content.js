import GenerateMovieSection from "./generate-movie-section.js";
import Jumbotron from "./jumbotron.js";

export default async function GenerateHomeContent() {
  const main = document.getElementById("main");
  main.innerHTML =
    (await Jumbotron()) +
    (await GenerateMovieSection("now_playing", "Now Playing")) +
    (await GenerateMovieSection("popular", "Popular")) +
    (await GenerateMovieSection("top_rated", "Top Rated")) +
    (await GenerateMovieSection("upcoming", "Upcoming"));
}
