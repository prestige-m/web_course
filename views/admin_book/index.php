<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Адмін-панель</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Таблиця "Книги"</li>
              </ol>
            </nav>

            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Додати книгу</a>

            <h4>Список книг</h4>
            <br/>

            <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Код книги(ISBN)</th>
                <th scope="col">Назва</th>
                <th scope="col">Автор</th>
                <th scope="col">Видавництво</th>
                <th scope="col">Рік видання</th>
                <th scope="col">Кількість сторінок</th>
                <th scope="col">Файл зображення</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bookList as $book): ?>
                  <tr>
                    <td><?= $book['id'];?></td>
                    <td><?= $book['name'];?></td>
                    <td><?= $item['author_name'] . $item['author_surname'];?></td>
                    <td><?= $item['publisher_name'];?></td>
                    <td><?= $item['year'];?></td>
                    <td><?= $item['pages'];?></td>
                    <td><?= Book::getImageNameById($book['id']);?></td>
                    <td><a href="/admin/book/update/<?= $book['id'] ?>" title="Редагувати"><i class="fa fa-pencil"></i></a></td>
                    <td><a href="/admin/book/delete/<?= $book['id'] ?>" title="Видалити"><i class="fa fa-times"></i></a></td>
                  </tr>
              <?php endforeach; ?>
            </tbody>
          </table>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
