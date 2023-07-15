<?php
define('IMG_BIG_DIR', 'gallery_img/big/');
define('IMG_SMALL_DIR', 'gallery_img/small/');
include 'classSimpleImage.php';

$messages = [
    'OK' => 'Файл загружен',
    'ERROR' => 'Ошибка',
    'ERROR_SIZE' => 'Размер файла не больше 5 мб',
    'ERROR_SCRIPT' => 'Загрузка php-файлов запрещена!',
    'ERROR_NOT_IMAGE' => 'Можно загружать только jpg-файлы, неверное содержание файла, не изображение.',
    'ERROR_TYPE' => 'Можно загружать только jpg-файлы, неверное содержание файла, не изображение.',
];

if (!empty($_FILES)) {
    var_dump($_FILES);

    if (move_uploaded_file($_FILES['myfile']['tmp_name'], IMG_BIG_DIR . $_FILES['myfile']['name'])) {
        $image = new SimpleImage();
        $image->load(IMG_BIG_DIR . $_FILES['myfile']['name']);
        $image->resizeToWidth(250);
        $image->save(IMG_SMALL_DIR . $_FILES['myfile']['name']);
        $big = scandir(IMG_BIG_DIR);
        $big = array_slice($big, 2);
        header("Location: /?page=gallery");
    } else {
        header("Location: /?page=gallery");
    }
}

$big = scandir(IMG_BIG_DIR);
$big = array_slice($big, 2);


?>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?php foreach ($big as $item): ?>
            <a rel="gallery" class="photo" href="<?= IMG_BIG_DIR . $item ?>"><img src="<?= IMG_SMALL_DIR . $item ?>"
                                                                                  width="150" height="100"/></a>
        <?php endforeach; ?>
    </div>
</div>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <input type="submit" name="Загрузить">
</form>

