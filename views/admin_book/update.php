<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="title text-center mb-4">Редагування книги #<?=$id;?></h2>
        </div>
        <div class="row">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Адмін-панель</a></li>
                  <li class="breadcrumb-item"><a href="/admin/book">Таблиця "Книги"</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Редагування книги</li>
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

            <form action="/admin/book/update/<?=$id;?>" method="post" enctype="multipart/form-data">
                <ul class="list-group">
                   <li class="list-group-item">
                      <div class="row">
                         <div class="col-md-5 col-sm-5 col-lg-5">
                           <strong>Назва:</strong>
                         </div>
                         <div class="col-md-7 col-sm-7 col-lg-7">
                             <input class="form-control" required type="text" name="name" value="<?=$book['name'];?>" maxlength="150">
                         </div>
                      </div>
                   </li>
                   <li class="list-group-item">
                      <div class="row">
                         <div class="col-md-5 col-sm-5 col-lg-5">
                           <strong>Жанр:</strong>
                         </div>
                         <div class="col-md-7 col-sm-7 col-lg-7">
                             <select class="form-control" name="genre_id">
                               <?php if (is_array($genres)): ?>
                                   <?php foreach ($genres as $genre): ?>
                                       <option value="<?=$genre['id'];?>"
                                          <?php if ($book['genre_id']==$genre['id']) echo "selected";?>
                                          >
                                          <?=$genre['name'];?>
                                       </option>
                                   <?php endforeach; ?>
                               <?php endif; ?>
                             </select>
                         </div>
                      </div>
                   </li>
                   <li class="list-group-item">
                      <div class="row">
                         <div class="col-md-5 col-sm-5 col-lg-5">
                           <strong>Автор:</strong>
                         </div>
                         <div class="col-md-7 col-sm-7 col-lg-7">
                             <select class="form-control" name="author_id">
                               <?php if (is_array($authorList)): ?>
                                   <?php foreach ($authorList as $author): ?>
                                       <option value="<?=$author['id'];?>"
                                          <?php if ($book['author_id']==$author['id']) echo "selected";?>
                                         >
                                           <?=$author['name']." ".$author['surname']." ".$author['middle_name'];?>
                                       </option>
                                   <?php endforeach; ?>
                               <?php endif; ?>
                             </select>
                         </div>
                      </div>
                   </li>
                   <li class="list-group-item">
                      <div class="row">
                         <div class="col-md-5 col-sm-5 col-lg-5">
                           <strong>Видавництво:</strong>
                         </div>
                         <div class="col-md-7 col-sm-7 col-lg-7">
                             <select class="form-control" name="publisher_id">
                               <?php if (is_array($publisherList)): ?>
                                   <?php foreach ($publisherList as $publisher): ?>
                                       <option value="<?= $publisher['id']; ?>"
                                         <?php if ($book['publisher_id']==$publisher['id']) echo "selected";?>
                                         >
                                           <?php echo $publisher['name']; ?>
                                       </option>
                                   <?php endforeach; ?>
                               <?php endif; ?>
                             </select>
                         </div>
                      </div>
                   </li>
                   <li class="list-group-item">
                      <div class="row">
                         <div class="col-md-5 col-sm-5 col-lg-5">
                           <strong>Рік видання:</strong>
                         </div>
                         <div class="col-md-7 col-sm-7 col-lg-7">
                             <input class="form-control" required type="text" name="year" value="<?=$book['year'];?>">
                         </div>
                      </div>
                   </li>
                   <li class="list-group-item">
                      <div class="row">
                         <div class="col-md-5 col-sm-5 col-lg-5">
                           <strong>Кількість сторінок:</strong>
                         </div>
                         <div class="col-md-7 col-sm-7 col-lg-7">
                             <input class="form-control" required type="number" name="page_count" value="<?=$book['pages'];?>">
                         </div>
                      </div>
                   </li>
                   <li class="list-group-item">
                      <div class="row">
                         <div class="col-md-5 col-sm-5 col-lg-5">
                           <strong>Файл зображення:</strong>
                         </div>
                         <div class="col-md-7 col-sm-7 col-lg-7">
                             <input class="form-control" name="img_file" type="file">
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
