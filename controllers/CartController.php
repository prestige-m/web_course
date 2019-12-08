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
            $items = Book::getProdustsByIds($itemsId);
            // total
        }

        require_once(ROOT . '/views/cart/index.php');
        return true;
    }


    public function actionCheckout()
    {
        $cartItems = Cart::getBooks();

        if ($cartItems == false) {
            header("Location: /");
        }

        $genres = Genre::getGenreList();

        $itemsId = array_keys($cartItems);
        $books = Book::getBooksByIds($itemsId);

        $totalAmount = Cart::itemsCount();


        $userName = false;
        $userPhone = false;
        $userComment = false;

        //order status
        $result = false;

        if (!User::isGuest()) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {
            $userId = false;
        }

        if (isset($_POST['submit'])) {

            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            $errors = false;

            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }


            if ($errors == false) {
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                if ($result) {
                    $adminEmail = 'volodshzk@gmail.com';
                    $message = '<a href="http://digital-mafia.net/admin/orders">Список заказов</a>';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);

                    Cart::clear();
                }
            }
        }

        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }

}
