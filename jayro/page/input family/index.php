<?php
  require_once('../../../libs/auth/middleware.php');
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../assets/css/family-display.css" />
    <link rel="stylesheet" href="../../assets/css/color.css" />
    <link rel="stylesheet" href="../../assets/css/family_input.css">
  </head>
  <body class="dark">
    <div class="container">
      <div class="name">
        <div class="fr_name">nonton</div>
        <div class="re_name">.aja</div>
      </div>
      <div class="g-kontent">
        <div class="kontainer">
          <div class="box">
            <div class="judul">
              <span>Join Family</span>
            </div>
            <div class="deskripsi">
              <span
                >Tempel (paste) kode unik dari keluarga Anda di kolom bawah ini
                untuk bergabung secara otomatis.</span
              >
            </div>
            <form action="" method="post">
                <div class="input">
                  <input class="input_table" type="text" name="token" id="token" />
                </div>
                <div class="button">
                  <button type="submit" class="button-08">Join</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="module" >
     import {config} from "../../../app_config.js"
      document.querySelector("form").addEventListener("submit",event => {
        event.preventDefault();
        const token = document.getElementById("token");    
        console.log(token.value);
        if (token.value.length > 0) {        
            const formData = new FormData();
            formData.append("token",token.value);
            formData.append('id',<?php echo $user_data['id']; ?>)
            

            fetch(config["APP_URL "] + "/libs/users/family_share/access.php",{
                method: "POST",
                body: formData
            }).then(value => value.json()).then((respone) => {
                if (respone.action) {
                    window.location.href = config["APP_URL "]
                } else {
                    alert("TOKEN TIDAK VALID!")
                }
           })
        }
     })
  </script>
</html>
