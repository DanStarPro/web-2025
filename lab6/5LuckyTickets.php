<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>LuckyTickets</title>
</head>
<body>
    <h2>Счастливые билеты</h2>
    <form method="GET">
        <label>Начальный номер билета:
            <input type="text" name="FirstNumberInp" placeholder="111111" required>
        </label>
        <br>
        <label>Конечный номер билета:
            <input type="text" name="SecondNumberInp" placeholder="123321" required>
        </label>
        <br>
        <button type="submit">Найти счастливые билеты</button>
    </form>
    <hr>
    <?php
    if (isset($_GET["FirstNumberInp"]) && isset($_GET["SecondNumberInp"])) {

        $first = $_GET["FirstNumberInp"];
        $second = $_GET["SecondNumberInp"];
        if (!ctype_digit($first) || !ctype_digit($second) || strlen($first) != 6 || strlen($second) != 6) {
            echo "Ошибка: введите корректные 6-значные номера билетов!";
            exit;
        }

        $firstNum = (int)$first;
        $secondNum = (int)$second;
        $foundLucky = false;
        echo "<h3>Счастливые билеты:</h3>";

        for ($num = $firstNum; $num <= $secondNum; $num++) {
            $numStr = str_pad($num, 6, "0", STR_PAD_LEFT);
            $sum1 = (int)$numStr[0] + (int)$numStr[1] + (int)$numStr[2];
            $sum2 = (int)$numStr[3] + (int)$numStr[4] + (int)$numStr[5];

            if ($sum1 == $sum2) {
                echo $numStr . "<br>";
                $foundLucky = true;
            }
        }
        if (!$foundLucky) {
            echo "<p>К сожалению, в указанном диапазоне нет счастливых билетов</p>";
        }
    }
    ?>
</body>
</html>