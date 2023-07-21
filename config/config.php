<?php

define('ROOT', dirname(__DIR__));

define('HOST', 'localhost:3306');
define('USER', 'root');
define('PASS', '');
define('DB', 'php-1');

define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');

define('IMG_BIG_DIR',  '/gallery_img/big/');
define('IMG_SMALL_DIR', '/gallery_img/small/');

include ROOT . '/engine/db.php';
include ROOT . '/engine/functions.php';
include ROOT . '/engine/catalog.php';
include ROOT . '/engine/gallery.php';
include ROOT . '/engine/messages.php';
include ROOT . '/engine/news.php';
include ROOT . '/classSimpleImage.php';

