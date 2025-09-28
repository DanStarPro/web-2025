<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>FactNumb</title>
</head>
<body>
    <h2>Вычисление факториала числа</h2>
    <form method="GET">
        <input type="number" name="FactNumbInp" placeholder="Введите число" required>
        <button type="submit">Вычислить</button>
    </form>
    <hr>
    <?php
    if (isset($_GET["FactNumbInp"])) {
        
        $num = (int)$_GET["FactNumbInp"];
        if ($num < 0) {
            echo "Ошибка: факториал отрицательного числа не определён!";
            exit;
        }
        if ($num > 20) {
            echo "Ошибка: число слишком большое для вычисления факториала!";
            exit;
        }

        function FactCalc($FactVal, $ResVal):int {
            if ($FactVal != 1) {
                $ResVal = $ResVal * $FactVal;
                $FactVal= $FactVal - 1;
                $ResVal = FactCalc($FactVal, $ResVal);    
            }
            return $ResVal;
        }
        $FactVal = $_GET["FactNumbInp"];
        $ResVal = 1;
        echo "Факториал числа $FactVal = " . FactCalc($FactVal, $ResVal);
    }
    ?>
</body>
</html>