<?php
class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $orderItems = Reservation::getReservationByUserId($userId);

        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $name = false;
        $surname = false;
        $middle_name = false;
        $email = false;
        $phone = false;
        $messages = false;

        if (isset($_POST['submit'])) {

            $name = htmlspecialchars($_POST['name']);
            $surname = htmlspecialchars($_POST['surname']);
            $middle_name = htmlspecialchars($_POST['middle_name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Значення поля "Ім’я" має бути більше, ніж 2 символи';
            }
            if (!User::checkName($surname)) {
                $errors[] = 'Значення поля "Прізвище" має бути більше, ніж 2 символи';
            }
            if (!User::checkName($middle_name)) {
                $errors[] = 'Значення поля "По батькові" має бути більше, ніж 2 символи';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильна електрона адреса';
            }
            if ($errors == false) {
                if (User::edit($userId, $name, $surname, $middle_name, $phone, $email)) {
                    $messages[] = 'Ваші дані успішно змінені.';
                }
            }
        }
        unset($_SESSION['errors']);
        $_SESSION['errors'] = $errors;
        unset($_SESSION['messages']);
        $_SESSION['messages'] = $messages;

        header("Location: /cabinet/");
        return true;
    }

    public function actionChange()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $errors = false;
        $messages = false;

        $photoFolder = ROOT . '/template/images/user/';
        $fileType = explode('.', $_FILES['photo']['name'])[1];
        $photoName = 'user' . $userId . '_avatar.' . $fileType;
        $uploadFile = $photoFolder . $photoName;
        $types = array('gif', 'png', 'jpeg', 'jpg', 'bmp');

        if (in_array($fileType, $types))
        {
            if ($_FILES['photo']['size'] <= 5 * 1024 * 1024)
            {
                copy($_FILES['photo']['tmp_name'], $uploadFile);
                if (User::updatePhotoById($userId, $photoName)) {
                    $messages[] = 'Зображення успішно змінено.';
                }
            }
            else
            {
                $errors[] = "Зображення має бути розміром не більше 5 Мб!";
            }
        }
        else
        {
            $errors[] = "Файл не відповідає типам (jpg, jpeg, png, gif, bmp)!";
        }

        unset($_SESSION['errors']);
        $_SESSION['errors'] = $errors;
        unset($_SESSION['messages']);
        $_SESSION['messages'] = $messages;

        header("Location: /cabinet/");
        return true;
    }

    public function actionPasschange()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $password = false;
        $pass_repeat = false;
        $errors = false;
        $messages = false;

        if (isset($_POST['submit'])) {

            $password = $_POST['pass'];
            $pass_repeat = $_POST['pass_repeat'];

            if ($password != $pass_repeat) {
                $errors[] = 'Паролі не співпадають!';
            }
            if ($errors == false) {
                if (User::updatePassword($userId, $password)) {
                    $messages[] = 'Пароль успішно змінено.';
                }
            }
        }

        unset($_SESSION['errors']);
        $_SESSION['errors'] = $errors;
        unset($_SESSION['messages']);
        $_SESSION['messages'] = $messages;

        header("Location: /cabinet/");
        return true;
    }

    public function actionBookList()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $order_id = 0;
        if(isset($_SESSION['order_id'])) {
          $order_id = $_SESSION['order_id'];
          $orderItems = Reservation::getReservationById($order_id);
          $items = json_decode($orderItems['books'], true);
        }

        require_once(ROOT . '/views/cabinet/book_list.php');
        return true;
    }
    public function actionBookOrder()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $orderItems = false;
        $items = false;

        $order_id = 0;
        if(isset($_POST['order_id'])) {
           $order_id = htmlspecialchars($_POST['order_id']);

           $orderItems = Reservation::getReservationById($order_id);
           $items = json_decode($orderItems['books'], true);
        }

        require_once(ROOT . '/views/cabinet/book_list.php');
        return true;
    }

    public function actionDelete()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $errors = false;
        $messages = false;

        $order_id = 0;
        if(isset($_SESSION['order_id'])) {
          $order_id = $_SESSION['order_id'];
          Reservation::deleteReservationById($order_id);
          unset($_SESSION['order_id']);
          $messages[] = "Успішно видалено.";
        }
        unset($_SESSION['messages']);
        $_SESSION['messages'] = $messages;
        require_once(ROOT . '/views/cabinet/book_list.php');
        return true;
    }

}
