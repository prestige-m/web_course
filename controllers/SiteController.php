<?php

class SiteController
{
    public function actionIndex($page = 1)
    {
        $genres = Genre::getGenreList();
        $latestBooks = Book::getLatestBooks($page);
        $count = Book::getCount();

        $pagination = new Pagination($count, $page, Book::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionAbout()
    {
        require_once(ROOT . '/views/site/about.php');
        return true;
    }
}
