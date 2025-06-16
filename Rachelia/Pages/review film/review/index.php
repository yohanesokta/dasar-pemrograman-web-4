<?php
require_once("../../../../libs/auth/middleware.php");
require_once("../../../../libs/users/get_review.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>nonton.aja</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../../../evan/css/preflight.css" />
  <link rel="stylesheet" href="../../../../evan/css/utils.css" />
  <link rel="stylesheet" href="../../../../evan/css/components.css" />
  <link rel="stylesheet" href="../../../../evan/css/layout.css" />
  <link rel="stylesheet" href="../../../css/review film/review/review.css">
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
          <button class="button button_ghost">Get Premium</button>
          <button class="button button_outline">
            <i class="fa-regular fa-bell"></i>
          </button>
          <button class="button button_primary">
            <i class="fa-solid fa-user"></i>
          </button>
        </div>
      </div>
    </header>
    <aside id="sidebar">
    </aside>
    <div class="content">
      <main id="main">
        <div class="kontainer">
          <h1>Review Film: <?php echo $_GET['name'];?></h1>
          <div class="baris">
        <?php foreach($reviews as $review) { ?>
             <div class="review">
                    <div class="bintang" data-rating="<?php echo $review['rating'];?>"></div>
                    <div class="isi"><?php echo $review['comment'];?></div>
                    <div class="nama"><?php echo $review['username'];?></div>
                  </div>
          <?php } ?>
          </div>
          <div class="baris" id="baris">


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

  <script type="module" src="../../../../evan/js/layout-dom.js"></script>
  <script type="module" src="../../../../evan/js/create-elements/theme_toggle.js"></script>


  <script>

    let data = ""

    fetch("https://api.themoviedb.org/3/movie/<?php echo $_GET['id']; ?>/reviews", {
      headers: {
        accept: "application/json",
        Authorization:
          "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMTFkZmEyNjQ4ZmM1OTk0MTZkY2M5ODMwYWZmM2IxMyIsIm5iZiI6MTc0ODE5NjQzOC4yMTEsInN1YiI6IjY4MzM1YzU2MTNiOTFhMzdjYTJiNzIyMCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.9kmTunFIeMecPRfDvSa9Lyfl3lZ9W0LhVDg4K1lc8aE",
      }
    }).then(e => e.json()).then(content => {
      content.results.forEach(element => {
        data += ` <div class="review">
              <div class="bintang" data-rating="${Math.floor(element.author_details.rating)}"></div>
              <div class="isi">${element.content}</div>
              <div class="nama">${element.author_details.username}</div>
            </div>`
      });

      document.getElementById('baris').innerHTML = data
    });
  </script>
</body>

</html>