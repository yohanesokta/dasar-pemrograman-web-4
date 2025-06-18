<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>nonton.aja | Crew Film</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../../../evan/css/preflight.css" />
    <link rel="stylesheet" href="../../../evan/css/utils.css" />
    <link rel="stylesheet" href="../../../evan/css/components.css" />
    <link rel="stylesheet" href="../../../evan/css/layout.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="grid_layout">
      <header id="header">
        <div class="container">
          <a href="../../../" class="brand_logo"><span>nonton</span>.aja</a>
          <button type="button" id="button_search" class="button button_search">
            <i class="fa-solid fa-magnifying-glass"></i>
            Seacrh Movie
          </button>
          <div class="header_cta">
            <button class="button button_ghost">Get Premium</button>
            <button class="button button_outline"><i class="fa-regular fa-bell"></i></button>
            <button class="button button_primary"><i class="fa-solid fa-user"></i></button>
          </div>
        </div>
      </header>

      <aside id="sidebar"></aside>

      <div class="content">
        <main id="crew-section">
          <h2>Crew Film</h2>
          <div class="cast-grid" id="cast-list"></div>
        </main>

        <footer id="footer">
          <p id="copyright">&copy; 2025 nonton.aja</p>
          <div id="themes">
            <span>Themes:</span>
            <div id="theme_toggles">
              <button type="button" class="button button_ghost">
                <i class="fa-solid fa-sun"></i>
              </button>
              <button type="button" class="button button_ghost">
                <i class="fa-solid fa-moon"></i>
              </button>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <script type="module" src="../../../evan/js/layout-dom.js"></script>
    <script type="module" src="../../../evan/js/create-elements/theme_toggle.js"></script>
    <script>
      const urlParams = new URLSearchParams(window.location.search);
      const id = urlParams.get("id");
      const castList = document.getElementById("cast-list");

      fetch(`https://api.themoviedb.org/3/movie/${id}/credits`, {
        headers: {
          accept: "application/json",
          Authorization:
            "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMTFkZmEyNjQ4ZmM1OTk0MTZkY2M5ODMwYWZmM2IxMyIsIm5iZiI6MTc0ODE5NjQzOC4yMTEsInN1YiI6IjY4MzM1YzU2MTNiOTFhMzdjYTJiNzIyMCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.9kmTunFIeMecPRfDvSa9Lyfl3lZ9W0LhVDg4K1lc8aE",
        },
      })
        .then((res) => res.json())
        .then((data) => {
          data.crew.forEach((cast) => {
            const item = document.createElement("div");
            item.className = "cast-item";
            item.innerHTML = `
              <div class="cast-photo" style="background-image: url('https://image.tmdb.org/t/p/original${cast.profile_path}')"></div>
              <a href="../../../angga/photocast?path=${cast.profile_path}&job=${cast.job}" class="cast-info" style="text-decoration:none;">
                <div class="actor-name">${cast.name}</div>
                <div class="character-name">${cast.job}</div>
              </a>
            `;
            castList.appendChild(item);
          });
        });
    </script>
  </body>
</html>