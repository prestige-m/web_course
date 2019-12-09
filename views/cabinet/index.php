<?php include ROOT . '/views/layouts/header.php'; ?>

<section>



    <!-- <div class="container">
        <div class="row">

            <h3>Кабинет пользователя</h3>

            <h4>Привет, <?php echo $user['name'];?>!</h4>
            <ul>
                <li><a href=>Редактировать данные</a></li>
            </ul>

        </div>
    </div> -->


<!-- <div class="container"> -->

    <div class="row justify-content-center">
        <h2 class="title text-center mb-4">Особистий кабінет</h2>
    </div>

<div class="row justify-content-center">
      <div class="col-md-4 col-sm-4 col-lg-4" align="center">
        <div>
            <img class="rounded" src="/template/images/user/<?= $user['photo']; ?>" height="256px" width="256px">
      			<form enctype="multipart/form-data" action="/cabinet/change/photo" method="post">
              <div class="row justify-content-center py-2">
        				<div align="center" class="col-5">
        					    <input required class="form-control" type="file" name="photo">
        				</div>
              </div>
        				<div class="row justify-content-center py-2">
          					<div align="center" class="col-5">
          						  <button class="btn btn-secondary btn-block" type="submit">Замінити фото</button>
          					</div>
        				</div>
      			</form>
  	   </div>
    </div>


  <div class="col-md-4 col-lg-4 col-sm-4">

    <?php
       if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            if (is_array($errors))  {
             echo '<div class="alert alert-danger" role="alert"><ul>';
            foreach ($errors as $error) {
               echo '<li>'. $error .'</li>';
            }
            echo '</ul></div>';
            unset($_SESSION['errors']);
          }
        }
        if (isset($_SESSION['messages'])) {
             $messages = $_SESSION['messages'];
             if (is_array($messages))  {
              echo '<div class="alert alert-success" role="alert"><ul>';
             foreach ($messages as $message) {
                echo '<li>'. $message .'</li>';
             }
             echo '</ul></div>';
             unset($_SESSION['messages']);
           }
         }
    ?>


    <form action="/cabinet/edit" method="post">
        <ul class="list-group">
           <li class="list-group-item">
              <div class="row">
                 <div class="col-md-4 col-sm-4 col-lg-4">
                   <strong>Електронна адреса:</strong>
                 </div>
                 <div class="col-md-7 col-sm-7 col-lg-7">
                     <input class="form-control" required type="email" name="email" value="<?= $user['email']; ?>" minlength="5" maxlength="100">
                 </div>
              </div>
           </li>
           <li class="list-group-item">
              <div class="row">
                 <div class="col-md-4 col-sm-4 col-lg-4">
                   <strong>Прізвище:</strong>
                 </div>
                 <div class="col-md-7 col-sm-7 col-lg-7">
                     <input class="form-control" required type="text" name="surname" value="<?= $user['surname']; ?>" minlength="4" maxlength="100">
                 </div>
              </div>
           </li>
           <li class="list-group-item">
              <div class="row">
                 <div class="col-md-4 col-sm-4 col-lg-4">
                   <strong>Ім’я:</strong>
                 </div>
                 <div class="col-md-7 col-sm-7 col-lg-7">
                     <input class="form-control" required type="text" name="name" value="<?= $user['name']; ?>" minlength="4" maxlength="100">
                 </div>
              </div>
           </li>
           <li class="list-group-item">
              <div class="row">
                 <div class="col-md-4 col-sm-4 col-lg-4">
                   <strong>По батькові:</strong>
                 </div>
                 <div class="col-md-7 col-sm-7 col-lg-7">
                     <input class="form-control" required type="text" name="middle_name" value="<?= $user['middle_name']; ?>" minlength="4" maxlength="100">
                 </div>
              </div>
           </li>
           <li class="list-group-item">
              <div class="row">
                 <div class="col-md-4 col-sm-4 col-lg-4">
                   <strong>Телефон:</strong>
                 </div>
                 <div class="col-md-7 col-sm-7 col-lg-7">
                     <input class="form-control" required type="text" name="phone" value="<?= $user['phone']; ?>" pattern="[+]?([0-9]{1,3})?[0-9]{10}">
                 </div>
              </div>
           </li>
           <li class="list-group-item">
              <div class="row justify-content-center">
                 <div class="col-md-6 col-sm-6 col-lg-6">
                    <button type="submit" name="submit" class="btn btn-outline-dark btn-block">Змінити дані</button>
                </div>
              </div>
           </li>
        </ul>
    </form>


    <div class="page-buffer">
      <form action="/cabinet/change/password" method="post">
          <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 py-2">
                  <strong>Змінити пароль:</strong>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12 py-2">
                  <input class="form-control" required type="password" name="pass" minlength="4" maxlength="32" placeholder="Новий пароль">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12 py-2">
                 <input class="form-control my-container" required type="password" name="pass_repeat" minlength="4" maxlength="32" placeholder="Підтвердження паролю">
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-sm-6 col-md-6 col-lg-6 mt-2">
                 <button type="submit" name="submit" class="btn btn-outline-secondary btn-block my-container">Змінити пароль</button>
              </div>
           </div>
      </form>
    </div>
  </div>

</div>

</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
