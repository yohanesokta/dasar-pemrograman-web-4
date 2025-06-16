<?php 
require_once(__DIR__ ."/../index.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $film_id = $_POST['film_id'];
    $username = isset($_POST['username']) ? (int)$_POST['username'] : '';
    $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    

    
    if (!empty($comment)) {

        
        $sql = "INSERT INTO `review` (film_id,username, rating, comment) VALUES (?,?, ?, ?)";

        
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            
            
            $stmt->bind_param("isis",$film_id, $username, $rating, $comment);

            
            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Review berhasil ditambahkan."]);
                redirect_url("/Rachelia/Pages/review%20film/kirim%20ulasan/");
            } else {
                http_response_code(500);
                echo json_encode(["status" => "error", "message" => "Gagal mengeksekusi statement: " . $stmt->error]);
            }

            
            $stmt->close();
        } else {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Gagal menyiapkan statement: " . $conn->error]);
        }
    } else {
        
        http_response_code(400); 
        echo json_encode(["status" => "error", "message" => "Data tidak lengkap atau format salah."]);
    }
} else {
    
    http_response_code(405); 
    echo json_encode(["status" => "error", "message" => "Metode tidak diizinkan."]);
}


$conn->close();
?>