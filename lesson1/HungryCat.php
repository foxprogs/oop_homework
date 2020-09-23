<?php

namespace Ex2;

class HungryCat
{
    public $name;
    public $color;
    public $food;

    public function __construct(string $name, string $color, string $food)
    {
        $this->name = $name;
        $this->color = $color;
        $this->food = $food;
    }

    public function eat($food)
    {
        echo "Голодный кот {$this->name}, особые приметы: цвет - {$this->color}, съел {$food}";
        echo ($this->food == $food ? " и замурчал 'мррррр' от своей любимой еды" : '') . '<br>';
    }
}

$cat1 = new HungryCat('Борис', 'рыжий', 'вискас');
$cat2 = new HungryCat('Мурзик', 'белый', 'китикет');

$cat1->eat('мышь');
$cat1->eat('сало');
$cat1->eat('вискас');
$cat1->eat('огурцы');
$cat1->eat('шоколад');

echo '<br>';

$cat2->eat('торт');
$cat2->eat('китикет');
$cat2->eat('чизкейк');
$cat2->eat('чизбургер');
$cat2->eat('желе');
