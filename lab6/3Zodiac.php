<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Zodiac</title>
</head>
<body>
    <form method="GET">
        <label>Введите дату (ДД.ММ.ГГГГ):
            <input type="text" name="DateInp" placeholder="01.02.1993" required>
        </label>
        <button type="submit">Определить знак</button>
    </form>

    <?php 
    if (isset($_GET["DateInp"])) {
        $DateData = $_GET["DateInp"];
        $DateArr = explode(".", $DateData);

        if (count($DateArr) == 3) {
            $day = (int)$DateArr[0];
            $month = (int)$DateArr[1];
            $year = (int)$DateArr[2];

            if (checkdate($month, $day, $year)) {
                if (($month == 1  && $day >= 21) || ($month == 2  && $day <= 19)) echo "Водолей";
                elseif (($month == 2  && $day >= 20) || ($month == 3  && $day <= 20)) echo "Рыбы";
                elseif (($month == 3  && $day >= 21) || ($month == 4  && $day <= 20)) echo "Овен";
                elseif (($month == 4  && $day >= 21) || ($month == 5  && $day <= 21)) echo "Телец";
                elseif (($month == 5  && $day >= 22) || ($month == 6  && $day <= 21)) echo "Близнецы";
                elseif (($month == 6  && $day >= 22) || ($month == 7  && $day <= 22)) echo "Рак";
                elseif (($month == 7  && $day >= 23) || ($month == 8  && $day <= 23)) echo "Лев";
                elseif (($month == 8  && $day >= 24) || ($month == 9  && $day <= 23)) echo "Дева";
                elseif (($month == 9  && $day >= 24) || ($month == 10 && $day <= 23)) echo "Весы";
                elseif (($month == 10 && $day >= 24) || ($month == 11 && $day <= 22)) echo "Скорпион";
                elseif (($month == 11 && $day >= 23) || ($month == 12 && $day <= 22)) echo "Стрелец";
                else echo "Козерог"; 
            } else {
                echo "Ошибка: такой даты не существует!";
            }
        } else {
            echo "Ошибка: введите дату в формате ДД.ММ.ГГГГ";
        }
    }
    ?>
</body>
</html>