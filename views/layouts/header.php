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
        <link href="/template/css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css">
          <!-- <link href="/template/css/test.css" rel="stylesheet" type="text/css"> -->
    </head>

    <!-- <body> -->
  <body class="d-flex flex-column">
  <div id="page-content">
     <!-- <div class="page-wrapper"> -->
        <div class="container">
                <div class="row">
                            <div class="col-md-5 col-sm-5 col-lg-5">
                                <div class="float-left">
                                    <a class="site-title" href="/"><h2 class=""><strong>Електронна бібліотека</strong></h2></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 col-lg-7">

                                <div class="shop-menu float-right">
                                    <ul class="nav">

                                        <?php if (User::isAdmin()): ?>
                                            <li class="nav-item"><a class="nav-link" href="/admin/"><i class="fas fa-crown"></i></i> Панель адміністратора</a></li>
                                        <?php endif; ?>

                                        <li class="nav-item"><a class="nav-link" href="/cart">
                                                <i class="fa fa-book"></i> Вибрані книги
                                                (<span id="cart-count"><?php echo Cart::itemsCount(); ?></span>)
                                            </a>
                                        </li>

                                        <?php if (User::isGuest()): ?>
                                            <li class="nav-item"><a class="nav-link" href="/user/login/"><i class="fa fa-lock"></i> Вхід</a></li>
                                            <li class="nav-item"><a class="nav-link" href="/user/register"><i class="fa fa-user-circle"></i> Реєстрація</a></li>
                                        <?php else: ?>
                                            <li class="nav-item"><a class="nav-link" href="/cabinet/"><i class="fa fa-user"></i> Особистий кабінет</a></li>
                                            <li class="nav-item"><a class="nav-link" href="/user/logout/"><i class="fa fa-unlock"></i> Вихід</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                </div>

                <div class="row">
                      <div class="col-md-12 col-sm-12 col-lg-12">
                          <div class="float-left">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link" href="/">Головна</a></li>
                                    <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Бібліотека
                                      </a>
                                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                         <a class="dropdown-item" href="/catalog/">Каталог книг</a>
                                         <a class="dropdown-item" href="/cart/">Корзина</a>
                                      </div>
                                    </li>

                                    <li class="nav-item"><a class="nav-link" href="/about/">Про бібліотеку</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/contacts/">Контакти</a></li>
                                </ul>
                            </nav>
                          </div>
                      </div>
                </div>

</div>
