<?php
class Publisher
{
    public static function getPublisherList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name, city_id FROM publisher ORDER BY name ASC');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCitiesList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name FROM city ORDER BY name');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deletePublisherById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM publisher WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updatePublisherById($id, $name, $cityId)
    {
        $db = Db::getConnection();
        $sql = "UPDATE publisher SET name = :name, city_id=:city_id WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':city_id', $cityId, PDO::PARAM_INT);
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

    public static function createPublisher($name, $cityId)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO publisher (name, city_id) VALUES (:name, :city_id)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':city_id', $cityId, PDO::PARAM_INT);
        return $result->execute();
    }

}
