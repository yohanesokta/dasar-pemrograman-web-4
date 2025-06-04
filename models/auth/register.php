<?php
include(__DIR__ . "/../index.php");
include(__DIR__ . "/../schema/ala_ala_jewete.php");
$response = array("errors" => false, "message" => "");
$is_active = false;
if (
    isset($_POST['username'], $_POST['password'], $_POST['name']) &&
    !empty(trim($_POST['username'])) &&
    !empty(trim($_POST['password'])) &&
    !empty(trim($_POST['name']))
) {
    $is_active = true;
    $username = trim($_POST['username']);
    $password_plain = trim($_POST['password']);
    $name = trim($_POST['name']);
    $sql_check_username = "SELECT username FROM users WHERE username = ?";
    $stmt_check = $conn->prepare($sql_check_username);
    if ($stmt_check === false) {
        $response['errors'] = true;
        $response['message'] = 'Gagal mempersiapkan statement pengecekan username.';
    } else {
        $stmt_check->bind_param("s", $username);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        if ($result_check->num_rows > 0) {
            $response['errors'] = true;
            $response['message'] = 'Username sudah pernah dipakai.';
        } else {
            $hashed_password = password_hash($password_plain, PASSWORD_DEFAULT);
            $create_token = generateJWT();
            if ($hashed_password === false) {
                $response['errors'] = true;
                $response['message'] = 'Gagal melakukan hashing password.';
            } else {
                $sql_insert_user = $conn->prepare("INSERT INTO users (username, password, name,tokens) VALUES (?, ?, ?, ?)");
                if ($sql_insert_user === false) {
                    $response['errors'] = true;
                    $response['message'] = 'Gagal mempersiapkan statement registrasi.';
                } else {
                    $sql_insert_user->bind_param("ssss", $username, $hashed_password, $name, $create_token);
                    if ($sql_insert_user->execute()) {
                        $response["errors"] = false;
                        $response['message'] = "Registrasi berhasil!";
                        setcookie("token", $create_token, time() + (86400 * 30), "/");
                    } else {
                        $response['errors'] = true;
                        $response['message'] = "Registrasi gagal. Silakan coba lagi.";
                    }
                    $sql_insert_user->close();
                }
            }
        }
        $stmt_check->close();
    }
} else {
    $response['errors'] = true;
    $response['message'] = 'Username, password, dan nama harus terisi.';
}

?>