<?php

class AdminPublisherController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $publisherList = Publisher::getPublisherList();
        require_once(ROOT . '/views/admin_publisher/index.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();
        $errors = false;
        $messages = false;
        $options = false;
        $publisherName = false;
        $cityId = false;
        $cities = Publisher::getCitiesList();

        if (isset($_POST['submit'])) {
            $publisherName = htmlspecialchars($_POST['publisher_name']);
            $cityId = htmlspecialchars($_POST['city_id']);

            if ($errors == false) {
                if (Publisher::createPublisher($publisherName, $cityId)) {
                    $messages[] = 'Видавництво успішно додано.';
                } else {
                    $errors[] = 'Помилка запиту до бази даних!';
                }
            }
        }
        require_once(ROOT . '/views/admin_publisher/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();
        $errors = false;
        $messages = false;
        $options = false;
        $cityId = false;
        $cities = Publisher::getCitiesList();
        $publisher = Publisher::getPublisherById($id);

        if (isset($_POST['submit'])) {
            $publisherName = htmlspecialchars($_POST['publisher_name']);
            $cityId = htmlspecialchars($_POST['city_id']);

            if ($errors == false) {
                if (Publisher::updatePublisherById($id, $publisherName, $cityId)) {
                    $messages[] = 'Видавництво успішно змінено.';
                } else {
                    $errors[] = 'Помилка запиту до бази даних!';
                }
            }
        }
        require_once(ROOT . '/views/admin_publisher/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();
        Publisher::deletePublisherById($id);
        header("Location: /admin/publisher");
        return true;
    }

}
