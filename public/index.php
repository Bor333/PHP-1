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
        if (isset($_POST['load'])) {
            loadImage();
        }

        $layout = 'gallery';
        $params['message'] = getMessages()[$_GET['message']];
        $params['big'] = getGallery(IMG_BIG_DIR);
        break;
    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

echo render($page, $params, $layout);

