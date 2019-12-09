<?php


class CartController
{

    public function actionAdd($id)
    {
        Cart::addBook($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionAddAjax($id)
    {
        echo Cart::addBook($id);
        return true;
    }

    public function actionDelete($id)
    {
        Cart::deleteBook($id);
        header("Location: /cart");
    }

    public function actionClear()
    {
        Cart::clear();
        header("Location: /cart");
    }

    public function actionIndex()
    {
        $genres = Genre::getGenreList();
        $cartItems = Cart::getBooks();

        if ($cartItems) {
            $itemsId = array_keys($cartItems);
            $items = Book::getBooksByIds($itemsId);
            // total
        }

        require_once(ROOT . '/views/cart/index.php');
        return true;
    }


    public function actionCheckout()
    {
        $cartItems = Cart::getBooks();
        $errors = false;

        if ($cartItems == false) {
            $errors[] = "Кошик порожній!";
        }

        $itemsId = array_keys($cartItems);
        $items = Book::getBooksByIds($itemsId);
        $result = false;
        $messages = false;

        if (!User::isGuest()) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {
            $userId = false;
            $errors[] = "Забронювати книги можуть лише авторизовані користувачі!";
        }


        if ($errors == false) {
            $result = Reservation::save($userId, $items);
            if ($result) {
                Cart::clear();
                $messages[] = "Книжки успішно заброньовано.";
            }
        }

        unset($_SESSION['errors']);
        $_SESSION['errors'] = $errors;
        unset($_SESSION['messages']);
        $_SESSION['messages'] = $messages;

        header("Location: /cart/");
        return true;
    }

}
