<?php

namespace Lesson3;

class Box
{
    public function putBall(Ball $ball)
    {
        echo 'В корзину добавлен мяч' . PHP_EOL;

    }
}

class Ball
{
    private static $count;

    public function __construct()
    {
        static::$count++;
    }

    public static function getCount()
    {
        echo 'Всего в корзине мячей: ' . static::$count;
    }
}

echo '<pre>';

$box = new Box();

for ($i = 0; $i < rand(1, 10) ; $i++) { 
    $box->putBall(new  Ball());
}

Ball::getCount();
