<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($genres as $genreItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $genreItem['id'];?>">
                                            <?php echo $genreItem['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Книги у кошику</h2>

                    <?php if ($cartItems): ?>
                        <p>Ви вибрали наступні книги:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код книги(ISBN)</th>
                                <th>Назва</th>
                                <th>Автор</th>
                                <th>Видавництво</th>
                                <th>Видалити</th>
                            </tr>
                            <?php foreach ($items as $item): ?>
                                <tr>
                                    <td><?php echo $item['id'];?></td>
                                    <td>
                                        <a href="/product/<?php echo $item['id'];?>">
                                            <?php echo $item['name'];?>
                                        </a>
                                    </td>
                                    <td><?php echo $item['author_name'] . $item['author_surname'];?></td>
                                    <td><?php echo $item['publisher_name'];?></td>
                                    <td>
                                        <a href="/cart/delete/<?php echo $item['id'];?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                        </table>

                        <a class="btn btn-default checkout" href="/cart/checkout"><i class="fas fa-book-open"></i> Забронювати книги</a>
                        <a class="btn btn-default checkout" href="/cart/clear"><i class="fa fa-trash"></i> Очистити кошик</a>
                    <?php else: ?>
                        <p>Ви нічого не вибрали. <i class="fas fa-frown"></i></p>

                        <a class="btn btn-default checkout" href="/"><i class="fas fa-home"></i> Головна сторінка</a>
                    <?php endif; ?>

                </div>



            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
