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

class BirdFarm extends Farm
{
    public function showAnimalsCount()
    {
        echo "Птиц на ферме: " . count($this->animals) . '<br>';
    }

    public function addAnimal(Animal $animal)
    {
        parent::addAnimal($animal);
        $this->showAnimalsCount();
    }
}

class Farmer
{
    public function addAnimal(Farm $farm, Animal $animal)
    {
        $farm->addAnimal($animal);
    }

    public function rollCall(Farm $farm)
    {
        $farm->rollCall();
    }
}

abstract class Animal
{
    abstract public function say();
    abstract public function walk();
}

abstract class Birds extends Animal
{
    public function tryToFly()
    {
        return 'Вжих-вжих-топ-топ';
    }

    public function walk()
    {
        return $this->tryToFly();
    }
}

abstract class Ungulates extends Animal
{
    public function walk()
    {
        return 'Топ-топ';
    }
}

class Goose extends Birds
{
    public function say()
    {
        return 'Га-га-га';
    }
}

class Turkey extends Birds
{
    public function say()
    {
        return 'Кулдык-кулдык';
    }
}

class Horse extends Ungulates
{
    public function say()
    {
        return 'И-го-го';
    }
}

class Cow extends Ungulates
{
    public function say()
    {
        return 'Мууууу';
    }
}

Class Pig extends Ungulates
{
    public function say()
    {
        return 'Хрю-хрю';
    }
}

Class Chicken extends Birds
{
    public function say()
    {
        return 'Ко-ко-ко';
    }
}

$farmer = new Farmer();
$farm = new Farm();
$birdFarm = new BirdFarm();

$farmer->addAnimal($farm, new Cow());
$farmer->addAnimal($farm, new Pig());
$farmer->addAnimal($farm, new Pig());
$farmer->addAnimal($birdFarm, new Chicken());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($farm, new Horse());
$farmer->addAnimal($farm, new Horse());
$farmer->addAnimal($birdFarm, new Goose());

$farmer->rollCall($farm);
$farmer->rollCall($birdFarm);
