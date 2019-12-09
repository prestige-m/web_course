
<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="left-sidebar list-group">
        <h2>Каталог</h2>
        <?php foreach ($genres as $genreItem): ?>
        <a class="list-group-item list-group-item-action" href="/category/<?php echo $genreItem['id']; ?>"> <!--category-group -->
            <div id="category-item">
                <h5><?php echo $genreItem['name']; ?></h5>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
