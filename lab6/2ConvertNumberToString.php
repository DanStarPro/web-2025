<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Convert Number To String</title>
</head>
<body>
    <form method="GET">
        <label>Введите цифру (0–9): 
            <input type="number" name="InpNumber" min="0" max="9" required>
        </label>
        <button type="submit">Перевести</button>
    </form>

    <?php
    if (isset($_GET["InpNumber"])) {
        $InNum = $_GET["InpNumber"];

        switch($InNum) {
            case "0":
                echo "Ноль";
                break;
            case "1":
                echo "Один";
                break;
            case "2":
                echo "Два";
                break;
            case "3":
                echo "Три";
                break;
            case "4":
                echo "Четыре";
                break;
            case "5":
                echo "Пять";
                break;
            case "6":
                echo "Шесть";
                break;
            case "7":
                echo "Семь";
                break;
            case "8":
                echo "Восемь";
                break;
            case "9":
                echo "Девять";
                break;
            default:
                echo "Ошибка: введите цифру от 0 до 9";
        }
    }
    ?>
</body>
</html>