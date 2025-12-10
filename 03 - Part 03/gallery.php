<?php
include './inc/images.inc.php';
?>
<?php include './views/header.php'; ?>

<div class="gallery-container">
    <?php foreach($images as $image): ?>
        <a href="image.php?image=<?= rawurlencode($image['src']) ?>" class="gallery-item">
            <img src="./images/<?= rawurlencode($image['src']) ?>" alt="<?= e($image['title']) ?>" />
            <h3><?= e($image['title']) ?></h3>
        </a>
    <?php endforeach; ?>
</div>

<?php include './views/footer.php'; ?>
