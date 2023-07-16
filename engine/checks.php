<?php

function checks()
{
    if ($_FILES["myfile"]["size"] > 1024 * 5 * 1024) {
        return 'ERROR_SIZE';
    }

    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['myfile']['name'])) {
            return 'ERROR_SCRIPT';
        }
    }

    if ($_FILES['myfile']['type'] != "image/jpeg") {
        return 'ERROR_NOT_IMAGE';
    }

    $imageinfo = getimagesize($_FILES['myfile']['tmp_name']);
    if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
        return 'ERROR_TYPE';
    }
}
