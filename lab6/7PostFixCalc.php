<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Reverse Polish Notation</title>
</head>
<body>
    <h2>Калькулятор обратной польской записи</h2>
    <form method="GET">
        <input type="text" name="equation" placeholder="Введите выражение (например: 3 4 + 2 *)" style="width: 300px;">
        <button type="submit">Вычислить</button>
    </form>
    
    <?php
    if (isset($_GET["equation"]) && !empty($_GET["equation"])) {
        $equation = $_GET["equation"];
        function evaluatePostfixExpression($expression) {
            $res = [];
            $operandsAndOperators = explode(' ', $expression);
            foreach ($operandsAndOperators as $operandOrOperator) {
                if (is_numeric($operandOrOperator)) {
                    array_push($res, intval($operandOrOperator));
                } 
                else {
                    $operand2 = array_pop($res);
                    $operand1 = array_pop($res);
                    switch ($operandOrOperator) {
                        case "+":
                            array_push($res, $operand1 + $operand2);
                            break;
                        case "-":
                            array_push($res, $operand1 - $operand2);
                            break;
                        case "*":
                            array_push($res, $operand1 * $operand2);
                            break;
                        case "/":
                            if ($operand2 != 0) {
                                array_push($res, intdiv($operand1, $operand2));
                            }
                            else {
                                return "Ошибка ввода: на ноль делить нельзя!";
                            }
                            break;
                        default:
                            return "Ошибка ввода: " . $operandOrOperator . "!";
                    }
                }
            }
            if (sizeof($res) != 1) {
                return "Ошибка ввода: недостаточно операторов!";
            }
            return $res[0];
        }
        $result = evaluatePostfixExpression($equation);
        echo $result;
    }
    ?>
</body>
</html>