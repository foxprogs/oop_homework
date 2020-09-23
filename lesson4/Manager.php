<?php

namespace Lesson4;

abstract class Papers
{
    //
}

abstract class Instrument
{
    //
}

class Notebook extends Papers
{
    //
}

class Hammer extends Instrument
{
    //
}

class Screwder extends Instrument
{
    //
}

class Window
{
    //
}

class Manager
{
    public function place($item)
    {
        if ($item instanceof Papers) {
            echo 'Положил ' . get_class($item) . ' на стол' . PHP_EOL;
        } elseif ($item instanceof Instrument) {
            echo 'Убрал ' . get_class($item) . ' внутрь стола' . PHP_EOL;
        } else {
            echo 'Выкинул ' . (is_object($item) ? get_class($item) : $item) . ' в корзину' . PHP_EOL;
        }
        return $this;
    }
}

$manager = new Manager();
echo '<pre>';
$manager->place(new Notebook())->place(new Window())->place('test')->place(new Hammer())->place(new Screwder());
