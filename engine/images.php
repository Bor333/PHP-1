<?php

function getImages() {
    $big = scandir(IMG_BIG_DIR);
    return array_slice($big, 2);
}