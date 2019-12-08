<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($genres as $genreItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $genreItem['id']; ?>">
                                            <?php echo $genreItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 col-md-9">
                <div class="features_items">
                    <h2 class="title text-center mb-4">Нові книги</h2>

                    <?php foreach ($latestBooks as $book): ?>
                        <div class="book-cover col-sm-4 col-md-4 my-5 float-left" > <!--style="background: green; height: 200px; width: 180px; "-->
                            <div class="productinfo text-center">
							
                                <img src="<?php echo Book::getImage($book['id']); ?>" alt="" />
			
							   <div class="row>
                                <h2><?php echo $book['author_name'] . ' ' . $book['author_surname']; ?></h2>
							   </div>
							  <div class="row>
                                <p>
                                    <a href="/product/<?php echo $book['id']; ?>">
                                        <?php echo $book['name']; ?>
                                    </a>
                                </p>
								</div>
								<div class="row text-justify">
                                <a href="#" class="btn btn-secondary add-to-cart" data-id="<?php echo $book['id']; ?>">
								<i class="fas fa-heart"></i><span id="button-text"> Читати</span></a>
								</div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>


        </div>
    </div>

</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
