<?php
include './inc/images.inc.php';
header('Content-Type: application/json');
echo json_encode($images, JSON_PRETTY_PRINT);
