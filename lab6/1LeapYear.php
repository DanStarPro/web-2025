<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Leap Year</title>
</head>
<body>
    <form method="GET">
        <label>Введите год: 
            <input type="number" name="YearInp" min="1" max="30000" required>
        </label>
        <button type="submit">Проверить</button>
    </form>

    <?php
    if (isset($_GET["YearInp"])) {
        $Year = (int)$_GET["YearInp"];
        
        if ((($Year % 4 == 0) && ($Year % 100 != 0)) || ($Year % 400 == 0)) {
            echo "YES";
        } else {
            echo "NO";
        }
    }
    ?>
</body>
</html>