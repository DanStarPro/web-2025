<?php
include_once 'db_connect.php'; 

function get_users(PDO $connection): array {
    $stmt = $connection->query("SELECT * FROM user");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_posts(PDO $connection, ?int $user_id = null): array {
    $sql = "SELECT p.*, u.name_and_surname, u.avatar_icon 
            FROM post p 
            JOIN user u ON p.user_id = u.id";
    if ($user_id) {
        $sql .= " WHERE p.user_id = :user_id";
        $stmt = $connection->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
    } else {
        $stmt = $connection->query($sql);
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_profile(PDO $connection, int $user_id): ?array {
    $stmt = $connection->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->execute(['id' => $user_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_profile_images(PDO $connection, int $user_id): array {
    $stmt = $connection->prepare("SELECT img_path FROM user_images WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $user_id]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}
?>