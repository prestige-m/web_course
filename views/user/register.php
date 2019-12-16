<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
                <?php if ($result): ?>
                    <p>Ви зареєстровані!</p>
                <?php else: ?>

                    <?php if (isset($errors) && is_array($errors)): ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>


                    <div class="signup-form">
                      <h2 class="title text-center mb-4">Реєстрація</h2>

                        <form action="#" method="post">
                            <div class="row justify-content-center">
                               <div class="col-12 col-md-5 pb-2">
                                <input type="text" class="form-control" required name="name" placeholder="Ім’я" value="<?php echo $name; ?>"/>
                               </div>
                            </div>
                            <div class="row justify-content-center">
                               <div class="col-12 col-md-5 pb-2">
                                <input type="text" class="form-control" required name="surname" placeholder="Прізвище" value="<?php echo $surname; ?>"/>
                               </div>
                            </div>
                            <div class="row justify-content-center">
                               <div class="col-12 col-md-5 pb-2">
                                <input type="text" class="form-control" required name="middle_name" placeholder="По батькові" value="<?php echo $middle_name; ?>"/>
                               </div>
                            </div>
                            <div class="row justify-content-center">
                               <div class="col-12 col-md-5 pb-2">
                                <input type="text" class="form-control" required name="phone" pattern="[+]?([0-9]{1,3})?[0-9]{10}" placeholder="Телефон" value="<?php echo $phone; ?>"/>
                               </div>
                            </div>
                            <div class="row justify-content-center">
                              <div class="col-12 col-md-5 pb-2">
                                <input type="email" class="form-control" required name="email" placeholder="Електронна адреса" value="<?php echo $email; ?>"/>
                              </div>
                            </div>
                            <div class="row justify-content-center">
                              <div class="col-12 col-md-5 pb-2">
                                  <input type="password" class="form-control" required name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                              </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-6 col-md-2">
                                 <input type="submit" class="btn btn-secondary btn-block" name="submit" value="Зареєструвати" />
                               </div>
                            </div>
                        </form>
                    </div>
              <?php endif; ?>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
