<?php

function prepareVariables($page) {
    $params = [];
    $params['layout'] = 'main';
    switch ($page) {
        case 'index':
            $params['name'] = 'Админ';
            break;

        case 'catalog':
            $params['catalog'] = getCatalog();
            break;

        case 'image':
            $params['layout'] = 'gallery';
            addLikes($_GET['id']);
            $params['image'] = getOneImage($_GET['id']);
            break;

        case 'gallery':
            $params['layout'] = 'gallery';
            if (isset($_POST['load'])) {
                loadImage();
            }
            $params['message'] = getMessages()[$_GET['message']];
            $params['gallery'] = getGallery();
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

    return $params;
}

function render($page, $params)
{
    return renderTemplate(LAYOUTS_DIR . $params['layout'], [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}

function renderTemplate($page, $params = [])
{
    ob_start();
    extract($params);

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    }

    return ob_get_clean();
}




