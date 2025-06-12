<?php
    $stmt = $conn->prepare("SELECT * FROM history WHERE username = ?");
    $stmt->bind_param("s", $user_data["username"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_history = $result->fetch_all();
    $stmt->close();
