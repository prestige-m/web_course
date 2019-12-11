<?php include ROOT . '/views/layouts/header.php'; ?>

<section>

    <div class="container">
        <div class="row justify-content-center">
            <h2 class="title text-center mb-4">Таблиця "Жанри"</h2>
        </div>
        <div class="row">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Адмін-панель</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Таблиця "Жанри"</li>
              </ol>
            </nav>
            <a href="/admin/genre/create" class="btn btn-default ml-3"><i class="fas fa-plus"></i> <strong>Додати жанр</strong></a>
        </div>

        <div class="row">
            <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Код жанру</th>
                <th scope="col">Назва жанру</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($genreList as $genre): ?>
                  <tr>
                    <td><?= $genre['id'];?></td>
                    <td><?= $genre['name'];?></td>
                    <td><a name="edit-item" href="/admin/genre/update/<?= $genre['id'] ?>" title="Редагувати"><i class="fas fa-edit"></i></a></td>
                    <td><a name="delete-item" href="/admin/genre/delete/<?= $genre['id'] ?>" title="Видалити">
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
