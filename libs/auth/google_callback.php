<?php
    require(__DIR__."/../index.php");
    require(__DIR__."/../utils/token_manual.php");
    require(__DIR__."/../utils/jsonwebtoken_decode.php");


    if (isset($_GET["token"])) {
        $token = $_GET["token"];
        $decoded = manualJwtDecode($token);
        echo "Tunggu Sebentar...";
        if ($decoded !== null) {
            $username = $decoded['payload']['username'];
            $name = $decoded['payload']['username'];
            $email = $decoded['payload']['user_email'];

            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $result = $stmt->get_result();
                $new_token = generateJWT($username, $name);
                if ($result->num_rows > 0) {
                    $user_data = $result->fetch_assoc();
                    $update_sql = "UPDATE users SET tokens = ? WHERE username = ?";
                    $update_stmt = $conn->prepare($update_sql);
                    if ($update_stmt) {
                        $update_stmt->bind_param('ss', $new_token, $username);
                        if ($update_stmt->execute()) {
                            
                            setcookie("token", $new_token, time() + (86400 * 30), "/");
                            redirect_url("");
                        } else {
                            echo "Failed to update token.";
                        }
                        $update_stmt->close();
                    } else {
                        echo "Failed to prepare update statement.";
                    }
                } else {
                    $sql = "INSERT INTO users (username, name, tokens , password,email) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    if ($stmt) {
                        $stmt->bind_param('sssss', $username, $name, $new_token , $name, $email);
                        if ($stmt->execute()) {
                            
                            setcookie("token", $new_token, time() + (86400 * 30), "/");
                            redirect_url("");
                        } else {
                            echo "Failed to register user.";
                        }
                    } else {
                        echo "Failed to prepare insert statement.";
                    }
                }
                $stmt->close();
            } else {
                echo "Failed to prepare statement.";
            }
        } else {
            echo "Invalid token.";
        }
    } else {
        redirect_url("");
    }
?>