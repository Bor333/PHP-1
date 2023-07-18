<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?php foreach ($big as $item): ?>
            <a rel="gallery" class="photo" href="<?= IMG_BIG_DIR . $item ?>"><img src="<?= IMG_SMALL_DIR . $item ?>"
                                                                                  width="150" height="100"/></a>
        <?php endforeach; ?>
    </div>
</div>
<?= $message ?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="userfile">
    <input type="submit" name="load">
</form>

