<?php

function upload()
{
    if (move_uploaded_file($_FILES['myfile']['tmp_name'], IMG_BIG_DIR . $_FILES['myfile']['name'])) {
        $image = new SimpleImage();
        $image->load(IMG_BIG_DIR . $_FILES['myfile']['name']);
        $image->resizeToWidth(250);
        $image->save(IMG_SMALL_DIR . $_FILES['myfile']['name']);
        getGallery();
        header("Location: /?page=gallery&message=OK");
        die();
    } else {
        header("Location: /?page=gallery&message=ERROR");
        die();
    }

}