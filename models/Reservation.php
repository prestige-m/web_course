<?php
class Reservation
{
    public static function save($userId, $books)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO book_reservation (customer_id, books) '
                .'VALUES (:user_id, :books)';

        $books = json_encode($books);

        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':books', $books, PDO::PARAM_STR);

        return $result->execute();
    }
    public static function getReservationList()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT book_reservation.id, customer.name, customer.surname,
						customer.phone, customer_id, books, order_date FROM book_reservation
						INNER JOIN customer ON customer_id = customer.id ORDER BY id DESC");

        return $result->fetchAll();
    }
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Нове бронювання';
                break;
            case '0':
                return 'Закрито';
                break;
        }
    }
    public static function getReservationById($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT book_reservation.id as res_id, customer.name, customer.surname,
				customer.phone, customer_id, books, order_date FROM book_reservation
				INNER JOIN customer ON customer_id = customer.id WHERE book_reservation.id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    public static function getReservationByUserId($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT book_reservation.id as res_id, customer.name, customer.surname,
				customer.phone, customer_id, books, order_date FROM book_reservation
				INNER JOIN customer ON customer_id = customer.id WHERE customer.id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetchAll();
    }
    public static function getLastId()
    {
        $db = Db::getConnection();
        $sql = "SELECT MAX(id) as last_id FROM book_reservation";
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return intval($result->fetch()['last_id']);
    }

    public static function deleteReservationById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM book_reservation WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateReservationById($id, $date, $status)
    {
        $db = Db::getConnection();

        $sql = "UPDATE book_reservation
            SET
                order_date = :date,
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
}
