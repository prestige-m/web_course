<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>


                <div class="signup-form">
                  <h2 class="title text-center mb-4">Вхід на сайт</h2>

                    <form action="#" method="post">
                        <div class="row justify-content-center">
                           <div class="col-12 col-md-5 pb-2">
                            <input type="email" class="form-control" required name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                           </div>
                        </div>
                        <div class="row justify-content-center">
                          <div class="col-12 col-md-5 pb-2">
                            <input type="password" class="form-control" required name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                          </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-2">
                             <input type="submit" class="btn btn-secondary btn-block" name="submit" value="Вхід" />
                           </div>
                        </div>
                    </form>
                </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
