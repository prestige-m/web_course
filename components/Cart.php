<?php


class Cart
{
    public static function addBook($id)
    {
        $cartItems = array();
        if (isset($_SESSION['books'])) {
            $cartItems = $_SESSION['books'];
        }

        if (array_key_exists($id, $cartItems)) {
            unset($cartItems[$id]);
        } else {
            $cartItems[$id] = 1;
        }

        $_SESSION['books'] = $cartItems;
        return self::itemsCount();
    }


    public static function itemsCount()
    {
        if (isset($_SESSION['books'])) {

            $count = 0;
            foreach ($_SESSION['books'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getBooks()
    {
        if (isset($_SESSION['books'])) {
            return $_SESSION['books'];
        }
        return false;
    }

    public static function clear()
    {
        if (isset($_SESSION['books'])) {
            unset($_SESSION['books']);
        }
    }

    public static function deleteBook($id)
    {
        $cartItems = self::getBooks();

        unset($cartItems[$id]);
        $_SESSION['books'] = $cartItems;
    }

}
