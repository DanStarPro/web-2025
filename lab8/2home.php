<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Home</title>
    <link href="2home_style.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar-group">
        <button class="main_icons"><img src="/lab8/images/2home/house_icon.png" alt="House_icon" /></button>
        <a href="3profile.php?id=1"><button class="main_icons"><img src="/lab8/images/2home/profile_icon.png" alt="Profile_icon" /></button></a>
        <button class="main_icons"><img src="/lab8/images/2home/plus_icon.png" alt="Plus_icon" /></button>
    </div>
    
    <?php
        include_once 'db_connect.php'; 
        include_once 'connect_functions.php'; 
        include_once '2post_shablon.php'; 
        include_once 'validation.php'; 

        $connection = connectDatabase();
        $selected_user_id = isset($_GET["user_id"]) ? filter_input(INPUT_GET, "user_id", FILTER_VALIDATE_INT) : null;

        $posts = get_posts($connection, $selected_user_id);
        usort($posts, function($a, $b) {
            return $b['publication_time'] <=> $a['publication_time']; 
        });

        foreach ($posts as $post) {
            if (!validate_length($post['text'], 500) || !validate_date($post['publication_time']) || !validate_type($post['likes'], 'integer')) {
                die("Ошибка валидации данных поста.");
            }
            post_layout($post);
        }
    ?>
</body>
</html>