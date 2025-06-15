<?php
    require_once("../../index.php");
    header('Content-Type: application/json; charset=utf-8');
    $token = $_POST['token'] ?? null;
    $userId = $_POST['id'] ?? null;
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
                $stmt = "INSERT INTO family (parrent_id, child_id) VALUES (?, ?)";
                $stmt = $conn->prepare($stmt);
                $stmt->bind_param("ii", $id,$_POST['id']);
                $stmt->execute();
                $parrentPremium = $row['premium'];
                $parrentUpdatePremium = $row['update_premium'];
                $parrentExpirePremium = $row['expire_premium'];

                $stmt = "UPDATE users SET premium = $parrentPremium, update_premium = '$parrentUpdatePremium', expire_premium = '$parrentExpirePremium' WHERE id = '$userId'";
            
                $conn->execute_query($stmt);
                
                echo json_encode(["action" => true]);
            } else {
                echo json_encode(["action"=> false]);
            }
        } else {
            echo json_encode(["action"=> false]);
        }
    }
