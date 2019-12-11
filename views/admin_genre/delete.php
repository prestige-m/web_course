<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Удалить товар</li>
                </ol>
            </div>


            <h4>Удалить товар #<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить этот товар?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="title text-center mb-4">Видалення книги #<?=$id;?></h2>
        </div>
        <div class="row">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Адмін-панель</a></li>
                  <li class="breadcrumb-item"><a href="/admin/book">Таблиця "Книги"</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Видалити книгу</li>
              </ol>
            </nav>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-6 col-md-6 col-lg-6">

            <?php if (isset($errors) && is_array($errors)): ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error;?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if (isset($messages) && is_array($messages)): ?>
                <div class="alert alert-success" role="alert">
                    <ul>
                        <?php foreach ($messages as $message): ?>
                            <li><?= $message;?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/admin/book/create" method="post" enctype="multipart/form-data">
                <ul class="list-group">
                   <li class="list-group-item">
                      <div class="row">
                         <div class="col-md-5 col-sm-5 col-lg-5">
                           <div class="alert alert-primary" role="alert">
                              <strong>Ви впевнені, що бажаете видалити книгу?:</strong>
                            </div>
                         </div>
                         <div class="col-md-7 col-sm-7 col-lg-7">
                             <strong>Ви впевнені, що бажаете видалити книгу?:</strong>
                         </div>
                      </div>
                   </li>
                   <li class="list-group-item">
                      <div class="row justify-content-center">
                         <div class="col-md-6 col-sm-6 col-lg-6">
                            <button type="submit" name="submit" class="btn btn-outline-dark btn-block">Зберегти</button>
                        </div>
                      </div>
                   </li>
                </ul>
            </form>
          </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
