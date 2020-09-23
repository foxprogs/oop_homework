<?php

namespace Lesson2\Farm;

class Farm
{
    public $animals = [];

    public function addAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
        echo $animal->walk() . '<br>';
    }

    public function rollCall()
    {
        shuffle($this->animals);
        foreach ($this->animals as $animal) {
            echo $animal->say() . '<br>';
        }
    }
}

abstract class Animal
{
    abstract public function say();

    public function walk()
    {
        return 'топ-топ';
    }
}

class Cow extends Animal
{
    public function say()
    {
        return 'Мууууу';
    }
}

Class Pig extends Animal
{
    public function say()
    {
        return 'Хрю-хрю';
    }
}

Class Chicken extends Animal
{
    public function say()
    {
        return 'Ко-ко-ко';
    }
}

$farm = new Farm();

$farm->addAnimal(new Cow());
$farm->addAnimal(new Chicken());
$farm->addAnimal(new Chicken());
$farm->addAnimal(new Pig());

$farm->rollCall();
