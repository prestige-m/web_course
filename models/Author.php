<?php

class Author
{
    public static function getAuthorList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name, surname, middle_name FROM author ORDER BY name ASC');
        return $result->fetchAll();
    }

    public static function deleteAuthorById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM author WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateAuthorById($id, $name, $surname, $middle_name)
    {
        $db = Db::getConnection();
        $sql = "UPDATE publisher SET name = :name, surname = :surname,
         middle_name = :middle_name WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':middle_name', $middle_name, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getAuthorById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM author WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function createAuthor($name, $surname, $middle_name)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO author (name, surname, middle_name)
                VALUES (:name, :surname, :middle_name)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':middle_name', $middle_name, PDO::PARAM_STR);
        return $result->execute();
    }

}
