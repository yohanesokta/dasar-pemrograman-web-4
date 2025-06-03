<?php
require_once ("../index.php");
header("Content-Type: application/json");

$is_active = 0;
$errors = array("errors" => false,"message" => "");


if (isset($_POST['username']) && $_POST['password'] && $_POST['name']) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $name = htmlspecialchars( $_POST['name']);
    
    $sql = "SELECT username FROM users";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $errors['errors'] = true;
        $errors['message'] = 'server errors';
    } else {
        $sql = $conn->prepare("INSERT INTO users (username,password) VALUES (?,?)");
        $sql->bind_param("ss", $username, $password);
        if ($sql->execute()) {
            $errors ["errors"] = false;
        } else {    
            $errors['message'] = "username sudah pernah di pakai";
            $errors['errors'] = true;
        }
    }

} else {
    $errors['errors'] = true;
    $errors['message'] = 'username , password , name harus terisi';
}
?>