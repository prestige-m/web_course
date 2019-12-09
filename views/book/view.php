<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <?php include ROOT . '/views/layouts/left_menu.php'; ?>

            <div class="col-sm-9 col-md-9 col-lg-9">
               <div class="row">
                   <div class="col-sm-6 col-md-6 col-lg-6">
                       <img src="<?php echo Book::getImage($book['id']); ?>" alt="" style="width: 100%; height: 100%;" />
                       <div class="row justify-content-center">
                           <div class="col-sm-6 col-md-6 col-lg-6">
                               <a href="#" class="btn btn-secondary add-to-cart btn-block" data-id="<?= $book['id']; ?>">
                               <i class="fas fa-heart"></i><span id="button-text"> Читати</span></a>
                           </div>
                       </div>
                   </div>
                   <div class="col-sm-6 col-md-6 col-lg-6">
                       <ul class="list-group">
                           <li class="list-group-item">
                               <div class="row">
                                  <div class="col-md-6 col-sm-6 col-lg-6">
                                    <strong>Код книги:</strong>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-lg-6">
                                       <?= $book['id']; ?>
                                  </div>
                               </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                     <strong>Назва книги:</strong>
                                   </div>
                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                        <?= $book['name']; ?>
                                   </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                     <strong>Жанр книги:</strong>
                                   </div>
                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                        <?= $book['genre_name']; ?>
                                   </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                     <strong>Видавництво:</strong>
                                   </div>
                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                        <?= $book['publisher_name']; ?>
                                   </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                     <strong>Рік видання:</strong>
                                   </div>
                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                        <?= $book['year']; ?>
                                   </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                     <strong>Кількість сторінок:</strong>
                                   </div>
                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                        <?= $book['pages']; ?>
                                   </div>
                                </div>
                            </li>
                        </ul>
                   </div>
               </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
