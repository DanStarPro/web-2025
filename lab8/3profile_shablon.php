<?php 
include_once 'connect_functions.php';
include_once 'validation.php';

function profile_layout(int $user_id, PDO $connection) {
    $user_data = get_profile($connection, $user_id);
    if (!$user_data) {
        header("Location: 2home.php");
        exit;
    }

    if (!validate_length($user_data["description"], 200) || !validate_type($user_data["name_and_surname"], "string")) {
        die("Ошибка: Неверные данные профиля.");
    }

    $avatar_img = $user_data['avatar_icon'];
    $name_and_surname = $user_data['name_and_surname'];
    $description = $user_data['description'];
    $posts_amount = $user_data['posts_amount']; // динамически: count(get_posts($connection, $user_id))
    $imgs = get_profile_images($connection, $user_id);

    echo <<<HTML
        <div class="title-group">
            <img class="avatar_img" src="images/3profile/$avatar_img" alt="User_profile_photo" />
            <h2 class="user_name">$name_and_surname</h2>
            <span class="user_description">$description</span><br/>
            <button class="posts_btn">
                <img src="images/3profile/profile_photo_icon.png" alt="Posts_icon">$posts_amount поста
            </button>   
        </div>
        <div class="images-group">
    HTML;

    foreach ($imgs as $img_path) {
        echo <<<HTML
            <img class="profile_posts" src="$img_path" alt="User_photo" />
        HTML;
    }

    echo "</div>";
}
?>