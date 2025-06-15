<?php
  require_once("../../../libs/auth/middleware.php");
  require_once("../../../libs/users/family_share/generate.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/family-display.css" />
    <link rel="stylesheet" href="../../assets/css/color.css" />
  </head>
  <body class="dark">
    <div class="container">
      <div class="name">
        <div class="fr_name">nonton</div>
        <div class="re_name">.aja</div>
      </div>
      <div class="g-kontent">
        <div class="box_main">
          <ol class="main" id="add">
            <li>

            <?php   foreach($family_data as $data) { ?>
              <div class="img">
                <i class="fa-solid fa-user"></i>
                <div class="g-kontent">
                  <div class="username" id="user"><?php echo $data["name"]; ?></div>
                </div>
              </div>

              <?php  }?>
            </li>
          </ol>
        </div>
      </div>
      <div class="g-kontent">
        <div class="tambah_pengguna">
          <p><?php echo $token;?></p>
          <button class="button-07" onclick="">undang</button>
        </div>
      </div>
    </div>
  </body>
</html>
