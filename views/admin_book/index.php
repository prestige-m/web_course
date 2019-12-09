<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="title text-center mb-4">Таблиця "Книги"</h2>
        </div>
        <div class="row">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Адмін-панель</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Таблиця "Книги"</li>
              </ol>
            </nav>

            <a href="/admin/book/create" class="btn btn-default ml-3"><i class="fas fa-plus"></i> <strong>Додати книгу</strong></a>
        </div>
        <div class="row">
            <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Код книги(ISBN)</th>
                <th scope="col">Назва</th>
                <th scope="col">Жанр</th>
                <th scope="col">Автор</th>
                <th scope="col">Видавництво</th>
                <th scope="col">Рік видання</th>
                <th scope="col">Кількість сторінок</th>
                <th scope="col">Файл зображення</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bookList as $book): ?>
                  <tr>
                    <td><?= $book['id'];?></td>
                    <td><?= $book['name'];?></td>
                    <td><?= $book['genre_name'];?></td>
                    <td><?= $book['author_name'] ." ". $book['author_surname'];?></td>
                    <td><?= $book['publisher_name'];?></td>
                    <td><?= $book['year'];?></td>
                    <td><?= $book['pages'];?></td>
                    <td><?= Book::getImageNameById($book['id']);?></td>
                    <td><a href="/admin/book/update/<?= $book['id'] ?>" title="Редагувати"><i class="fas fa-edit"></i></a></td>
                    <td><a href="/admin/book/delete/<?= $book['id'] ?>" title="Видалити"><i class="far fa-times-circle"></i></a></td>
                  </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
