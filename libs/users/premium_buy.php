<?php
    require_once(__DIR__."/../index.php");

    if (isset($_GET['paket'])) {
        $time= new DateTime();
        $time_now = $time->format("Y-m-d H:i:s");
        $time->modify("+".$_GET['paket']."month");
        $time_string = $time->format("Y-m-d H:i:s");

        $stmt = "UPDATE users SET premium = 1, update_premium = ?, expire_premium = ? WHERE id = ?";
        $stmt = $conn->prepare($stmt);
        $stmt->bind_param("ssi", $time_now, $time_string, $user_data['id']);
        $stmt->execute();
    } 
?>