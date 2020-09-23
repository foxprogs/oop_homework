<?php

namespace Ex3;

class ToyFactory
{
    public function createToy(string $name)
    {
        return new Toy($name, rand(200, 500));
    }
}

class Toy
{
    public $name;
    public $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

$factory = new ToyFactory();
$names = ['Самолет', 'Кенгуру', 'Машина', 'Панда', 'Поезд', 'Заяц', ];

for ($i = 0; $i < rand(5, 20); $i++) {
    $toys[] = $factory->createToy($names[rand(0, count($names) - 1)]);
}

$total = 0;
foreach ($toys as $toy) {
    echo $toy->name . ' - ' . $toy->price . '<br>';
    $total += $toy->price;
}
echo 'Итого - ' . $total;
