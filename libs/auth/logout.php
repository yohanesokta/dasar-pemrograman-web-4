<?php
    require(__DIR__."/../index.php");
    if (isset($_COOKIE['token'])) {
        setcookie("token", "", time() - 3600, "/"); // Hapus cookie token
    }
    redirect_url("");
?>