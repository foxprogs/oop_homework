<?php

namespace Lesson3;

class Cat
{
    public $name;
    public $color;
    public $age;

    public function __construct(string $name, string $color, int $age)
    {
        list($this->name, $this->color, $this->age) = [$name, $color, $age];
    }
}

class CatFactory
{
    public static function createBlack8YearsOldCat($name)
    {
        return new Cat($name, "black", 8);
    }

    public static function createBoris3YearsOldCat($color)
    {
        return new Cat('Boris', $color, 3);
    }

    public static function createVasyaRedCat($age)
    {
        return new Cat('Vasya', "red", $age);
    }

    public static function create5YearsOldCat($name, $color)
    {
        return new Cat($name, $color, 5);
    }

    public static function createWhiteCat($name, $age)
    {
        return new Cat($name, "white", $age);
    }

    public static function createTomCat($color, $age)
    {
        return new Cat('Tom', $color, $age);
    }
    
    public static function createJerryGreen6YearsOldCat()
    {
        return new Cat('Jerry', "green", 6);
    }
}

$cats = [
    CatFactory::createBlack8YearsOldCat('Jack'),
    CatFactory::createBoris3YearsOldCat('white'),
    CatFactory::createVasyaRedCat(2),
    CatFactory::create5YearsOldCat('Alex', 'green'),
    CatFactory::createWhiteCat('Bob', 5),
    CatFactory::createTomCat('black', 6),
    CatFactory::createJerryGreen6YearsOldCat(),
];
echo '<pre>';
print_r($cats);
