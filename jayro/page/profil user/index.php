<?php
  require("../../../libs/auth/middleware.php"); // login atau gak ( userdata !) username2
  require("../../../libs/users/profiles.php"); // simpan -> dirubah username3 
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
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../../../evan/css/preflight.css" />
    <link rel="stylesheet" href="../../../evan/css/utils.css" />
    <link rel="stylesheet" href="../../../evan/css/components.css" />
    <link rel="stylesheet" href="../../../evan/css/layout.css" />
    <link rel="stylesheet" href="../../assets/css/user-profil.css" />
  </head>
  <body>
    <div class="grid_layout">
      <header id="header">
        <div class="container">
          <a
            href="http://127.0.0.1:5500/evan/pages/home/index.html"
            class="brand_logo"
            ><span>nonton</span>.aja</a
          >
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
            <a href="#" class="button button_primary">
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
      <aside id="sidebar"></aside>
      <div class="content">
        <main id="main">
          <div class="display">
            <div class="kontainer-profil">
              <div class="left-profil">
                <div class="img-box">
                  <div>
                    <img
                      src="../../assets/img/20241203233644.png"
                      alt=""
                      id="user-profil"
                      class="profil"
                    />
                  </div>
                </div>
                <div class="box_button">
                  <div class="button-04">
                    <a href="../Reset Password/index.html">Reset Kata Sandi</a>
                  </div>
                  <div class="button-04">
                    <a href="../change Password">Change Password</a>
                  </div>
                  <div class="button-04">
                    <a href="../../../libs/auth/logout.php">Log out</a>
                  </div>
                </div>
              </div>
              <div class="righ-profil" style="padding-top: 30px">
                <form action="" method="post">
                  <div class="profil-user">
                    <h3>Ubah Biodata Diri</h3>
                    <div class="isi-bio">
                      <span>nama</span>
                      <div class="isi">
                        <input class="input_bio" type="text" name="nama" id="nama" value="<?php echo $user_data['name'] ?>">
                      </div>
                    </div>
                    <div class="isi-bio">
                      <span>Tanggal Lahir</span>
                      <div class="isi">
                        <input class="input_bio" type="text" name="birtday" id="birtday" value="<?php echo $user_data['ttl'] ?>" placeholder="Tanggal lahir User">
                      </div>
                    </div>
                    <div class="isi-bio">
                      <span>Jenis Kelamin</span>
                      <div class="isi">
                        <input class="input_bio" type="text" name="gender" id="gender" value="<?php echo $user_data['gender'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="kontak" style="padding-top: 30px">
                    <h3>Kontak User</h3>
                    <div class="isi-bio">
                      <span>Email</span>
                      <div class="isi">

                        <input class="input_bio" type="text"  value="<?php echo $user_data['email'] ?>" disabled>


                      </div>
                    </div>
                    <div class="isi-bio">
                      <span>Username</span>
                      <div class="isi">

                        <input class="input_bio" type="text" value="<?php echo $user_data['username'] ?>" disabled>
                        <input class="input_bio" type="text" name="username" id="username" value="<?php echo $user_data['username'] ?>" style="display:none;">

                      </div>
                    </div>
                    <?php if ($is_edited) { if ($response['errors']) {?>
                    <p style="color:red">HELLO</p>

                    <?php }}?>
                    <div class="isi-bio">
                      <div class="isi">
                        <button class="input_bio" type="submit" name="submit" id="password" style="background-color: var(--primary); color: white; border: none; padding: 10px 20px; border-radius: 5px;">
                            Simpan Perubahan    
                        </button>
                      </div>
                  </div>
                  <div class="kids_box" style="padding-top: 30px">
                    <h3>Family Share</h3>
                    <span class="isi"
                      >Bagikan keseruan menonton dengan seluruh keluarga. Cukup
                      satu biaya langganan untuk membuat beberapa profil
                      terpisah, sehingga setiap anggota bisa menikmati film
                      favoritnya masing-masing.</span
                    >
                  </div>
                  <div class="button-14">
                    <a href="../family share">Family Share</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
    <script
      type="module"
      src="../../../evan/js/create-elements/theme_toggle.js"
    ></script>
    <script
      type="module"
      src="./js/create-elements/generate-home-content.js"
    ></script>
  </body>
</html>
