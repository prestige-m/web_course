<?php include ROOT . '/views/layouts/header.php'; ?>

<section>

    <div class="container">
        <div class="row justify-content-center">
            <h2 class="title text-center mb-4">Таблиця "Видавництва"</h2>
        </div>
        <div class="row">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Адмін-панель</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Таблиця "Видавництва"</li>
              </ol>
            </nav>
            <a href="/admin/publisher/create" class="btn btn-default ml-3"><i class="fas fa-plus"></i> <strong>Додати видавництво</strong></a>
        </div>

        <div class="row">
            <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Код видавництва</th>
                <th scope="col">Назва видавництва</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($publisherList as $publisher): ?>
                  <tr>
                    <td><?= $publisher['id'];?></td>
                    <td><?= $publisher['name'];?></td>
                    <td><a name="edit-item" href="/admin/publisher/update/<?= $publisher['id'] ?>" title="Редагувати"><i class="fas fa-edit"></i></a></td>
                    <td><a name="delete-item" href="/admin/publisher/delete/<?= $publisher['id'] ?>" title="Видалити">
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
