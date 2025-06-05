<?php
include(__DIR__ . "/../index.php");
include(__DIR__."/../utils/token_manual.php");


$response = array("errors" => false, "message" => ""); 
$is_active = false;

if (
    isset($_POST['username'], $_POST['password']) &&
    !empty(trim($_POST['username'])) &&
    !empty(trim($_POST['password']))
) {
    $is_active = true;
    $username = trim($_POST['username']);
    $password_plain = trim($_POST['password']);

    
    $sql_get_user = "SELECT username, password, name, tokens FROM users WHERE username = ?"; 
    $stmt_get = $conn->prepare($sql_get_user);

    if ($stmt_get === false) {
        $response['errors'] = true;
        $response['message'] = 'Gagal mempersiapkan statement pengambilan data pengguna.';
        
    } else {
        $stmt_get->bind_param("s", $username);
        $stmt_get->execute();
        $result_user = $stmt_get->get_result();

        if ($result_user->num_rows === 1) {
            
            $user_data = $result_user->fetch_assoc();
            $hashed_password_from_db = $user_data['password'];

            if (password_verify($password_plain, $hashed_password_from_db)) {

                $response['errors'] = false;
                $response['message'] = "Login berhasil!";
                $new_token = generateJWT($user_data['username'],$user_data['name']); 

                $update_token_sql = "UPDATE users SET tokens = ? WHERE username = ?";
                $stmt_update = $conn->prepare($update_token_sql);
                if ($stmt_update === false) {
                    $response['errors'] = true;
                    $response['message'] = 'Gagal mempersiapkan statement pembaruan token.';
                } else {
                    $stmt_update->bind_param("ss", $new_token, $username);
                    if ($stmt_update->execute()) {
                        // Token berhasil diperbarui
                        echo "hello";
                        redirect_url("");
                        setcookie("token", $new_token, time() + (86400 * 30), "/");
                    } else {
                        $response['errors'] = true;
                        $response['message'] = 'Gagal memperbarui token.';
                    }
                    $stmt_update->close();
                }       
                
                $response['token'] = $new_token;
            } else {
                $response['errors'] = true;
                $response['message'] = 'Username atau password salah.';
            }
        } else {
            
            $response['errors'] = true;
            $response['message'] = 'Username atau password salah.';
        }
        $stmt_get->close();
    }
} else {
    $response['errors'] = true;
    $response['message'] = 'Username dan password harus terisi.';
}
?>