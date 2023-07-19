<?php

include dirname(__DIR__). '/config/config.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$params = [];
$layout = 'main';
switch ($page) {
    case 'index':
        $params['name'] = 'Админ';
        break;

    case 'catalog':
        $params['catalog'] = getCatalog();
        break;

    case 'gallery':
        $layout = 'gallery';
        if (isset($_POST['load'])) {
            loadImage();
        }
        $params['message'] = getMessages()[$_GET['message']];
        $params['big'] = getGallery(IMG_BIG_DIR);
        break;
    case 'news':
        $params['news'] = getNews();
        break;

    case 'newsone':
        $id = (int)$_GET['id'];
        $params['news'] = getOneNews($id);
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

echo render($page, $params, $layout);

