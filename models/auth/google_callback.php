<?php
    require(__DIR__."/../index.php");
    require(__DIR__."/../schema/ala_ala_jewete.php");

    if (isset($_GET["token"])) {
        $token = $_GET["token"];
        $decoded = manualJwtDecode($token);
        var_dump($decoded);
        if ($decoded !== null) {
            $username = $decoded['payload']['username'];
            $name = $decoded['payload']['username'];

            // Check if the user exists in the database
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $result = $stmt->get_result();
                $new_token = generateJWT($username, $name);
                if ($result->num_rows > 0) {
                    // User exists, update the token
                    $user_data = $result->fetch_assoc();
                    

                    // Update the token in the database
                    $update_sql = "UPDATE users SET tokens = ? WHERE username = ?";
                    $update_stmt = $conn->prepare($update_sql);
                    if ($update_stmt) {
                        $update_stmt->bind_param('ss', $new_token, $username);
                        if ($update_stmt->execute()) {
                            // Set the cookie and redirect
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
                    $sql = "INSERT INTO users (username, name, tokens , password) VALUES (?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    if ($stmt) {
                        $stmt->bind_param('ssss', $username, $name, $new_token , $name);
                        if ($stmt->execute()) {
                            // Set the cookie and redirect
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