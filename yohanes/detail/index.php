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
              <div class="detail">
                  <img src="../assets/minecraft.jpg" id="image_thumbnail" alt="">
                  <div class="bottom-info">
                      <a href="../trailers?id=<?php echo $_GET['id']?>" class="buy">
                          <button>Play Trailers</button>
                      </a>

                      <a href="../../Rachelia/Pages/putar film/?id=<?php echo $_GET['id']?>" class="buy">
                          <button>Play Now</button>
                      </a>
                  </div>
              </div>
              <div class="deskripsi">
                  <h1 id="title_movie">Minecraft Movie</h1>
                  <div class="menu">
                      <button class="active">Overview</button>
                      <button><a href="../../angga/actor film?id=<?php echo $_GET['id']; ?>">Actor Film</a></button>
                      <button><a href="../../Rachelia/Pages/crew?id= <?php echo $_GET['id']; ?>">Crew Film</a></button>
                      <button id="btn-love" style="color: gray;"><i id="icn-love"  class="fa-solid fa-heart"></i></button>
                      <button id="btn-letter" style="color: gray;"><i id='icn-letter' class="fa-solid fa-clock-rotate-left" ></i> Watch Letter</button>

                  </div>
                  <ul>
                      <li>
                          <p id="overview">A Minecraft Movie adalah sebuah film komedi, petualangan, dan fantasi dari Amerika yang dirilis pada tahun 2025 yang didasarkan oleh sebuah video game dari tahun 2011 bernama Minecraft, oleh Mojang Studios</p>
                      </li>
                      <li>
                          <span id="release">Tanggal rilis: 9 April 2025</span>
                      </li>
                      <li>
                          <span>Sutradara: Jared Hess</span>
                      </li>
                      <li>
                          <span id="lang">Bahasa: Inggris</span>
                      </li>
                      <li>
                          <span id="status">Status : Release</span>
                      </li>
                  </ul>
                  <div class="btn-review">
                      <a href="../../Rachelia/Pages/review film/review?id=<?php echo $_GET['id']?>" class="r" id="review-button"><i class="fa-solid fa-comment"></i> Review</a>
                      <a href="../../Rachelia/Pages/review film/ulasan?id=<?php echo $_GET['id']?>" class="r" id="add-review-button"><i class="fa-solid fa-pen-to-square"></i>Add Review</a>
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
      <script type="module">
        const formData = new FormData();
        let liked = null;
        let letter = null

        function refreshBtn() {
          if (liked == 1) {
            document.getElementById("btn-love").style.color = "red";
          } else {
            document.getElementById("btn-love").style.color = "gray";
          }


          if (letter == 1) {
            document.getElementById("btn-letter").style.color = "green";
          } else {
            document.getElementById("btn-letter").style.color = "gray";
          }
        }

        import {config} from "../../app_config.js"
        async function handle_history(formData) {
            
            await fetch(config["APP_URL "] + "/libs/users/add_history.php",
                {
                    method : "POST",
                    body : formData
                }
            ).then(val => val.json()).then(val => {
              liked = val.liked
              letter = val.wl
              refreshBtn()
            })
        }


        document.getElementById("btn-love").addEventListener("click",(event) => {

            if (liked == null) {
              formData.append("liked",1);
              liked = 1
            } else if (liked == 1) {
              liked = 0; formData.set('liked',0);
            } else {
              liked = 1; formData.set('liked',1);
            }
            refreshBtn()
            fetch(config["APP_URL "] + "/libs/users/add_history.php",
                {
                    method : "POST",
                    body : formData
                }
            )
        })

        document.getElementById("btn-letter").addEventListener("click",(event) => {

            if (letter == null) {
              formData.append("letter",1);
              letter = 1
            } else if (letter == 1) {
              letter = 0; formData.set('letter',0);
            } else {
              letter = 1; formData.set('letter',1);
            }
            refreshBtn()
            fetch(config["APP_URL "] + "/libs/users/add_history.php",
                {
                    method : "POST",
                    body : formData
                }
            )
        })

        const body = document.querySelector('main');
        const image_thumbnail = document.querySelector('#image_thumbnail');
        const overview = document.querySelector('#overview');
        const release = document.querySelector('#release');
        const lang = document.querySelector('#lang');
        const status = document.querySelector('#status');
        const title_movie = document.querySelector('#title_movie');
        body.style.display = 'none';

        const id = "<?php echo $_GET['id'];?>"
        const url = ""

        fetch(`https://api.themoviedb.org/3/movie/${id}`,{
          headers : {
            accept: "application/json",
        Authorization:
          "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMTFkZmEyNjQ4ZmM1OTk0MTZkY2M5ODMwYWZmM2IxMyIsIm5iZiI6MTc0ODE5NjQzOC4yMTEsInN1YiI6IjY4MzM1YzU2MTNiOTFhMzdjYTJiNzIyMCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.9kmTunFIeMecPRfDvSa9Lyfl3lZ9W0LhVDg4K1lc8aE",
          }
        }).then((event) => event.json()).then((data) => {
          console.log(data)

          formData.append('username',"<?php echo $user_data['username']?>")
          formData.append('film_id',id)
          formData.append('film_name',data.title)
          formData.append('film_thumbnail',data.poster_path)
          formData.append('film_desc',data.overview)
          
          handle_history(formData);
          document.getElementById('review-button').href = `../../Rachelia/Pages/review film/review?id=<?php echo $_GET['id']?>&name=${data.title}`

          body.style.display = 'block';
          overview.innerHTML = data.overview;
          release.innerHTML = `Tanggal rilis: ${data.release_date}`;
          lang.innerHTML = `Bahasa: ${data.original_language}`;
          status.innerHTML = `Status: ${data.status}`;
          title_movie.innerHTML = data.title;
          image_thumbnail.src = `https://image.tmdb.org/t/p/original/${data.poster_path}`;
        })
      </script>
    </body>
  </html>