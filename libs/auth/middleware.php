<?php 
    require(__DIR__."/../index.php");
    require(__DIR__."/../utils/token_manual.php");

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
    } else {
        redirect_url("/evan/pages/landing");
    }

    function deletePremium() {
        global $user_data;
        $stmt = "UPDATE users SET premium = 0, expire_premium = NULL WHERE id = ?";
        $stmt = $GLOBALS['conn']->prepare($stmt);
        $stmt->bind_param("i", $user_data['id']);
        $stmt->execute();
        $stmt->close();
        redirect_url("/Rachelia/Pages/premium/premium");
    }
    function verifPremium() {
        global $user_data;
        if ($user_data['premium'] == 1) {
            $time_now = new DateTime();
            $time_expire = new DateTime($user_data['expire_premium']);
            if ($time_now > $time_expire) {
                deletePremium(); 
            }
            return true;
        }
        deletePremium();
    }
