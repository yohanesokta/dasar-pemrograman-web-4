<?php
  require("../../../../libs/auth/middleware.php");
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
  <link rel="stylesheet" href="../../../css/review film/ulasan/ulasan.css">
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
            <a href="./jayro/page/profil user/" class="button button_primary">
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
    <form action="../../../../libs/users/review_add.php" class="content" method="post">
      <main id="main">
        <div class="review-container">
          <h1>Review Film</h1>
          <input type="hidden" name="film_id" id="film_id" value="<?php echo $_GET['id']; ?>">
          <input type="hidden" name="username" id="username" value="<?php echo $user_data['name']; ?>">
          <div class="rating" id="star">
            <input type="radio" required id="star1" name="rating" value="5"><label for="star1">&#9733;</label>
            <input type="radio" id="star2" name="rating" value="4"><label for="star2">&#9733;</label>
            <input type="radio" id="star3" name="rating" value="3"><label for="star3">&#9733;</label>
            <input type="radio" id="star4" name="rating" value="2"><label for="star4">&#9733;</label>
            <input type="radio" id="star5" name="rating" value="1"><label for="star5">&#9733;</label>
          </div>
          <textarea required placeholder="Tulis penilaian Anda tentang film ini..." rows="5" cols="50" id="text-area"
            name="comment"></textarea>
          <button type="submit" class="submit-btn">Kirim Review</button>
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
    </form>
  </div>
  <script type="module" src="../../../../evan/js/layout-dom.js"></script>
  <script type="module" src="../../../../evan/js/create-elements/theme_toggle.js"></script>
</body>

</html>