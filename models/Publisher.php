<?php


class Publisher
{
    public static function getPublisherList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name FROM publisher ORDER BY name ASC');
        return $result->fetchAll();
    }

    public static function deletePublisherById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM publisher WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updatePublisherById($id, $name)
    {
        $db = Db::getConnection();
        $sql = "UPDATE publisher SET name = :name WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getPublisherById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM publisher WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function createPublisher($name)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO publisher (name) VALUES (:name)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
    }

}
