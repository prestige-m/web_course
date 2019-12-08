<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>


          <div class="container">
                        <form action="actions/sign_in_action.php" method="post">
                <div class="row justify-content-center my-container" style="padding-top: 9%">
                    <h1 class="display-4">Вхiд</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-5 my-container">
                        <input class="form-control" required="" type="text" name="login" id="login" minlength="4" maxlength="128" placeholder="Логін користувача">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-5 my-container">
                        <input class="form-control" required="" type="password" name="password" id="password" minlength="4" maxlength="32" placeholder="Пароль">
                    </div>
                </div>
                    <div class="row justify-content-center">
                    <div class="col-6 col-md-2 my-container">
                        <button class="btn btn-outline-primary btn-block" type="submit"><span class="fa fa-sign-in"></span> Увiйти</button>
                    </div>
                </div>
            </form>
        </div>

                <div class="signup-form">
                    <h2>Вхід на сайт</h2>
                    <form action="#" method="post">
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                        </div>
                        <div class="form-group mb-3">
                             <input type="submit" class="btn btn-secondary btn-block" name="submit" value="Вхід" />
                             <button type="button" class="btn btn-outline-dark">Dark2adf</button>
                        </div>
                    </form>
                </div>


                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
