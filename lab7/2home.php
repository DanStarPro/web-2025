<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Home</title>
    <link href="2home_style.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar-group">
        <button class="main_icons"><img src="images/2home/house_icon.png" alt="House_icon" /></button>
        <a href="3profile.php?id=1"> 
            <button class="main_icons"><img src="images/2home/profile_icon.png" alt="Profile_icon" /></button>    
        </a>
        <button class="main_icons"><img src="images/2home/plus_icon.png" alt="Plus_icon" /></button>
    </div>
    
    <?php
        include "2post_shablon.php";
        include "validation.php";
        $file_data = json_decode(file_get_contents("2homeData.json"), true)["users"];
    
        $users = ["id1", "id2"];
        $selected_user_id = isset($_GET["user_id"]) ? "id" . filter_input(INPUT_GET, "user_id", FILTER_VALIDATE_INT) : null;

        if ($selected_user_id && !in_array($selected_user_id, $users)) {
            header("Location: 2home.php");
            exit;
        }

        foreach ($users as $user) {
            $user_data = $file_data[$user];
            if ($selected_user_id && $user !== $selected_user_id) {
                continue;
            }
            foreach ($user_data["posts"] as $post) {
                if (!validate_length($post["text"], 500) || !validate_date($post["publication_time"]) || !validate_type($post["likes"], "integer")) {
                    die("Ошибка валидации данных поста.");
                }
            }
            post_layout($user, $file_data);
        }
    ?>
</body>
</html>