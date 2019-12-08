<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Електронна бібліотека</title>

        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
        <link href="/template/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/template/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="/template/css/my_styles.css" rel="stylesheet" type="text/css">
          <!-- <link href="/template/css/test.css" rel="stylesheet" type="text/css"> -->
    </head>

    <body>
        <div class="wpage-wrapper">

                <div class="header-middle">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="float-left">
                                    <a class="site-title" href="/"><h1 class="display-10">Електронна бібліотека</h1></a>
                                </div>
                            </div>
                            <div class="col-md-8">

                                <div class="shop-menu float-right">
                                    <ul class="nav">
                                        <li class="nav-item"><a class="nav-link" href="/cart">
                                                <i class="fa fa-book"></i> Вибрані книги
                                                (<span id="cart-count"><?php echo Cart::itemsCount(); ?></span>)
                                            </a>
                                        </li>
                                        <?php if (User::isGuest()): ?>
                                            <li class="nav-item"><a class="nav-link" href="/user/login/"><i class="fa fa-lock"></i> Вхід</a></li>
                                            <li class="nav-item"><a class="nav-link" href="/user/register"><i class="fa fa-user-circle"></i> Реєстрація</a></li>
                                        <?php else: ?>
                                            <li class="nav-item"><a class="nav-link" href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                                            <li class="nav-item"><a class="nav-link" href="/user/logout/"><i class="fa fa-unlock"></i> Вихід</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header-middle-->

                <div class="header-bottom"><!--header-bottom-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="mainmenu pull-left">
                                    <ul class="nav navbar-nav collapse navbar-collapse">
                                        <li><a href="/">Головна</a></li>
                                        <li class="dropdown"><a href="#">Бібліотека<i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu">
                                                <li><a href="/catalog/">Каталог книг</a></li>
                                                <li><a href="/cart/">Корзина</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/about/">Про бібліотеку</a></li>
                                        <li><a href="/contacts/">Контакти</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header-bottom-->

            </header><!--/header-->
