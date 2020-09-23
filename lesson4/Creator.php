<?php

namespace Lesson4;

class Creator
{
    public static function create($name)
    {
        if (class_exists(__NAMESPACE__ . '\\' . $name)) {
            $className = __NAMESPACE__ . '\\' . ucfirst($name);
            $newClass = new $className($name);
            if ($newClass instanceof Item) {
                return $newClass;
            }
        }
        return new EmptyItem($name);
    }
}

class EmptyItem extends Item
{
    public function show()
    {
        echo 'Класс ' . $this->name . ' не найден' . PHP_EOL;
    }
}

abstract class Item
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function show()
    {
        echo 'Я ' . $this->name . PHP_EOL;
    }
}

class Cat extends Item
{
    //
}

class Dog extends Item
{
    //
}

class Table extends Item
{
    //
}

class Spoon extends Item
{
    //
}

class Bug extends Item
{
    //
}

$objects = ['cat', 'dog', 'camel', 'spoon', 'char', 'girl', 'creator', 'bug', 'table', 'code'];

echo '<pre>';

foreach ($objects as $item) {
    Creator::create($item)->show();
}
