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

        if (isset($_POST['submit'])) {
            $author_id = $_POST['author_id'];

            $options['id'] = $_POST['book_id'];
            $options['name'] = $_POST['name'];
            $options['genre_id'] = $_POST['genre_id'];
            $options['publisher_id'] = $_POST['publisher_id'];
            $options['year'] = $_POST['year'];
            $options['pages'] = $_POST['page_count'];

            // $image_name = $_POST['image_name'];

            if (intval($options['year']) <= 1900 || intval($options['year']) > intval(date("Y"))) {
               $errors[] = 'Рік видання задано не корректно!';
            }

            if (intval($options['pages']) <= 0) {
               $errors[] = 'Кількість сторінок задано не корректно!';
            }

            if ($errors == false) {
                $id = Book::createBook($options);
                Book::addAuthor($id, $author_id);

                // if ($id) {
                //     if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                //         move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                //     }
                // };

                header("Location: /admin/book");
            }
        }

        require_once(ROOT . '/views/admin_book/create.php');
        return true;
    }


    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Получаем данные о конкретном заказе
        $product = Product::getProductById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            // Сохраняем изменения
            if (Product::updateProductById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Product::deleteProductById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }

}
