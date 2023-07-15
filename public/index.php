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
    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

function getCatalog(): array
{
    return [
        [
            'name' => 'Пицца',
            'price' => 24
        ],
        [
            'name' => 'Чай',
            'price' => 1
        ],
        [
            'name' => 'Яблоко',
            'price' => 24
        ],
    ];
}


echo render($page, $params);

