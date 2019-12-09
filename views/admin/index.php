<?php include ROOT . '/views/layouts/header.php'; ?>

<section>

<div class="row justify-content-center">
      <h2 class="title text-center mb-4">Панель адміністратора</h2>
</div>
<div class="row justify-content-center">
    <div class="col-md-4 col-sm-4 col-lg-4">

        <div class="card">
            <div class="card-header pb-3">
                Вітаємо <strong><?= $user['name'] ?></strong>, вам доступні для управління наступні таблиці:
            </div>
             <div class="list-group list-group-flush">
                 <a href="/admin/product" class="list-group-item list-group-item-action">Таблиця "Книги"</a>
                 <a href="#" class="list-group-item list-group-item-action">Таблиця "Жанри"</a>
                 <a href="#" class="list-group-item list-group-item-action">Таблиця "Заброньовані книги"</a>
             </div>
        </div>
     </div>
  </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
