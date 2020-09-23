<?php

namespace Lesson2\BlackBox;

class BlackBox
{
    private $data;

    public function addLog($message)
    {
        $this->data[] = $message;
    }

    public function getDataByEngineer(Engineer $engineer)
    {
        return $this->data;
    }
}

class Plane
{
    private $blackBox;
    
    public function __construct()
    {
        $this->blackBox = new BlackBox();
    }

    public function flyAndCrush()
    {
        $this->flyProcess();
        $this->crushProcess();
    }

    protected function flyProcess()
    {
        $this->addLog('Полет нормальный');
    }

    private function crushProcess()
    {
        $this->addLog('Крушение!!!');
    }

    protected function addLog($message)
    {
        $this->blackBox->addLog(date("Y-m-d H:i:s") . ' - ' . $message);
    }

    public function getBoxForEngineer(Engineer $engineer)
    {
        $engineer->setBox($this->blackBox);
    }
}

class Engineer
{
    private $blackBox;

    public function setBox(BlackBox $blackBox)
    {
        $this->blackBox = $blackBox;
    }

    public function takeBox(Plane $plane)
    {
        $plane->getBoxForEngineer($this);
    }

    public function decodeBox()
    {
        echo '<pre>';
        print_r($this->blackBox->getDataByEngineer($this));
        echo '</pre>';
    }
}

class NewPlane extends Plane
{
    protected function flyProcess()
    {
        $this->addLog('В этот раз не упадем');
    }
}

$plane = new Plane();
$plane->flyAndCrush();

$engineer = new Engineer();
$engineer->takeBox($plane);

$engineer->decodeBox();

$newPlane = new NewPlane();
$newPlane->flyAndCrush();

$engineer->takeBox($newPlane);

$engineer->decodeBox();

/**
Черный ящик – Инкапсуляция

1. Создать классы:

    BlackBox — черный ящик, у него должно быть закрытое от всех свойство private $data;

    Plane — самолет, должен содержать закрытое свойство private $blackBox. В конструкторе это свойство должно быть проинициализировано новым классом BlackBox;

    Engineer — Инженер-дешифровщик черных ящиков.

Класс BlackBox содержит следующие методы:

    public function addLog($message) — добавляет очередную строку в свое свойство $data;

    public function getDataByEngineer(Engineer $engineer) — возвращает свои данные для инженера.

Класс Plane должен содержать методы:

public function flyAndCrush()
{
    $this->flyProcess();
    $this->crushProcess();
}, где flyProcess — процесс полета может иначе проходить для других самолетов, пишет лог в черный ящик, придумайте что будет записано в этом методе в черный ящик, а crushProcess — процесс крушения переопределен быть не может, пишет лог в черный ящик. Нужно придумать, что будет записано в этом методе в черный ящик;

    protected function addLog($message) — передает сообщение для записи в лог черного ящика;

    public function getBoxForEngineer(Engineer $engineer)
    {
    $engineer->setBox($this->blackBox);
        }

2. Реализовать класс Engineer:

    public function setBox(BlackBox $blackBox) — устанавливает черный ящик для дешифрации у инженера;

    public function takeBox(Plane $plane) — должен доставать черный ящик из самолета (нужно посмотреть, какой подходящий метод есть в классе Plane);

    public function decodeBox() — декодирует черный ящик — выводит на экран лог черного ящика.

3. Реализовать методы без изменения области видимости методов и свойств.

4. Создать самолет, устроить ему полет с крушением.

5. Создать инженера, взять черный ящик из упавшего самолета и дешифровать его.

6. Создать новый вид самолета (наследоваться следует от Plane). Самолет должен вести другой лог во время полета. Но, к сожалению, путь его тот же, что и для предыдущего самолета. Дешифровать и его лог.
*/
