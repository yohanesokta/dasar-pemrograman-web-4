<?php 
    include('../../libs/auth/middleware.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>nonton.aja</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../evan/css/preflight.css" />
    <link rel="stylesheet" href="../../evan/css/utils.css" />
    <link rel="stylesheet" href="../../evan/css/components.css" />
    <link rel="stylesheet" href="../../evan/css/layout.css" />

    <link rel="stylesheet" href="../styles/detail.css">

  </head>
  <body>
    <div class="grid_layout">
      <header id="header">
        <div class="container">
          <a href="http://127.0.0.1:5500/evan/pages/home/index.html" class="brand_logo"><span>nonton</span>.aja</a>
          <button type="button" id="button_search" class="button button_search">
            <i class="fa-solid fa-magnifying-glass"></i>
            Seacrh Movie
          </button>
          <div class="header_cta">
            
            <?php 
                if ($is_login) {
            ?>
            <?php 
                if ($user_data["premium"] == 0) {
            ?>
            <button id="getprem" class="button button_ghost">Get Premium</button>
            <?php } ?>
            <a href="../../jayro/page/profil user/" class="button button_primary">
                <p style="color:white;"><?php  echo $user_data['name']; ?></p>
              <i class="fa-solid fa-user"></i>
            </a>

            <?php } else { ?>
                <a href="./jayro/page/login" class="button button_primary">
                    Login
                </a>

                <a href="./jayro/page/register" class="button button_primary">
                    Register
                </a>
            <?php  }?>
          </div>
        </div>
      </header>
      <aside id="sidebar">
      </aside>
      <div class="content">
        <main>
          <div class="trailers-container">
            <h1 style="padding:20px;">Trailers</h1>
            <div class="video-player" id="video-player">
                
           </div>
          </div>

        </main>
        <footer id="footer">
          <p id="copyright">&copy; 2025 nonton.aja</p>
          <div id="themes">
            <span>Themes:</span>
            <div id="theme_toggles">
              <button type="button" class="button button_ghost"><i class="fa-solid fa-sun"></i></button>
              <button type="button" class="button button_ghost"><i class="fa-solid fa-moon"></i></button>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <script type="module" src="../../evan/js/layout-dom.js"></script>
    <script type="module" src="../../evan/js/create-elements/theme_toggle.js"></script>
    <script>
      const body = document.querySelector('main');
      const videoPlayer = document.getElementById('video-player');
      body.style.display = 'none';

      const id = "<?php echo $_GET['id'];?>"
      const url = ""

      fetch(`https://api.themoviedb.org/3/movie/${id}/trailers`,{
        headers : {
          accept: "application/json",
      Authorization:
        "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMTFkZmEyNjQ4ZmM1OTk0MTZkY2M5ODMwYWZmM2IxMyIsIm5iZiI6MTc0ODE5NjQzOC4yMTEsInN1YiI6IjY4MzM1YzU2MTNiOTFhMzdjYTJiNzIyMCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.9kmTunFIeMecPRfDvSa9Lyfl3lZ9W0LhVDg4K1lc8aE",
        }
      }).then((event) => event.json()).then((data) => {
        console.log(data)
        body.style.display = 'block';
        videoPlayer.innerHTML = `<iframe allow="autoplay; encrypted-media" autoplay="true" style="width:100%; height:80vh;" src="https://www.youtube.com/embed/${data.youtube[0].source}?autoplay=1&si=b3EIjtPyCnHGWpn8&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>`
      })

    </script>
  </body>
</html>


