<?php
    require("../../../models/auth/login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nonton.aja</title>
    <link rel="stylesheet" href="../../assets/css/card.css">
    <link rel="stylesheet" href="../../assets/css/content-input.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Micro+5&display=swap" rel="stylesheet">
</head>
<body class="dark">
    <div class="posisi">
        <div class="kontainer">
            <span class="judul">Login</span>
            <p>Welcome back! Please sign in to continue to your account.</p>
            <?php if ($response['errors'] && $is_active) : ?>
                <span style="color:red;" class="error-message"><?= $response['message'] ?></span>
            <?php endif; ?>
            <form action="" method="post" class="box_isi">
                <label for="username">Username</label><br>
                <input required type="text" name="username" id="username" class="input-box" placeholder="Username"><br>
                <label for="password">Password</label><br>
                <input required type="password" name="password" id="password" class="input-box" placeholder="***********">
                <button id="login" class="button-01">LOGIN</button>
                <div class="g-container">
                    <a
                    href="https://courseapi.yohancloud.biz.id/auth/google?redirect=http://127.0.0.1:5500/jayro/page/profil%20user/index.html"
                    id="google"
                    class="button-02" 
                    >Sign in with Google</a
                    >
                </div>
                <div class="footer">
                    <span>Don't have an account?<a href="../register/index.html">Sign up</a></span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>