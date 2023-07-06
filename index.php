<?php

function renderTemplate($page, $content = '', $menu = '') {
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

$menu =  renderTemplate('menu');
$content =  renderTemplate('about');
echo renderTemplate('layout', $content, $menu);