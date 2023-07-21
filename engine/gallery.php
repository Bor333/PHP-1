<?php

function getGallery()
{
    return getAssocResult("SELECT * FROM gallery ORDER BY likes DESC");
}

function getOneImage(int $id)
{
    return getOneResult("SELECT * FROM gallery WHERE id = {$id}");
}

function addLikes(int $id)
{
    executeSql("UPDATE gallery SET likes = likes + 1 WHERE id = {$id}");
}

function loadImage()
{
    $path_big = 'gallery_img/big/' . $_FILES['userfile']['name'];

    if (file_exists($path_big)) {
        header("Location: /gallery/?message=ERROR_FILE_EXIST");
        die();
    }

    if ($_FILES["userfile"]["size"] > 1024 * 5 * 1024) {
        header("Location: /gallery/?message=ERROR_SIZE");
        die();
    }

    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
            header("Location: /gallery/?message=ERROR_SCRIPT");
            die();
        }
    }

    if ($_FILES['userfile']['type'] != "image/jpeg") {
        header("Location: /gallery/?message=ERROR_TYPE");
        die();
    }

    $imageinfo = getimagesize($_FILES['userfile']['tmp_name']);
    if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
        header("Location: /gallery/?message=ERROR_NOT_IMAGE");
        die();
    }

    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $path_big)) {
        $filename = mysqli_real_escape_string(getDb(), $_FILES['userfile']['name']);
        executeSql("INSERT INTO gallery (filename) VALUES ('$filename')");

        $image = new SimpleImage();
        $image->load($path_big);
        $image->resizeToWidth(250);
        $image->save('gallery_img/small/' . $_FILES['userfile']['name']);
        header("Location: /gallery/?message=OK");
    } else {
        header("Location: /gallery/?message=ERROR");
    }

}