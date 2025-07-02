<?php
require_once './config.php';

$id = $_GET['id'] ?? null;
if ($id) {
    Config::delete_product($id);
    exit;
} else {
    header('Location: index.php');
    exit;
}
