<?php

namespace Lesson2\Domna;

class Forge
{
    public function burn($object)
    {
        $flame = $object->burn();
        echo $flame->render((string)$object) . '<br>' . PHP_EOL;
    }
}

class Smoke
{
    public function render($name)
    {
        return $name . " лишь задымилась";
    }
}

class BlueFlame
{
    public function render($name)
    {
        return $name . " горит синем пламенем";
    }
}

class RedFlame
{
    public function render($name)
    {
        return $name . " вспыхнула алым заревом";
    }
}

abstract class CanBurn
{
    abstract public function burn();
}

class Oxygen extends CanBurn
{
    public function burn()
    {
        return new BlueFlame();
    }

    public function __toString()
    {
        return 'Кислород';
    }
}

class Mars extends CanBurn
{
    public function burn()
    {
        return new RedFlame();
    }

    public function __toString()
    {
        return 'Планета Марс';
    }
}

class Yeast extends CanBurn
{
    public function burn()
    {
        return new BlueFlame();
    }

    public function __toString()
    {
        return 'Дрожжи';
    }
}

class Guitar extends CanBurn
{
    public function burn()
    {
        return new Smoke();
    }

    public function __toString()
    {
        return 'Гитара';
    }
}

class Carrot extends CanBurn
{
    public function burn()
    {
        return new RedFlame();
    }

    public function __toString()
    {
        return 'Морковь';
    }
}

$forge = new Forge();

$guitar = new Guitar();
$carrot = new Carrot();
$yeast = new Yeast();
$mars  = new Mars();
$oxygen = new Oxygen();

$forge->burn($guitar);
$forge->burn($carrot);
$forge->burn($yeast);
$forge->burn($mars);
$forge->burn($oxygen);
