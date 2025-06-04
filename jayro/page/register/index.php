<?php 
require("../../../models/auth/register.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>nonton.aja</title>
    <link rel="stylesheet" href="../../assets/css/card.css" />
    <link rel="stylesheet" href="../../assets/css/content-input.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Micro+5&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="dark">
    <div class="posisi">
      <form action="" method="post" class="kontainer">
        <span class="judul">Sign Up</span>
        <p>
          Create your account to get started and enjoy all the features we
          offer.
        </p>
        <?php if ($response['errors'] && $is_active) : ?>
          <span style="color:red;" class="error-message">
            <?= $response['message'] ?>
          </span>
        <?php endif; ?>
        <div class="box_isi">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="input-box" />

          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="input-box" />

          <label for="password">Password</label>
          <input
            type="password"
            name="password"
            id="password"
            class="input-box"
          />

          <label for="confirm">Confirm Password</label>
          <input
            type="password"
            name="confirm"
            id="confirm"
            class="input-box"
          />

          <button id="sign_up" class="button-01">REGISTER</button>
          <div class="g-container">
            <a
              href="https://courseapi.yohancloud.biz.id/auth/google?redirect=<?php echo $app_url.'/models/auth/google_callback.php' ?>" 
              id="google"
              class="button-02" 
              >Sign in with Google</a
            >
          </div>
          <div class="footer">
            <span
              >You have account?<a
                href="../login"
                >Sign in</a
              ></span
            >
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
