<?php include ROOT . '/views/layouts/header.php'; ?>
<!--
<div id="deleteModal" class="modal fade" tabindex="1000" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

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
                    <td><?= Book::getImageNameById($book['id']);?></td>  <?php #?>
                    <td><a name="edit-item" href="/admin/book/update/<?= $book['id'] ?>" title="Редагувати"><i class="fas fa-edit"></i></a></td>
                    <td><a name="delete-item" href="/admin/book/delete/<?= $book['id'] ?>" title="Видалити">
                        <i class="far fa-times-circle"></i></a>
                    </td>
                  </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
