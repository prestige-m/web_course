<?php

class Book
{
    const SHOW_BY_DEFAULT = 6;

    public static function getLatestBooks($page = 1)
    {
        $limit = Book::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();
        $sql = 'SELECT book.id, book.name, author.name as author_name, author.surname as author_surname, author.middle_name as author_midname, '
                  .'genre.name as genre_name, publisher.name as publisher_name, year, pages, price, amount FROM book '
                  .'INNER JOIN genre ON genre.id = book.genre_id '
                  .'INNER JOIN publisher ON publisher.id = book.publisher_id '
                  .'INNER JOIN book_author ON book_author.book_id = book.id '
                  .'INNER JOIN author ON book_author.author_id = author.id '
                  .'ORDER BY book.id DESC LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetchAll();
    }

    public static function getBookListByGenre($genreId, $page = 1)
    {
        $limit = Book::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();
        $sql = 'SELECT book.id, book.name, author.name as author_name, author.surname as author_surname, author.middle_name as author_midname,'
                  .'genre.name as genre_name, genre_id, publisher.name as publisher_name, year, pages, price, amount FROM book '
                  .'INNER JOIN genre ON genre.id = book.genre_id '
                  .'INNER JOIN publisher ON publisher.id = book.publisher_id '
                  .'INNER JOIN book_author ON book_author.book_id = book.id '
                  .'INNER JOIN author ON book_author.author_id = author.id '
                  ."WHERE book.genre_id = :genre_id "
                  ."ORDER BY book.id ASC LIMIT :limit OFFSET :offset";

        $result = $db->prepare($sql);
        $result->bindParam(':genre_id', $genreId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchAll();
    }

    public static function getBookById($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT book.id, book.name, author.name as author_name, author.surname as author_surname, author.middle_name as author_midname,
                  genre.name as genre_name, genre.id as genre_id, publisher.id as publisher_id, author.id as author_id,
                  publisher.name as publisher_name, year, pages, price, amount FROM book
                  INNER JOIN genre ON genre.id = book.genre_id
                  INNER JOIN publisher ON publisher.id = book.publisher_id
                  INNER JOIN book_author ON book_author.book_id = book.id
                  INNER JOIN author ON book_author.author_id = author.id
                  WHERE book.id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function getTotalBooksInCategory($genreId)
    {
        $db = Db::getConnection();
        $sql = 'SELECT count(id) AS count FROM book WHERE genre_id = :genre_id';

        $result = $db->prepare($sql);
        $result->bindParam(':genre_id', $genreId, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getCount()
    {
        $db = Db::getConnection();
        $sql = 'SELECT count(*) AS count FROM book';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getBooksByIds($idsArray)
    {
        $db = Db::getConnection();
        $stringId = "'". implode("','", $idsArray). "'";
        $sql = 'SELECT book.id, book.name, author.name as author_name, author.surname as author_surname, author.middle_name as author_midname,'
                  .'genre.name as genre_name, genre.id as genre_id, publisher.id as publisher_id, author.id as author_id,'
                  .'publisher.name as publisher_name, year, pages, price, amount FROM book '
                  .'INNER JOIN genre ON genre.id = book.genre_id '
                  .'INNER JOIN publisher ON publisher.id = book.publisher_id '
                  .'INNER JOIN book_author ON book_author.book_id = book.id '
                  .'INNER JOIN author ON book_author.author_id = author.id '
                  .'WHERE book.id IN (' . $stringId . ')';
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }

    public static function getBookList()
    {
      $db = Db::getConnection();
      $sql = 'SELECT book.id, book.name, author.name as author_name, author.surname as author_surname, author.middle_name as author_midname,'
                .'genre.name as genre_name, publisher.name as publisher_name, year, pages, price, amount FROM book '
                .'INNER JOIN genre ON genre.id = book.genre_id '
                .'INNER JOIN publisher ON publisher.id = book.publisher_id '
                .'INNER JOIN book_author ON book_author.book_id = book.id '
                .'INNER JOIN author ON book_author.author_id = author.id '
                .'ORDER BY id ASC';

      $result = $db->prepare($sql);
      $result->setFetchMode(PDO::FETCH_ASSOC);
      $result->execute();
      return $result->fetchAll();
    }


    public static function deleteBookById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM book WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function updateBookById($id, $options)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE book SET name=:name, genre_id=:genre_id, publisher_id=:publisher_id, '
                .'year=:year, pages=:pages '
                .'WHERE id=:id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':genre_id', $options['genre_id'], PDO::PARAM_INT);
        $result->bindParam(':publisher_id', $options['publisher_id'], PDO::PARAM_INT);
        $result->bindParam(':year', $options['year'], PDO::PARAM_INT);
        $result->bindParam(':pages', $options['pages'], PDO::PARAM_INT);
        return $result->execute();
    }


    public static function createBook($options)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO book (id, name, genre_id, publisher_id, year, pages)'
                .' VALUES (:id, :name, :genre_id, :publisher_id, :year, :pages)';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $options['id'], PDO::PARAM_STR);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':genre_id', $options['genre_id'], PDO::PARAM_INT);
        $result->bindParam(':publisher_id', $options['publisher_id'], PDO::PARAM_INT);
        $result->bindParam(':year', $options['year'], PDO::PARAM_INT);
        $result->bindParam(':pages', $options['pages'], PDO::PARAM_INT);
        if ($result->execute()) {
            // return $db->lastInsertId();
            return $options['id'];
        }
        return 0;
    }

    public static function getImageNameById($id) {
        $db = Db::getConnection();
        $sql = 'SELECT image_name FROM book WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch()['image_name'];
    }

    public static function addAuthor($book_id, $author_id) {
        $db = Db::getConnection();
        $sql = "INSERT INTO book_author (book_id, author_id) VALUES (:book_id, :author_id)";
        $result = $db->prepare($sql);
        $result->bindParam(':book_id', $book_id, PDO::PARAM_STR);
        $result->bindParam(':author_id', $author_id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function changeAuthor($book_id, $author_id) {
        $db = Db::getConnection();
        $sql = "UPDATE book_author SET author_id=:author_id WHERE book_id=:book_id";
        $result = $db->prepare($sql);
        $result->bindParam(':author_id', $author_id, PDO::PARAM_INT);
        $result->bindParam(':book_id', $book_id, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function checkBookIdExists($bookId)
    {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM book WHERE id = :book_id';
        $result = $db->prepare($sql);
        $result->bindParam(':book_id', $bookId, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function changeImageById($id, $imageName)
    {
        $db = Db::getConnection();
        $sql = "UPDATE book SET image_name=:img_name WHERE id=:id";
        $result = $db->prepare($sql);
        $result->bindParam(':img_name', $imageName, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getImage($id)
    {
        $noImage = 'no-image.png';
        $path = '/template/images/books/';
        $imageName = self::getImageNameById($id);

        $imagePath = $path . $imageName;
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$imagePath)) {
            return $imagePath;
        }

        return $path . $noImage;
    }

}
