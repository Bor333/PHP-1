<?php

function getGallery()
{
    return getAssocResult("SELECT * FROM gallery");
}

function getImage($id)
{
    return getOneResult("SELECT * FROM gallery WHERE id = {$id}");
}

function loadImage()
{
    if ($_FILES["userfile"]["size"] > 1024 * 5 * 1024) {
        header("Location: /?page=gallery&message=ERROR_SIZE");
        die();
    }

    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
            header("Location: /?page=gallery&message=ERROR_SCRIPT");
            die();
        }
    }

    if($_FILES['userfile']['type'] != "image/jpeg") {
        header("Location: /?page=gallery&message=ERROR_TYPE");
        die();
    }

    $imageinfo = getimagesize($_FILES['userfile']['tmp_name']);
    if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
        header("Location: /?page=gallery&message=ERROR_NOT_IMAGE");
        die();
    }

    if (move_uploaded_file($_FILES['userfile']['tmp_name'], IMG_BIG_DIR . $_FILES['userfile']['name'])) {
        $image = new SimpleImage();
        $image->load(IMG_BIG_DIR . $_FILES['userfile']['name']);
        $image->resizeToWidth(250);
        $image->save(IMG_SMALL_DIR . $_FILES['userfile']['name']);
        header("Location: /gallery/?message=OK");
    } else {
        header("Location: /gallery/?message=ERROR");
    }

}