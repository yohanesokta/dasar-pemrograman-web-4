<?php
require_once ("../index.php");
header("Content-Type: application/json");

if (isset($_POST['username']) && $_POST['username']) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    $sql = "SELECT username FROM users";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo  json_encode(array("error" => "username is not unique","code" => 400));
        
    } else {
        $sql = $conn->prepare("INSERT INTO users (username,password) VALUES (?,?)");
        $sql->bind_param("ss", $username, $password);
        if ($sql->execute()) {
        echo json_encode(array("message" => "berhasil","code"=> 200,"username"=> $username,"password"=> $password));
        } else {    
            echo json_encode(array("message"=> "error","code"=>500));
        }
    }

} else {
    echo json_encode(array('error'=> 'field username or password cant blank' , 'code'=> 400));
}
?>