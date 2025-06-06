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
            <button class="button button_ghost">Get Premium</button>
            <button class="button button_outline">
              <i class="fa-regular fa-bell"></i>
            </button>
            <?php 
                if ($is_login) {
            ?>
            <a href="./jayro/page/profil user/" class="button button_primary">
                <p style="color:white;"><?php  echo $user_data['username']; ?></p>
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
            <div class="detail">
                <img src="../assets/minecraft.jpg" alt="">
                <div class="logo">
                    <img src="../assets/mojang.logo.png" alt="">
                </div>
                <div class="bottom-info">
                    <div class="buy">
                        <button>Play Now</button>
                    </div>
                    <div class="simple-info">
                        A Minecraft Movie adalah sebuah film komedi, petualangan, dan fantasi dari Amerika yang dirilis pada tahun 2025 yang didasarkan oleh sebuah video game dari tahun 2011 bernama Minecraft, oleh Mojang Studios.
                    </div>
                </div>
            </div>
            <div class="deskripsi">
                <h1>Minecraft Movie</h1>
                <div class="menu">
                    <button class="active">Overview</button>
                    <button>More Like This</button>
                    <button>Details</button>
                </div>
                <ul>
                    <li>
                        <p>A Minecraft Movie adalah sebuah film komedi, petualangan, dan fantasi dari Amerika yang dirilis pada tahun 2025 yang didasarkan oleh sebuah video game dari tahun 2011 bernama Minecraft, oleh Mojang Studios</p>
                    </li>
                    <li>
                        <span>Tanggal rilis: 9 April 2025</span>
                    </li>
                    <li>
                        <span>Sutradara: Jared Hess</span>
                    </li>
                    <li>
                        <span>Bahasa: Inggris</span>
                    </li>
                    <li>
                        <span>Perusahaan produksi: Warner Bros. Pictures; Legendary Pictures; Vertigo Entertainment; On the Roam; Mojang Studios</span>
                    </li>
                </ul>
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
  </body>
</html>



