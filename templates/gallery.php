<div class="post_title"><h2>Моя галерея</h2></div>
<div class="gallery">
    <?php foreach ($gallery as $item): ?>
        <a rel="gallery" class="photo" href="/image/?id=<?= $item['id'] ?>"><img
                    src="<?= IMG_SMALL_DIR . $item['filename'] ?>"
                    width="150" height="100"/></a>
    <?= $item['likes'] ?>
    <?php endforeach; ?>
</div>

<?= $message ?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="userfile">
    <input type="submit" name="load">
</form>

