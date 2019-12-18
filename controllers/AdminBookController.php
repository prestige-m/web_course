<?php

class AdminBookController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $bookList = Book::getBookList();
        require_once(ROOT . '/views/admin_book/index.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();
        $genres = Genre::getGenreList();
        $publisherList = Publisher::getPublisherList();
        $authorList = Author::getAuthorList();
        $errors = false;
        $messages = false;
        $options = false;

        if (isset($_POST['submit'])) {
            $author_id = htmlspecialchars($_POST['author_id']);
            $options['id'] = htmlspecialchars($_POST['book_id']);
            $options['name'] = htmlspecialchars($_POST['name']);
            $options['genre_id'] = htmlspecialchars($_POST['genre_id']);
            $options['publisher_id'] = htmlspecialchars($_POST['publisher_id']);
            $options['year'] = htmlspecialchars($_POST['year']);
            $options['pages'] = htmlspecialchars($_POST['page_count']);

            if (Book::checkBookIdExists($options['id'])) {
               $errors[] = 'Книга з заданим кодом вже існує!';
            }
            if (intval($options['year']) < 1000 || intval($options['year']) > intval(date("Y"))) {
               $errors[] = 'Рік видання задано не корректно!';
            }
            if (intval($options['pages']) <= 0) {
               $errors[] = 'Кількість сторінок задано не корректно!';
            }

            $fileName = NULL;
            if (isset($_FILES['img_file']) && $_FILES['img_file']['error'] == 0) {
                $photoFolder = ROOT . '/template/images/books/';
                $fileType = explode('.', $_FILES['img_file']['name'])[1];
                $fileName = $options['id'] . '.' . $fileType;
                $uploadFile = $photoFolder . $fileName;
                $types = ['gif', 'png', 'jpeg', 'jpg', 'bmp'];
                if (in_array($fileType, $types))
                {
                    if ($_FILES['img_file']['size'] <= 5 * 1024 * 1024)
                    {
                        copy($_FILES['img_file']['tmp_name'], $uploadFile);
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
            }

            if ($errors == false) {
                $id = Book::createBook($options);
                if ($id) {
                    if (!is_null($fileName)) {
                        Book::changeImageById($id, $fileName);
                    }
                    if (Book::addAuthor($id, $author_id)) {
                        $messages[] = 'Книгу успішно додано.';
                    } else {
                        $errors[] = 'Помилка запиту до бази даних!';
                    }
                }
            }
        }

        require_once(ROOT . '/views/admin_book/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();
        $book = Book::getBookById($id);
        $genres = Genre::getGenreList();
        $publisherList = Publisher::getPublisherList();
        $authorList = Author::getAuthorList();
        $errors = false;
        $messages = false;
        $options = false;

        if (isset($_POST['submit'])) {
            $author_id = htmlspecialchars($_POST['author_id']);
            $options['name'] = htmlspecialchars($_POST['name']);
            $options['genre_id'] = htmlspecialchars($_POST['genre_id']);
            $options['publisher_id'] = htmlspecialchars($_POST['publisher_id']);
            $options['year'] = htmlspecialchars($_POST['year']);
            $options['pages'] = htmlspecialchars($_POST['page_count']);

            if (intval($options['year']) < 1000 || intval($options['year']) > intval(date("Y"))) {
               $errors[] = 'Рік видання задано не корректно!';
            }
            if (intval($options['pages']) <= 0) {
               $errors[] = 'Кількість сторінок задано не корректно!';
            }

            $fileName = NULL;
            if (isset($_FILES["img_file"]) && $_FILES['img_file']['error'] == 0) {
                $photoFolder = ROOT . '/template/images/books/';
                $fileType = explode('.', $_FILES['img_file']['name'])[1];
                $fileName = $id . '.' . $fileType;
                $uploadFile = $photoFolder . $fileName;
                $types = ['gif', 'png', 'jpeg', 'jpg', 'bmp'];
                if (in_array($fileType, $types))
                {
                    if ($_FILES['img_file']['size'] <= 5 * 1024 * 1024)
                    {
                        copy($_FILES['img_file']['tmp_name'], $uploadFile);
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
            }

            if ($errors == false) {
                $result = Book::updateBookById($id, $options);
                if ($result) {
                    if (!is_null($fileName)) {
                        Book::changeImageById($id, $fileName);
                    }
                    if (Book::changeAuthor($id, $author_id)) {
                        $messages[] = 'Дані книги успішно змінено.';
                    } else {
                        $errors[] = 'Помилка запиту до бази даних!';
                    }
                }
            }
        }
        require_once(ROOT . '/views/admin_book/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();
        Book::deleteBookById($id);
        header("Location: /admin/book");
        return true;
    }
}
