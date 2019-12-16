<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Заброньовані книги</h2>

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

                    <?php if (!empty($orderItems) && !empty($items)): ?>
                        <p><strong>Номер бронювання: </strong>#<?=$orderItems['res_id'];?></p>
                        <p><strong>Дата створення: </strong><?=$orderItems['order_date'];?></p>
                        <table id="book-info" class="table-bordered table-striped table">
                            <tr>
                                <th>Код книги(ISBN)</th>
                                <th>Назва</th>
                                <th>Автор</th>
                                <th>Видавництво</th>
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
                                    <td><?php echo $item['author_name'] ." ". $item['author_surname'];?></td>
                                    <td><?php echo $item['publisher_name'];?></td>
                                </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <a class="btn btn-secondary mx-2" href="/cabinet/delete/order"> Видалити бронювання</a>
                  <?php else: ?>
                      <p>На жаль, нічого немає. <i class="far fa-frown-open"></i></i></p>
                  <?php endif; ?>
                    <a class="btn btn-secondary" href="/cabinet"> Назад</a>

                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
