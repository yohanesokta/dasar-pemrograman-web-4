<?php

$film_id_tertentu = $_GET['id'];
$reviews = [];
    $sql = "SELECT username, rating, comment FROM review WHERE film_id = ?";

    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        
        $stmt->bind_param("i", $film_id_tertentu);

        
        $stmt->execute();

        
        $result = $stmt->get_result();

        
        if ($result->num_rows > 0) {
            $reviews = $result->fetch_all(MYSQLI_ASSOC);
            var_dump( $reviews );

        }

        
        $stmt->close();
    }



?>