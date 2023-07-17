<h2>Каталог</h2>
<?php foreach ($catalog as $item): ?>
    <h2> <?= $item['name'] ?></h2>
    <p><?= $item['price'] ?></p>
    <button>Купить</button>
    <hr>
<?php endforeach; ?>
