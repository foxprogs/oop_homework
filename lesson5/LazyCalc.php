<?php

namespace Lesson5;

class Method
{
    public static function sum($num1, $num2)
    {
        return $num1 + $num2;
    }

    public function sub($num1, $num2)
    {
        return $num1 - $num2;
    }
}

class Calculator
{

    public static function calculate($number1, $number2, $callback)
    {
        return $callback($number1, $number2);
    }
}

function mult($num1, $num2)
{
    return $num1 * $num2;
}

$division = function ($num1, $num2) {
    return $num1 / $num2;
};

$callbacks = [
    'Lesson5\mult',
    $division,
    ['Lesson5\Method', 'sum'],
    [new Method(), 'sub'],
];

echo '<pre>';

echo '5, 10' . PHP_EOL;
foreach ($callbacks as $callback) {
    echo Calculator::calculate(5, 10, $callback) . PHP_EOL;
}
echo PHP_EOL . '20, 2' . PHP_EOL;
foreach ($callbacks as $callback) {
    echo Calculator::calculate(20, 2, $callback) . PHP_EOL;
}
