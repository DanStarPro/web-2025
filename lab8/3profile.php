<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Profile</title>
    <link href="3profile_style.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar-group">
        <a href="2home.php"><button class="main_icons"><img src="images/3profile/house_icon.png" alt="House_icon" /></button></a>
        <button class="main_icons"><img src="images/3profile/profile_icon.png" alt="Profile_icon" /></button>
        <button class="main_icons"><img src="images/3profile/plus_icon.png" alt="Plus_icon" /></button>    
    </div>
    
    <?php
        include 'db_connect.php';
        include '3profile_shablon.php';

        $connection = connectDatabase();
        $id = isset($_GET["id"]) ? filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT) : 1;

        if ($id === false || $id <= 0) {
            header("Location: 2home.php");
            exit;
        }

        profile_layout($id, $connection);
    ?>
</body>
</html>