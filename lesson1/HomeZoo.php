<?php

namespace Ex1;

class Dog
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class Cat
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class Fish
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

$cat1 = new Cat('Мурзик');
$cat2 = new Cat('Тишка');
$cat3 = new Cat('Борис');

$dog1 = new Dog('Полкан');
$dog2 = new Dog('Бим');
$dog3 = new Dog('Рекс');
$dog4 = new Dog('Мухтар');
$dog5 = new Dog('Антошка');

$fish1 = new Fish('буль-1');
$fish2 = new Fish('буль-2');
