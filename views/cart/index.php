<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <?php include ROOT . '/views/layouts/left_menu.php'; ?>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Книги у кошику</h2>

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

                    <?php if ($cartItems): ?>
                        <p>Ви вибрали наступні книги:</p>
                        <table id="book-info" class="table-bordered table-striped table">
                            <tr>
                                <th>Код книги(ISBN)</th>
                                <th>Назва</th>
                                <th>Автор</th>
                                <th>Видавництво</th>
                                <th>Видалити</th>
                            </tr>
                          <tbody class="table-body">
                            <?php foreach ($items as $item): ?>
                                <tr class="data">
                                    <td id="book_id"><?php echo $item['id'];?></td>
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
                          </tbody>
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
