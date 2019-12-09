<?php


class User
{
    public static function register($name, $surname, $middle_name, $phone, $email, $password)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO customer (email, password, name, surname, middle_name, phone) '
                . 'VALUES (:email, :password, :name, :surname, :middle_name, :phone)';

        $hashPassword = md5($password);

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $hashPassword, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':middle_name', $middle_name, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function updatePhotoById($id, $photoName)
    {
        $db = Db::getConnection();
        $response = false;
        $sql = "UPDATE customer SET photo = :photo_name WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':photo_name', $photoName, PDO::PARAM_STR);
        $response = $result->execute();
        return $response;
    }

    public static function updatePassword($id, $newPassword)
    {
        $db = Db::getConnection();
        $response = false;
        $sql = "UPDATE customer SET password = :password WHERE id = :id";

        $hashPassword = md5($newPassword);

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':password', $hashPassword, PDO::PARAM_STR);
        $response = $result->execute();
        return $response;
    }

    public static function edit($id, $name, $surname, $middle_name, $phone, $email)
    {
        $db = Db::getConnection();
        $response = false;
        $sql = "UPDATE customer
            SET email = :email, name = :name, surname = :surname,
            middle_name = :middle_name, phone = :phone
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':middle_name', $middle_name, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $response = $result->execute();
        return $response;
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM customer WHERE email = :email AND password = :password';

        $hashPassword = md5($password);
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $hashPassword, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;
    }


    public static function auth($userId, $userRole)
    {
        $_SESSION['user'] = $userId;
        $_SESSION['user_role'] = $userRole;
    }


    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function isAdmin()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['user_role'])
            && $_SESSION['user_role'] == 1) {
            return true;
        }
        return false;
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 3) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM customer WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function getUserById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM customer WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

}
