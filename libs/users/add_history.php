<?php
require_once(__DIR__."/../index.php");
header('Content-Type: application/json; charset=utf-8');

$username = $_POST['username'];
$film_id = $_POST['film_id']; 
$film_name = $_POST['film_name'];
$film_thumbnail = $_POST['film_thumbnail'];

$film_id = (int)$film_id;


$getHistory = $conn->prepare("SELECT id, wathletter, liked FROM history WHERE username = ? AND film_id = ?");
$getHistory->bind_param("si", $username, $film_id); 
$getHistory->execute();
$result = $getHistory->get_result();
$existing_history = $result->fetch_assoc();
$getHistory->close(); 

$watchletter = $_POST['letter'] ?? $existing_history['wathletter'];
$liked = $_POST['liked'] ?? $existing_history['liked'];



if ($existing_history !== null) {
    
    $update_history = $conn->prepare("UPDATE history SET update_at = CURRENT_TIMESTAMP, liked = ?, wathletter = ? WHERE username = ? AND film_id = ?");
    $update_history->bind_param("iisi",$liked,$watchletter, $username, $film_id);
    if ($update_history->execute()) {
        echo json_encode(["status"=> "success","message"=> "", "liked" => $liked , "wl" => $watchletter]);
    } else {
        echo json_encode(["status"=> "error","message"=> "", "liked" => $liked , "wl" => $watchletter]);
    }
    $update_history->close();

} else {
    
    
    $create_history = $conn->prepare("INSERT INTO history (username, film_id, film_name, film_thumbnail, update_at) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)");
    
    $create_history->bind_param("siss", $username, $film_id, $film_name, $film_thumbnail);
    
    if ($create_history->execute()) {
        echo json_encode(["status"=> "success","message"=> "", "liked" => $liked , "wl" => $watchletter]);

    } else {
        echo json_encode(["status"=> "error","message"=> "", "liked" => $liked , "wl" => $watchletter]);

    }
    $create_history->close();
}

?>