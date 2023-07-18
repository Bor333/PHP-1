<?php

define('ROOT', dirname(__DIR__));

define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');

define('IMG_BIG_DIR', 'gallery_img/big/');
define('IMG_SMALL_DIR', 'gallery_img/small/');

include ROOT . '/engine/functions.php';
include ROOT . '/engine/catalog.php';
include ROOT . '/engine/gallery.php';
include ROOT . '/engine/upload.php';
include ROOT . '/engine/messages.php';
include ROOT . '/classSimpleImage.php';

