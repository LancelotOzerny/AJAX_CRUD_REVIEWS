<?php
require_once __DIR__ . '/autoload.php';

use classes\ReviewTable;

$count = intval($_POST['COUNT']) ?? 0;
$offset = intval($_POST['PAGE']) * $count ?? 0;

$data = [
    'count' => ReviewTable::CountAll(),
    'reviews' => ReviewTable::Read([], $count, $offset),
    'post' => $_POST
];

die(json_encode($data));