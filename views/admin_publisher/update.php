<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="title text-center mb-4">Редагування видавництва #<?=$id;?></h2>
        </div>
        <div class="row">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Адмін-панель</a></li>
                  <li class="breadcrumb-item"><a href="/admin/publisher">Таблиця "Видавництва"</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Редагувати видавництво</li>
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

            <form action="/admin/publisher/update/<?=$id;?>" method="post">
                <ul class="list-group">
                   <li class="list-group-item">
                      <div class="row">
                         <div class="col-md-5 col-sm-5 col-lg-5">
                           <strong>Назва видавництва:</strong>
                         </div>
                         <div class="col-md-7 col-sm-7 col-lg-7">
                             <input class="form-control" required type="text" name="publisher_name" value="<?=$publisher['name'];?>" maxlength="150">
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
