<?php

namespace Ex5;

class Order
{
    private $basket;

    public function __construct(Backet $basket)
    {
        $this->basket = $basket;
    }

    public function getBasket()
    {
        return $this->basket->describe();
    }
    
    public function getPrice()
    {
        return $this->basket->getPrice();
    }
}

class Backet
{
    private $cart = [];

    public function addProduct(Product $product, int $quantity)
    {
        $this->cart[] = ['product' => $product, 'quantity' => $quantity];
    }
    
    public function getPrice()
    {
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }
    
    public function describe()
    {
        $text = '';
        foreach ($this->cart as $position) {
            $text .= "{$position['product']->getName()} — {$position['product']->getPrice()} — {$position['quantity']}<br>";
        }
        return $text;
    }
}

class Product
{
    private $name;
    private $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

$basket = new Backet();

$basket->addProduct(new Product('рыба', 300), 3);
$basket->addProduct(new Product('яйцо', 120), 10);
$basket->addProduct(new Product('хлеб', 40), 1);
$basket->addProduct(new Product('шоколад', 180), 1);
$basket->addProduct(new Product('курица', 220), 2);

$order = new Order($basket);

// echo $order->getBasket();
// echo $order->getPrice();

include $_SERVER['DOCUMENT_ROOT'] . '/Lesson1/Notify.php';

$user = new \Ex4\User('Николай Николаевич', 'nikolya@mail.ru');
$user->notify("для вас создан заказ, на сумму: {$order->getPrice()}. Состав: <br>{$order->getBasket()}");
