<?php

namespace Ex4;

class User
{
    private $name;
    private $email;
    private $gender;
    private $age;
    private $phone;

    public function __construct($name, $email, $age = null, $phone = null, $gender = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->age = $age;
        $this->phone = $phone;
    }

    public function notifyOnEmail($message)
    {
        return $this->send($this->email, $message);
    }

    public function notifyOnPhone($message)
    {
        return $this->send($this->phone, $message);
    }

    public function notify($message)
    {
        if (empty($this->age) || $this->age < 18) {
            $message = $this->censor($message);
        }
        $this->notifyOnEmail($message);
        $this->phone ? $this->notifyOnPhone($message) : false ;
    }

    private function censor($message)
    {
        return "*censor*" . $message . "*censor*";
    }

    private function send($chanel, $message)
    {
        echo "Уведомление клиенту: {$this->name} на {$chanel}: {$message}<br>";
    }
}

// $user1 = new User('Иван Иванович', 'ivan@mail.ru');
// $user2 = new User('Петр Петрович', 'peter@mail.ru', 22, '+7 707 367 37 67');

// $user1->notify("Проверка сообщения 1");
// $user2->notify("Еще одна проверка сообщения");
