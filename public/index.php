<?php

include dirname(__DIR__). '/config/config.php';


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
        if (!empty($_FILES)) {
            if (checks()) {
                $params['message'] = getMessages()[checks()];
            } else {
                upload();
            }
        }
        $params['big'] = getGallery();
        break;
    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

echo render($page, $params);

