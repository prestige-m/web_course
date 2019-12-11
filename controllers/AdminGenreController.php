<?php

class AdminGenreController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $genreList = Genre::getGenreList();
        require_once(ROOT . '/views/admin_genre/index.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();
        $errors = false;
        $messages = false;
        $options = false;
        $genreName = false;

        if (isset($_POST['submit'])) {
            $genreName = htmlspecialchars($_POST['genre_name']);
            if ($errors == false) {
                if (Genre::createGenre($genreName)) {
                    $messages[] = 'Жанр успішно додано.';
                } else {
                    $errors[] = 'Помилка запиту до бази даних!';
                }
            }
        }
        require_once(ROOT . '/views/admin_genre/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();
        $errors = false;
        $messages = false;
        $options = false;
        $genre = Genre::getGenreById($id);

        if (isset($_POST['submit'])) {
            $genreName = htmlspecialchars($_POST['genre_name']);
            if ($errors == false) {
                if (Genre::updateGenreById($id, $genreName)) {
                    $messages[] = 'Жанр успішно змінено.';
                } else {
                    $errors[] = 'Помилка запиту до бази даних!';
                }
            }
        }
        require_once(ROOT . '/views/admin_genre/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();
        Genre::deleteGenreById($id);
        header("Location: /admin/genre");
        return true;
    }

}
