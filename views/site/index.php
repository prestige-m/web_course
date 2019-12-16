<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <?php include ROOT . '/views/layouts/left_menu.php'; ?>

            <div class="col-sm-9 col-md-9">
                <div class="items">
                    <h2 class="title text-center mb-4">Нові книги</h2>

                    <?php if (!empty($latestBooks)): ?>

                    <?php foreach ($latestBooks as $book): ?>
                        <div class="col-sm-4 col-md-4 float-left py-3" >
                            <div class="item-container item-info text-center">
                              <a href="/book/<?php echo $book['id']; ?>">
                                  <img class="item-image" src="<?php echo Book::getImage($book['id']); ?>" alt="" />
                              </a>
							                <div class="row justify-content-center">
                                 <div class="col-12 text-truncate">
                                  <?php echo $book['author_name'] . ' ' . $book['author_surname']; ?>
                                </div>
							                </div>
							                <div class="row justify-content-center font-weight-bold" >
                                 <div class="col-12 text-truncate">
                                  <?php echo $book['name']; ?>
                                 </div>
								             </div>
              								<div class="row justify-content-center">
                                  <div class="col-12">
                                      <a href="#" class="btn btn-secondary add-to-cart btn-block" data-id="<?php echo $book['id']; ?>">
      								                <i class="fas fa-heart"></i><span id="button-text"> Читати</span></a>
                                  </div>
              								</div>
                          </div>
                        </div>
                    <?php endforeach; ?>
                  <?php else: ?>
                      <p>Нічого не знайдено. <i class="far fa-frown-open"></i></p>
                  <?php endif; ?>
                  </div>

              <div class="col-sm-12 col-md-12 col-lg-12 offset-4 float-left pt-4">
                  <?php echo $pagination->get();?>
              </div>

        </div>
    </div>
 </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
