<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if ($result): ?>
                    <p>Ви зареєстровані!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>


                    <div class="signup-form">
                        <h2>Реєстрація на сайті</h2>
                        <form action="#" method="post">
                          <div class="form-group mb-3">
                              <input type="text" class="form-control" name="name" placeholder="Ім’я" value="<?php echo $email; ?>"/>
                          </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Електронна адреса" value="<?php echo $email; ?>"/>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                            </div>
                            <div class="form-group mb-3">
                                 <input type="submit" class="btn btn-secondary btn-block" name="submit" value="Реєстрація" />
                            </div>
                        </form>
                    </div>

                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
