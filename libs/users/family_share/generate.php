<?php
    $token = $user_data["id"] . "X" . strval(rand(0, 9)) . strval(rand(0, 9)) . strval(rand(0, 9)) . strval(rand(0, 9)) . strval(rand(0, 9));
    $username = $user_data["username"];
    $sql = "UPDATE users SET family_token_generated = '$token' WHERE username = '$username';";
    $conn->execute_query($sql);


    $stmt = $conn->prepare("SELECT child_id FROM family WHERE parrent_id = ?");
    $stmt->bind_param("i", $user_data['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $child_ids = [];
    while ($row = $result->fetch_assoc()) {
        $child_ids[] = $row['child_id'];
    }

    if (!empty($child_ids)) {
        $placeholders = implode(',', array_fill(0, count($child_ids), '?'));
        $types = str_repeat('i', count($child_ids));

        $sql = $conn->prepare("SELECT * FROM users WHERE id IN ($placeholders)");
        $sql->bind_param($types, ...$child_ids);
        $sql->execute();
        $family_data_result = $sql->get_result();
        $family_data = $family_data_result->fetch_all(MYSQLI_ASSOC);
        $sql->close();
    } else {
        $family_data = [];
    }

?>