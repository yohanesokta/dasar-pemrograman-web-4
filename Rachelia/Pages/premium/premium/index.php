<?php
  require_once("../../../../libs/auth/middleware.php");

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
  <link rel="stylesheet" href="../../../css/premium/premium/pembelian.css">
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
        <div id="premium"></div>
        <h1 class="judulPremium">Premium</h1>
        <p class="paragraf">Gabung ke premium dan saksikan film sepuasmu!!!</p>
        <div class="isiprem">
          <div class="box">
            <div class="judul">
              <h4 class="hurufjudul">1 Bulan</h4>
            </div>
            <ul class="textlist">
              <li> Hanya Untuk 1 akun Premium.</li>
              <li> Batalkan Kapan Saja.</li>
            </ul>
            <h4 class="harga">Rp. 22.000</h4>
            <div class="boxpilih">
              <button type="button" onclick="pilihPaket('1 Bulan', 'Rp. 22.000',1)">Pilih Paket</button>
            </div>
          </div>
          <div class="box">
            <div class="judul">
              <h4 class="hurufjudul">3 Bulan</h4>
            </div>
            <ul class="textlist">
              <li> Hanya Untuk 1 akun Premium.</li>
              <li> Batalkan Kapan Saja.</li>
            </ul>
            <h4 class="harga">Rp. 56.000</h4>
            <div class="boxpilih">
              <button type="button" onclick="pilihPaket('3 Bulan', 'Rp. 56.000',3)">Pilih Paket</button>
            </div>
          </div>
          <div class="box">
            <div class="judul">
              <h4 class="hurufjudul">1 Tahun</h4>
            </div>
            <ul class="textlist">
              <li> Hanya Untuk 1 akun Premium.</li>
              <li> Batalkan Kapan Saja.</li>
            </ul>
            <h4 class="harga">Rp. 242.000</h4>
            <div class="boxpilih">
              <button type="button" onclick="pilihPaket('1 Tahun', 'Rp. 242.000',12)">Pilih Paket</button>
            </div>
          </div>
          <div class="box">
            <div class="judul">
              <h4 class="hurufjudul">Family 1 Bulan</h4>
            </div>
            <ul class="textlist">
              <li> Sampai 4 akun Premium.</li>
              <li> Batalkan Kapan Saja.</li>
            </ul>
            <h4 class="harga">Rp. 62.000</h4>
            <div class="boxpilih">
              <button type="button" onclick="pilihPaket('Family 1 Bulan', 'Rp. 62.000',1)">Pilih Paket</button>
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
    <script>
          const username = "<?php echo $user_data["username"] ?>";
          const email = "<?php echo $user_data["email"] ?>";
          const name = "<?php echo $user_data["name"] ?>";
          function pilihPaket(paket, harga,jumlah) {
            localStorage.setItem('selectedPaket', paket);
            localStorage.setItem('selectedHarga', harga);
            localStorage.setItem('jumlah', jumlah);
            window.location.href = '../../../Pages/premium/konfirmasi';
          }
    </script>
  <script type="module" src="../../../js/navigasi/layout-dom.js"></script>
  <script type="module" src="../../../js/navigasi/create-elements/theme_toggle.js"></script>
</body>

</html>