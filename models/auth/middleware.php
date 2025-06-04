<?php 
    require(__DIR__."/../index.php");
    require(__DIR__."/../schema/ala_ala_jewete.php");

    $is_login = false;
    $user_data = null;

    if (isset($_COOKIE['token']) && !empty($_COOKIE['token'])) {
        
        $token = $_COOKIE['token'];
        $decoded = verifyJWT($token);
        if (count($decoded) != 0) {
            $sq = 'SELECT * FROM users WHERE username = ?';
            $conn->prepare($sq);
            $stmt = $conn->prepare($sq);
            if ($stmt) { 
                $stmt->bind_param('s', $decoded['username']);
                $stmt->execute();
                $result = $stmt->get_result();
                $user_data = $result->fetch_assoc();
                $is_login = true;
                $stmt->close();
            }
        }
    }
