<?php

function render($page, $params = [], $layout = 'main')
{
    return renderTemplate(LAYOUTS_DIR . $layout, [
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




