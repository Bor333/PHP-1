<?php

include dirname(__DIR__). '/config/config.php';

$big = getImages();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$params = ['count' => 2];
switch ($page) {
    case 'index':
        $params['name'] = 'Админ';
        break;
    case 'catalog':
        $params['catalog'] = getCatalog();
        break;
    case 'gallery':
        $params['big'] = getImages();
        break;
    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

echo render($page, $params);

