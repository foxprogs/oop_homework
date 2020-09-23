<?php

namespace Lesson3;

abstract class Animal
{
    abstract public function move();
}

abstract class Water extends Animal
{
    public function move()
    {
        echo 'плыву' . PHP_EOL;
    }
}

abstract class Ground extends Animal
{
    public function move()
    {
        echo 'хожу' . PHP_EOL;
    }
}

class Fish extends Water
{

}

class Dolphin extends Water
{

}

class Tiger extends Ground
{

}

class Bear extends Ground
{

}

class Elk extends Ground
{

}

class Chicken extends Ground
{

}

class Camel extends Ground
{

}

class Elephant extends Ground
{

}

class Snake extends Ground
{
    public function move()
    {
        echo 'ползаю' . PHP_EOL;
    }
}

$fish = new Fish();
$snake = new Snake();
$camel = new Camel();

echo '<pre>';
$fish->move();
$snake->move();
$camel->move();
