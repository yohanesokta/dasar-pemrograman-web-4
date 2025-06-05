<?php

    require_once(__DIR__."/../index.php");
    
    $is_edited = false;
    $response = array("errors" => false, "message" => "");

    if (isset($_POST['name']) || isset($_POST['ttl']) || isset($_POST['email']) || isset($_POST['gender']) || isset($_POST['username']) ) {
        $is_edited = true;
        $name = $_POST['name'] ?? null;
        $ttl = $_POST['ttl'] ?? null;
        $email = $_POST['email'] ?? null;
        $gender = $_POST['gender'] ?? null;
        $username = $_POST['username'] ?? null;

        $sql = "UPDATE users SET name = ?, ttl = ?, email = ?, gender = ?,username = ? WHERE username = ?";
        $update_stmt = $conn->prepare($sql);
        if ($update_stmt) {
             $update_stmt->bind_param("sssss", $name,$ttl,$email,$gender,$username,$username);
             if ($update_stmt->execute()) {
                $response["errors"] = false;
                $response["message"] = "Profil berhasil diperbarui.";
             } else {
                $response["errors"] = true;
                $response["message"] = "Gagal memperbarui profil. Silakan coba lagi.";
             }
             $update_stmt->close();
        }       
    }


?>