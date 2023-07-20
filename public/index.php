<?php

include dirname(__DIR__) . '/config/config.php';

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$url_param = explode('?', $_SERVER['REQUEST_URI']);
$url_param =  explode('=', $url_param[1]);
//var_dump($url_param);
$url_param_name = $url_param[0];
$url_param_value = $url_param[1];
if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
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
        $params[$url_param[0]] = $url_param[1];
        $params['big'] = getGallery();
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

