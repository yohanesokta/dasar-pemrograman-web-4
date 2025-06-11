<?php
    require_once("../../../libs/auth/middleware.php");
    require_once("../../../libs/users/change_password.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Micro+5&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../assets/css/color.css">
    <link rel="stylesheet" href="../../assets/css/reset.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="judul">
                <span>Change Password</span>
            </div>
            <div class="deskrip">
                <span>Pilih sandi yang kuat dan jangan gunakan lagi untuk akun lain. Pelajari lebih lanjut.</span>
            </div>
            <div class="deskrip">
                <span>Anda mungkin logout dari akun Anda di beberapa perangkat. Pelajari lebih lanjut tempat Anda akan tetap login.</span>
            </div>
            <div class="sub_box">
                <form action="" method="post">
                    <div class="label-input">
                        <label for="prev_password">Password Lama</label>
                    </div>
                    <div class="g-box">
                        <input type="password" name="prev_password" id="prev_password">
                    </div>
                    <div class="deskrip" style="margin-bottom: 15px;">
                    <span>Gunakan setidaknya 8 karakter. Jangan gunakan sandi dari situs lain atau sesuatu yang mudah ditebak, seperti nama hewan peliharaan Anda. Mengapa?</span>
                    </div>
                    <div class="label-input">
                        <label for="new_password">Password Baru</label>
                    </div>
                    <div class="g-box">
                        <input type="password" name="new_password" id="new_password">
                    </div>
                    <?php if ($is_active)  {?>
                    <p style="color:red;"><?php if($response['errors']) { echo $response['message'];} ?></p>
                    <?php }?>
                    <div class="g-button">
                        <button type="submit" class="button-05">
                            <a href="">Ubah password</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
