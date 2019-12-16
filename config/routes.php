<?php

return array(

    'page-([0-9]+)' => 'site/index/$1',
    'book/([0-9]+)' => 'book/view/$1',

    'catalog' => 'catalog/index',

    'category/([0-9]+)/page-([0-9]+)' => 'site/category/$1/$2',
    'category/([0-9]+)' => 'site/category/$1',

    'cart/checkout' => 'cart/checkout',
    'cart/clear' =>'cart/clear',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart' => 'cart/index',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/order' => 'cabinet/bookOrder',
    'cabinet/delete/order' => 'cabinet/delete',
    'cabinet/book/list' => 'cabinet/bookList',
    'cabinet/change/photo' => 'cabinet/change',
    'cabinet/change/password' => 'cabinet/passchange',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'admin/book/create' => 'adminBook/create',
    'admin/book/update/([0-9]+)' => 'adminBook/update/$1',
    'admin/book/delete/([0-9]+)' => 'adminBook/delete/$1',
    'admin/book' => 'adminBook/index',

    'admin/publisher/create' => 'adminPublisher/create',
    'admin/publisher/update/([0-9]+)' => 'adminPublisher/update/$1',
    'admin/publisher/delete/([0-9]+)' => 'adminPublisher/delete/$1',
    'admin/publisher' => 'adminPublisher/index',

    'admin/genre/create' => 'adminGenre/create',
    'admin/genre/update/([0-9]+)' => 'adminGenre/update/$1',
    'admin/genre/delete/([0-9]+)' => 'adminGenre/delete/$1',
    'admin/genre' => 'adminGenre/index',

    'admin/reservation/update/([0-9]+)' => 'adminReserve/update/$1',
    'admin/reservation/delete/([0-9]+)' => 'adminReserve/delete/$1',
    'admin/reservation/view/([0-9]+)' => 'adminReserve/view/$1',
    'admin/reservation' => 'adminReserve/index',
    // Админпанель:
    'admin' => 'admin/index',

    'contacts' => 'site/contact',
    'about' => 'site/about',
    // Главная страница
    'index.php' => 'site/index',
    '' => 'site/index',
);
