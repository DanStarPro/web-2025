<?php
include_once 'db_connect.php';
include_once 'validation.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    try {
        // Парсинг JSON из form-data (ключ 'data')
        $json_data = $_POST['data'] ?? '';
        $data = json_decode($json_data, true);
        if (!$data || !isset($data['text'])) {
            throw new Exception("Неверные данные: требуется поле 'text' в JSON.");
        }

        // Валидация данных
        if (!validate_length($data['text'], 500)) {
            throw new Exception("Текст превышает 500 символов.");
        }

        // Обработка фотографии
        $photo = $_FILES['photo'] ?? null;
        $img_name = null;
        if ($photo && $photo['error'] === UPLOAD_ERR_OK) {
            $allowed_types = ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml'];
            $file_type = mime_content_type($photo['tmp_name']);
            if (!in_array($file_type, $allowed_types)) {
                throw new Exception("Неверный формат фотографии.");
            }
            $img_name = basename($photo['name']); 
            $upload_dir = 'images/2home/' . $img_name;
            if (!move_uploaded_file($photo['tmp_name'], $upload_dir)) {
                error_log("Failed to move file: " . print_r(error_get_last(), true));
                throw new Exception("Ошибка при сохранении фотографии: " . error_get_last()['message']);
            }
        }

        // Подключение к БД
        $connection = connectDatabase();

        // Запрос для вставки поста
        $stmt = $connection->prepare("INSERT INTO post (user_id, text, img1, likes, publication_time) VALUES (:user_id, :text, :img1, 0, UNIX_TIMESTAMP())");
        $stmt->execute([
            ':user_id' => $data['user_id'] ?? 1, 
            ':text' => $data['text'],
            ':img1' => $img_name ?: null 
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Пост успешно добавлен', 'post_id' => $connection->lastInsertId()]);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else if ($method === 'DELETE') {
    try {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        if (!$data || !isset($data['post_id'])) {
            throw new Exception("Неверные данные: требуется поле 'post_id'.");
        }

        $connection = connectDatabase();
        $stmt = $connection->prepare("DELETE FROM post WHERE id = :post_id");
        $stmt->execute([':post_id' => $data['post_id']]);

        echo json_encode(['status' => 'success', 'message' => 'Пост успешно удалён']);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Разрешены только методы POST или DELETE']);
}
?>