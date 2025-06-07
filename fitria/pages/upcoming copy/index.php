<?php
include('../../../libs/auth/middleware.php');
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
    <link rel="stylesheet" href="../../../evan/css/preflight.css" />
    <link rel="stylesheet" href="../../../evan/css/utils.css" />
    <link rel="stylesheet" href="../../../evan/css/components.css" />
    <link rel="stylesheet" href="../../../evan/css/layout.css" />
    <link rel="stylesheet" href="uc.css">
</head>

<body>
    <div class="grid_layout">
        <header id="header">
            <div class="container">
                <a href="http://127.0.0.1:5500/evan/pages/home/index.html"
                    class="brand_logo"><span>nonton</span>.aja</a>
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
                        <a href="../../../jayro/page/profil user/" class="button button_primary">
                            <p style="color:white;"><?php echo $user_data['username']; ?></p>
                            <i class="fa-solid fa-user"></i>
                        </a>

                    <?php } else { ?>
                        <a href="./jayro/page/login" class="button button_primary">
                            Login
                        </a>

                        <a href="./jayro/page/register" class="button button_primary">
                            Register
                        </a>
                    <?php } ?>
                </div>
            </div>
        </header>
        <aside id="sidebar">
        </aside>
        <div class="content">
            <main id="main">
                <div class="film-container">
                    <h1 class="section-title">UPCOMING FILM</h1>

                    <div class="film-grid">
                        <div class="film-card">
                            <img src="https://m.media-amazon.com/images/M/MV5BODIyMDdhNTgtNDlmOC00MjUxLWE2NDItODA5MTdkNzY3ZTdhXkEyXkFqcGc@._V1_SX300.jpg"
                                alt="Batman Begins" class="film-poster">
                            <div class="film-info">
                                <h3 class="film-title">Batman Begins</h3>
                                <div class="film-meta">
                                    <span class="film-year">2005</span>
                                    <span class="film-type">Movie</span>
                                </div>
                            </div>
                        </div>

                        <div class="film-card">
                            <img src="https://m.media-amazon.com/images/M/MV5BMmU5NGJlMzAtMGNmOC00YjJjLTgyMzUtNjAyYmE4Njg5YWMyXkEyXkFqcGc@._V1_SX300.jpg"
                                alt="The Batman" class="film-poster">
                            <div class="film-info">
                                <h3 class="film-title">The Batman</h3>
                                <div class="film-meta">
                                    <span class="film-year">2022</span>
                                    <span class="film-type">Movie</span>
                                </div>
                            </div>
                        </div>

                        <div class="film-card">
                            <img src="https://m.media-amazon.com/images/M/MV5BZTJkYjdmYjYtOGMyNC00ZGU1LThkY2ItYTc1OTVlMmE2YWY1XkEyXkFqcGc@._V1_SX300.jpg"
                                alt="Batman v Superman: Dawn of Justice" class="film-poster">
                            <div class="film-info">
                                <h3 class="film-title">Batman v Superman: Dawn of Justice</h3>
                                <div class="film-meta">
                                    <span class="film-year">2016</span>
                                    <span class="film-type">Movie</span>
                                </div>
                            </div>
                        </div>

                        <div class="film-card">
                            <img src="https://m.media-amazon.com/images/M/MV5BYzZmZWViM2EtNzhlMi00NzBlLWE0MWEtZDFjMjk3YjIyNTBhXkEyXkFqcGc@._V1_SX300.jpg"
                                alt="Batman" class="film-poster">
                            <div class="film-info">
                                <h3 class="film-title">Batman (1989)</h3>
                                <div class="film-meta">
                                    <span class="film-year">1989</span>
                                    <span class="film-type">Movie</span>
                                </div>
                            </div>
                        </div>
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

    <script type="module" src="../../../evan/js/layout-dom.js"></script>
    <script type="module" src="../../../evan/js/create-elements/theme_toggle.js"></script>
</body>

</html>




