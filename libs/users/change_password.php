<?php

    $is_active = false;
    $response = array("errors" => false, "message" => ""); 

    if (isset($_POST['prev_password']) && isset($_POST['new_password'])) {
        $is_active = true;
        if(password_verify($_POST['prev_password'],$user_data['password'])) {
            $hashed_password = password_hash($_POST['new_password'],PASSWORD_DEFAULT);
            $stmt_update_password = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($stmt_update_password);
            $stmt->bind_param("ss",$hashed_password,$user_data['id']);
            $stmt->execute();
            redirect_url("");
        } else {
            $response['errors'] = true;
            $response['message'] = "Coba Masukkan Password lama yang benar";
        }
    }