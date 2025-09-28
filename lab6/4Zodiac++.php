<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Zodiac++</title>
</head>
<body>
    <h2>Введите дату</h2>
    <form method="GET">
        <input type="text" name="DateInp" placeholder="ДД.ММ.ГГГГ или ГГГГ.ММ.ДД">
        <button type="submit">Определить знак зодиака</button>
    </form>
    <hr>
    <?php
    if (isset($_GET["DateInp"])) {
        $dateData = $_GET["DateInp"];

        $date = [];
        $buf = "";
        for ($i = 0; $i < strlen($dateData); $i++) {
            $ch = $dateData[$i];
            if (ctype_digit($ch)) {
                $buf .= $ch;
            } else {
                if ($buf != "") {
                    $date[] = $buf;
                    $buf = "";
                }
            }
        }
        if ($buf != "") {
            $date[] = $buf;
        }

        $day = $month = $year = null;
        if (count($date) == 3) {
            if (strlen($date[0]) == 4) {
                // формат ГГГГ-ММ-ДД
                $year = (int)$date[0];
                $month = (int)$date[1];
                $day = (int)$date[2];
            } else {
                // формат ДД-ММ-ГГГГ
                $day = (int)$date[0];
                $month = (int)$date[1];
                $year = (int)$date[2];
            }
        } else {
            echo "Ошибка: введите дату в формате ДД.ММ.ГГГГ или ГГГГ.ММ.ДД";
            exit;
        }

        $daysInMonth = [
            1=>31,
            2=>($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0) ? 29 : 28),
            3=>31, 4=>30, 5=>31, 6=>30,
            7=>31, 8=>31, 9=>30, 10=>31,
            11=>30, 12=>31
        ];

        if ($month < 1 || $month > 12 || $day < 1 || $day > $daysInMonth[$month]) {
            echo "Ошибка: такой даты не существует!";
            exit;
        }

        echo "Дата распознана как: $day.$month.$year<br>";

        if (($month == 1  && $day >= 21) || ($month == 2  && $day <= 19)) echo "Ваш знак зодиака: Водолей";
        elseif (($month == 2  && $day >= 20) || ($month == 3  && $day <= 20)) echo "Ваш знак зодиака: Рыбы";
        elseif (($month == 3  && $day >= 21) || ($month == 4  && $day <= 20)) echo "Ваш знак зодиака: Овен";
        elseif (($month == 4  && $day >= 21) || ($month == 5  && $day <= 21)) echo "Ваш знак зодиака: Телец";
        elseif (($month == 5  && $day >= 22) || ($month == 6  && $day <= 21)) echo "Ваш знак зодиака: Близнецы";
        elseif (($month == 6  && $day >= 22) || ($month == 7  && $day <= 22)) echo "Ваш знак зодиака: Рак";
        elseif (($month == 7  && $day >= 23) || ($month == 8  && $day <= 23)) echo "Ваш знак зодиака: Лев";
        elseif (($month == 8  && $day >= 24) || ($month == 9  && $day <= 23)) echo "Ваш знак зодиака: Дева";
        elseif (($month == 9  && $day >= 24) || ($month == 10 && $day <= 23)) echo "Ваш знак зодиака: Весы";
        elseif (($month == 10 && $day >= 24) || ($month == 11 && $day <= 22)) echo "Ваш знак зодиака: Скорпион";
        elseif (($month == 11 && $day >= 23) || ($month == 12 && $day <= 22)) echo "Ваш знак зодиака: Стрелец";
        else echo "Ваш знак зодиака: Козерог";
    }
    ?>
</body>
</html>