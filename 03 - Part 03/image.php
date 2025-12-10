<?php
include './inc/images.inc.php';
?>
<?php include './views/header.php'; ?>

<?php
$imageKey = $_GET['image'] ?? '';
$imageData = null;
foreach ($images as $img) {
    if ($img['src'] === $imageKey) {
        $imageData = $img;
        break;
    }
}
?>

<?php if($imageData): ?>
    <h2><?= e($imageData['title']) ?></h2>
    <img src="./images/<?= rawurlencode($imageData['src']) ?>" class="full-image" />
    <p><?= nl2br(e($imageData['description'])) ?></p>
<?php else: ?>
    <div class="notice">This image could not be found.</div>
<?php endif; ?>

<a href="gallery.php" class="button">Back to gallery</a>

<?php include './views/footer.php'; ?>
