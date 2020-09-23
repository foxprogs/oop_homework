<?php

namespace Lesson4;

interface Renderable
{
    public function render($string);
}

interface Formatter
{
    public function format($string);
}

class Display
{
    public static function show($formatter, $string)
    {
        if ($formatter instanceof Renderable) {
            return $formatter->render($string);
        } elseif ($formatter instanceof Formatter) {
            return $formatter->format($string);
        } elseif (method_exists($formatter, 'format')) {
            return $formatter->format($string);
        } else {
            return $string;
        }
    }
}

class FillZero implements Formatter
{
    public function format($string)
    {
        return '000' . $string . '000';
    }
}

class Uppercase implements Renderable
{
    public function render($string)
    {
        return '*' . strtoupper($string) . '*';
    }
}

class ReplaceA
{
    public function format($string)
    {
        return str_replace('a', 'AAA', $string);
    }
}

class EmptyClass
{
    //
}

$strings = ['testcase', 'active', 'All', 'clock'];
$objects = [new ReplaceA(), new EmptyClass(), new Uppercase(), new FillZero()];

echo '<pre>';

foreach ($strings as $string) {
    echo  PHP_EOL . 'Строка: ' . $string . PHP_EOL;
    foreach ($objects as $object) {
        echo Display::show($object, $string) . PHP_EOL;
    }
}
