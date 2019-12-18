<?php
abstract class AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if (User::isAdmin()) {
            return true;
        }
        die('Доступ заборонено!');
    }
}
