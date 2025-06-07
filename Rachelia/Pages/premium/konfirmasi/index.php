<?php
  require_once("../../../../libs/auth/middleware.php");

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
    <link rel="stylesheet" href="../../../css/navigasi/css/preflight.css" />
    <link rel="stylesheet" href="../../../css/navigasi/css/utils.css" />
    <link rel="stylesheet" href="../../../css/navigasi/css/components.css" />
    <link rel="stylesheet" href="../../../css/navigasi/css/layout.css" />
    <link rel="stylesheet" href="../../../css/premium/konfirmasi/pilihpaket.css">
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
            <a href="../../../../jayro/page/profil user/" class="button button_primary">
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
        <main id="main">
        <div class="isicontent">
                <h1>Konfirmasi Pembayaran</h1>
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td><b><label for="username">Username : </label></b></td>
                        <td><p id="username" name="username"><?php echo $user_data["username"]?></p></td>
                    </tr>
                    <tr>
                        <td><b><label for="email">Email : </label></b></td>
                        <td><p id="email" name="email"><?php echo $user_data["email"]?></p></td>
                    </tr>
                    <tr>
                        <td><b><label for="paket">Pilihan paket : </label></b></td>
                        <td><p id="paket" name="paket"></p></td>
                    </tr>
                    <tr>
                        <td><b><label for="totalharga">Total Harga : </label></b></td>
                        <td><p id="harga" name="harga"></p></td>
                    </tr>
                </table>
                <div class="payment-method">
                    <div class="qris-box" onclick="toggleSelection()">
                        <img src="https://xendit.co/wp-content/uploads/2020/03/iconQris.png" alt="QRIS Payment" class="qris-img">
                        <span>QRIS</span>
                    </div>
                </div>
                <button class="Konfirmasi" onclick="Konfirmasi()">Konfirmasi</button>
            </div>

            <script>
                window.onload = function() {

                    var paket = localStorage.getItem('selectedPaket');
                    var harga = localStorage.getItem('selectedHarga');


                    if (paket && harga) {
                        document.getElementById('paket').innerText = paket;
                        document.getElementById('harga').innerText = harga;
                    } else {
                        console.error("Data tidak ditemukan di localStorage!");
                    }
                }

                function Konfirmasi(){
                    window.location.href = '../../../Pages/premium/pembayaran'
                }

                function toggleSelection() {
                    var qrisBox = document.querySelector('.qris-box');
                    qrisBox.classList.toggle('selected');
                }
            </script>
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

    <script type="module" src="../../../js/navigasi/layout-dom.js"></script>
    <script type="module" src="../../../js/navigasi/create-elements/theme_toggle.js"></script>
    <script type="module" src="./js/create-elements/generate-home-content.js"></script>
  </body>
</html>