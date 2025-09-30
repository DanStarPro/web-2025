<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Profile</title>
    <link href="3profile_style.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar-group">
        <a href="2home.php">
            <button class="main_icons"><img src="images/3profile/house_icon.png" alt="House_icon" /></button>    
        </a>
        <button class="main_icons"><img src="images/3profile/profile_icon.png" alt="Profile_icon" /></button>
        <button class="main_icons"><img src="images/3profile/plus_icon.png" alt="Plus_icon" /></button>    
    </div>
    
    <?php
        include "3profile_shablon.php";
        include "validation.php";

        $id = "id1";
        if (isset($_GET["id"])) {
            $id_check = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
            if ($id_check !== false && $id_check > 0) {
                $id = "id" . $id_check;
            } else {
                header("Location: 2home.php");
                exit;
            }
        }

        $file_data = json_decode(file_get_contents("3profileData.json"), true)["users"];

        if (!isset($file_data[$id])) {
            header("Location: 2home.php");
            exit;
        }

        $user_data = $file_data[$id];
        if (!validate_length($user_data["description"], 200)) {
            die("Ошибка: Описание слишком длинное.");
        }
        if (!validate_type($user_data["name_and_surname"], "string")) {
            die("Ошибка: Неверный тип имени.");
        }

        profile_layout($id, $file_data);
    ?>
</body>
</html>