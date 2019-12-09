<?php

/**
 * Контроллер UserController
 */
class UserController
{
    public function actionRegister()
    {
        $name = false;
        $surname = false;
        $middle_name = false;
        $email = false;
        $password = false;
        $phone = false;
        $result = false;


        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $middle_name = $_POST['middle_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];

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
            if (!User::checkPassword($password)) {
                $errors[] = 'Некоректний пароль';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Задана електронна адреса вже використовується';
            }

            if ($errors == false) {
                $result = User::register($name, $surname, $middle_name, $phone, $email, $password);
            }
        }

        require_once(ROOT . '/views/user/register.php');
        return true;
    }

    public function actionLogin()
    {
        $email = false;
        $password = false;

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильна електрона адреса';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Некоректний пароль';
            }

            $userId = User::checkUserData($email, $password);
            $user_info = User::getUserById($userId);

            if ($userId == false) {
                $errors[] = 'Неправильна електронна адреса або пароль.';
            } else {
                User::auth($userId, $user_info['role_id']);
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }


    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        unset($_SESSION["user_role"]);
        header("Location: /");
    }

}
