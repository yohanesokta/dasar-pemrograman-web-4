<?php
    $token = $user_data["id"]."X".strval(rand(0,9)).strval(rand(0,9)).strval(rand(0,9)).strval(rand(0,9)).strval(rand(0,9));
    $username = $user_data["username"];
    $sql = "UPDATE users SET family_token_generated = '$token' WHERE username = '$username';";
    $conn->execute_query($sql);
?>