<?php
require_once(__DIR__."/../index.php");

$username = $_POST['username'];
$film_id = $_POST['film_id']; 
$film_name = $_POST['film_name'];
$film_thumbnail = $_POST['film_thumbnail'];

$film_id = (int)$film_id;


$getHistory = $conn->prepare("SELECT id FROM history WHERE username = ? AND film_id = ?");
$getHistory->bind_param("si", $username, $film_id); 
$getHistory->execute();
$result = $getHistory->get_result();
$existing_history = $result->fetch_assoc();
$getHistory->close(); 


if ($existing_history !== null) {
    
    
    $update_history = $conn->prepare("UPDATE history SET update_at = CURRENT_TIMESTAMP WHERE username = ? AND film_id = ?");
    $update_history->bind_param("si", $username, $film_id);
    if ($update_history->execute()) {
        echo "History berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui history: " . $update_history->error;
    }
    $update_history->close();

} else {
    
    
    $create_history = $conn->prepare("INSERT INTO history (username, film_id, film_name, film_thumbnail, update_at) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)");
    
    $create_history->bind_param("siss", $username, $film_id, $film_name, $film_thumbnail);
    
    if ($create_history->execute()) {
        echo "History baru berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan history: " . $create_history->error;
    }
    $create_history->close();
}

?>