<?php
    require_once("../../index.php");
    header('Content-Type: application/json; charset=utf-8');
    $token = $_POST['token'] ?? null;
    if (!empty($token)) {
        $id = explode("X",$token)[0];
        $stmt = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($stmt);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($token == $row['family_token_generated']) {
                echo json_encode(["action" => true]);
            } else {
                echo json_encode(["action"=> false]);
            }
        } else {
            echo json_encode(["action"=> false]);
        }
    }
