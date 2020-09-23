<?php

namespace Lesson5;

class User
{
    public function load($id)
    {
        if ($id < 1) {
            throw new \Exception('id не найден в базе');
        }
    }
    
    public function save($data)
    {
        return (bool) rand(0, 1);
    }
}

class UserFormValidator
{
    public function validate($post)
    {
        if (empty($post['name'])) {
            throw new \Exception('Имя пустое');
        }

        if (!filter_var($post['age'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 18]])) {
            throw new \Exception('Младше 18 лет');
        }

        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Ошибка почты');
        }

        return true;
    }
}

$success = false;
if (! empty($_POST)) {
    $user = new User();
    try {
        $user->load($_POST['id']);
        $success = (new UserFormValidator())->validate($_POST);
    } catch (\Exception $e) {
        $error = $e->getMessage();
    }

    if ($success && !$user->save($_POST)) {
        $success = false;
        $error = 'Ошибка сохранения';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <?php if (!$success) : ?>
        <p><?= $error ?? '' ?></p>
    <?php else : ?>
        <p>Сохранили</p>
    <?php endif ?>
    <form action="" method="post">
        <input type="text" name="id" value="<?= $_POST['id'] ?? rand(-10, 10) ?>"><br>
        <input type="text" name='name' placeholder="Имя" value="<?= $_POST['name'] ?? ''?>"> <br>
        <input type="text" name='age' placeholder="Возраст" value="<?= $_POST['age'] ?? ''?>"> <br>
        <input type="text" name='email' placeholder="Почта" value="<?= $_POST['email'] ?? ''?>"> <br>
        <input type="submit">        
    </form>
</body>
</html>
