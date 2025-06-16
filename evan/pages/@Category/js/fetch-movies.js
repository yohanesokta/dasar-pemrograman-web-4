export async function fetchMovies(type) {
  const url = `https://api.themoviedb.org/3/trending/${type}/day?language=en-US`;
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