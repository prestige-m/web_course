<?php


class Genre
{

    public static function getGenreList()
    {

        $db = Db::getConnection();
        $result = $db->query('SELECT id, name FROM genre ORDER BY name ASC');

        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }

    public static function deleteGenreById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM genre WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    public static function updateGenreById($id, $name)
    {
        $db = Db::getConnection();

        $sql = "UPDATE genre
            SET
                name = :name,
            WHERE id = :id";


        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function getGenreById($id)
    {

        $db = Db::getConnection();
        $sql = 'SELECT * FROM genre WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }


    public static function createGenre($name, $sortOrder, $status)
    {

        $db = Db::getConnection();
        $sql = 'INSERT INTO genre (name) '
                . 'VALUES (:name)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
    }

}
